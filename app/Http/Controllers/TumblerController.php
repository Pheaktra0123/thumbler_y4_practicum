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
        $categories = Categories::paginate(6); // Paginate categories (6 per page)
        $tumblers = Tumbler::paginate(8); // Paginate tumblers (8 per page)
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
        $tumbler->thumbnails = json_encode($thumbnailPaths);
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

        $tumbler->colors = is_array($tumbler->colors) ? $tumbler->colors : (json_decode($tumbler->colors, true) ?? []);
        $tumbler->thumbnails = is_array($tumbler->thumbnails) ? $tumbler->thumbnails : (json_decode($tumbler->thumbnails, true) ?? []);

        return view('Pages.details_tumbler', compact('tumbler'));
    }
    // update tumbler product
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255', // This is the field name from the form
            'categories_id' => 'required|exists:categories,id',
            'model_id' => 'required|exists:model_tumblers,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'is_available' => 'nullable|boolean',
            'colors' => 'nullable',
            'sizes' => 'nullable',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Find the tumbler by ID
        $tumbler = Tumbler::findOrFail($id);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $tumbler->thumbnails = json_encode([$thumbnailPath]);
        }

        // Handle multiple file uploads
        if ($request->hasFile('thumbnails')) {
            $thumbnailPaths = [];
            foreach ($request->file('thumbnails') as $thumbnail) {
                $thumbnailPath = $thumbnail->store('thumbnails', 'public');
                $thumbnailPaths[] = $thumbnailPath;
            }
            $tumbler->thumbnails = json_encode($thumbnailPaths); // Store as JSON
        }

        // Process colors - handle the string input from the form
        if ($request->has('colors')) {
            $colors = is_array($request->colors) ? $request->colors : explode(',', $request->colors);
            $colors = array_map('trim', $colors);
            $tumbler->colors = json_encode($colors);
        }

        // Process sizes - handle the string input from the form
        if ($request->has('sizes')) {
            $sizes = is_array($request->sizes) ? $request->sizes : explode(',', $request->sizes);
            $sizes = array_map('trim', $sizes);
            $tumbler->sizes = json_encode($sizes);
        }

        // Update the tumbler
        $tumbler->tumbler_name = $request->input('title'); // Map 'title' from form to 'tumbler_name' in DB
        $tumbler->category_id = $request->input('categories_id');
        $tumbler->model_id = $request->input('model_id');
        $tumbler->price = $request->input('price');
        $tumbler->stock = $request->input('stock');
        $tumbler->description = $request->input('description', '');
        $tumbler->is_available = $request->input('is_available', 1);
        $tumbler->rating = $tumbler->rating ?? 3.9; // fallback if not set
        $tumbler->rating_count = $tumbler->rating_count ?? 27;
        $tumbler->save();

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
