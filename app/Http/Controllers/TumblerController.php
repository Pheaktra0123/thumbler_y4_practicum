<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\ModelTumbler;
use App\Models\Tumbler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class TumblerController extends Controller
{
    // view table of tumbler products
    public function tumbler()
    {
        $models = ModelTumbler::all();
        $categories = Categories::all(); // <-- Get all categories
        $tumblers = Tumbler::paginate(5); // Paginate tumblers (8 per page)
        return view("CRUD/Product_Crud/View_Product", compact('models', 'categories', 'tumblers'));
    }
    // create new tumbler product
    public function store(Request $request)
    {
        $request->validate([
            'tumbler_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'model_id' => 'required|exists:model_tumblers,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'is_available' => 'nullable|boolean',
            'colors' => 'nullable',
            'sizes' => 'nullable',
            'thumbnails' => 'nullable|array',
            'thumbnails.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Handle multiple file uploads
        $thumbnailPaths = [];
        if ($request->hasFile('thumbnails')) {
            foreach ($request->file('thumbnails') as $thumbnail) {
                $thumbnailPath = $thumbnail->store('thumbnails', 'public');
                $thumbnailPaths[] = $thumbnailPath;
            }
        }

        // Process colors
        $colors = [];
        if ($request->has('colors')) {
            $colorsInput = $request->input('colors');
            if (is_array($colorsInput)) {
                $colors = $colorsInput;
            } elseif (is_string($colorsInput)) {
                $decodedColors = json_decode($colorsInput, true);
                if (is_array($decodedColors)) {
                    $colors = $decodedColors;
                } else {
                    $colors = array_map('trim', explode(',', $colorsInput));
                }
            }
        }

        // Process sizes
        $sizes = [];
        if ($request->has('sizes')) {
            $sizesInput = $request->input('sizes');
            if (is_array($sizesInput)) {
                $sizes = $sizesInput;
            } elseif (is_string($sizesInput)) {
                $decodedSizes = json_decode($sizesInput, true);
                if (is_array($decodedSizes)) {
                    $sizes = $decodedSizes;
                } else {
                    $sizes = array_map('trim', explode(',', $sizesInput));
                }
            }
        }

        $tumbler = new Tumbler();
        $tumbler->tumbler_name = $request->input('tumbler_name');
        $tumbler->category_id = $request->input('category_id');
        $tumbler->model_id = $request->input('model_id');
        $tumbler->price = $request->input('price');
        $tumbler->stock = $request->input('stock');
        $tumbler->description = $request->input('description');
        $tumbler->is_available = $request->input('is_available', true);
        $tumbler->colors = json_encode($colors);
        $tumbler->sizes = json_encode($sizes);
        $tumbler->thumbnails = json_encode(!empty($thumbnailPaths) ? $thumbnailPaths : ['default.png']);
        $tumbler->rating = 3.9; // fallback if not set
        $tumbler->rating_count = 27;
        $tumbler->save();

        return redirect()->back()->with('success', 'Tumbler created successfully!');
    }
    // view details of tumbler products
    public function details($id)
    {
        $tumbler = Tumbler::findOrFail($id);

        // Calculate average rating and count from reviews
        $tumbler->rating = round($tumbler->reviews()->avg('rating'), 1) ?? 0;
        $tumbler->rating_count = $tumbler->reviews()->count();

        // Safely handle colors
        try {
            $tumbler->colors = json_decode($tumbler->colors, true) ?? [];
        } catch (\Exception $e) {
            $tumbler->colors = [];
        }

        // Safely handle thumbnails
        try {
            $thumbnails = json_decode($tumbler->thumbnails, true);
            $tumbler->thumbnails = is_array($thumbnails) ? $thumbnails : [];
        } catch (\Exception $e) {
            $tumbler->thumbnails = [];
        }

        // Ensure we always have at least a default thumbnail
        if (empty($tumbler->thumbnails)) {
            $tumbler->thumbnails = ['default.png'];
        }

        return view('Pages.details_tumbler', compact('tumbler'));
    }
    // update tumbler product
 public function update(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'tumbler_name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'model_id' => 'required|exists:model_tumblers,id',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'is_available' => 'nullable|boolean',
        'colors' => 'nullable|string',
        'sizes' => 'nullable|string',
        'thumbnails.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        'existing_thumbnails.*' => 'nullable|string',
        'deleted_thumbnails.*' => 'nullable|string',
    ]);

    // Find the tumbler by ID
    $tumbler = Tumbler::findOrFail($id);

    // Handle thumbnail deletions first
    $currentThumbnails = json_decode($tumbler->thumbnails) ?? [];
    $deletedThumbnails = $request->input('deleted_thumbnails', []);
    
    // Filter out deleted thumbnails
    $updatedThumbnails = array_filter($currentThumbnails, function($thumbnail) use ($deletedThumbnails) {
        return !in_array($thumbnail, $deletedThumbnails);
    });

    // Handle new file uploads
    $newThumbnailPaths = [];
    if ($request->hasFile('thumbnails')) {
        foreach ($request->file('thumbnails') as $thumbnail) {
            $path = $thumbnail->store('thumbnails', 'public');
            $newThumbnailPaths[] = $path;
        }
    }

    // Merge existing (non-deleted) and new thumbnails
    $allThumbnails = array_merge(array_values($updatedThumbnails), $newThumbnailPaths);

    // Update the tumbler
    $tumbler->update([
        'tumbler_name' => $request->tumbler_name,
        'category_id' => $request->category_id,
        'model_id' => $request->model_id,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'is_available' => $request->is_available ?? 1,
        'colors' => $request->colors,
        'sizes' => $request->sizes,
        'thumbnails' => json_encode($allThumbnails),
    ]);

    // Delete the actual files from storage for deleted thumbnails
    foreach ($deletedThumbnails as $deletedThumbnail) {
        Storage::disk('public')->delete($deletedThumbnail);
    }

    return redirect()->back()->with('success', 'Tumbler updated successfully!');
}

    // delete tumbler product
    public function destroy($id)
    {
        $tumbler = Tumbler::findOrFail($id);
        $tumbler->delete();
        return response()->json(['success' => true]);
    }

    public function rate(Request $request, $id)
    {
        try {
            $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string|max:1000',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json(['errors' => $e->errors()], 422);
            }
            throw $e;
        }

        $tumbler = \App\Models\Tumbler::findOrFail($id);

        $tumbler->reviews()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['rating' => $request->rating, 'comment' => $request->comment]
        );

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Thank you for your rating!');
    }
}
