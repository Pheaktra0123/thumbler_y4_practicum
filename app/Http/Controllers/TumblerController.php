<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\ModelTumbler;
use App\Models\Tumbler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TumblerController extends Controller
{
    // view table of tumbler products
    public function tumbler()
    {
        $models = ModelTumbler::all();
        $categories = Categories::all();
        $tumblers = Tumbler::all();
        return view("CRUD/Product_Crud/View_Product", compact('models', 'categories','tumblers'));
    }
    // create new tumbler product
    public function store(Request $request)
    {
        // Debugging: Dump the request data
        //dd($request->all());

        // Validate the request
        $request->validate([
            'tumbler_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'model_id' => 'required|exists:model_tumblers,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'is_available' => 'nullable|boolean',
            'colors' => 'nullable',
            'sizes' => 'nullable|array',
            'thumbnails' => 'nullable|array',
            'thumbnails.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB max per file
        ]);

        // Handle multiple file uploads
        $thumbnailPaths = [];
        if ($request->hasFile('thumbnails')) {
            // Debug line you can uncomment if needed
            // Log::info('Found ' . count($request->file('thumbnails')) . ' files in request');
            
            foreach ($request->file('thumbnails') as $thumbnail) {
                $thumbnailPath = $thumbnail->store('thumbnails', 'public');
                $thumbnailPaths[] = $thumbnailPath;
            }
        }

        // Process colors - ensure they're stored as a simple JSON array
        $colors = [];
        if ($request->has('colors')) {
            $colorsInput = $request->input('colors');
            if (is_array($colorsInput)) {
                // If it's already an array, use it directly
                $colors = $colorsInput;
            } elseif (is_string($colorsInput)) {
                // If it's a JSON string, decode it
                $decodedColors = json_decode($colorsInput, true);
                if (is_array($decodedColors)) {
                    $colors = $decodedColors;
                } else {
                    // If it's a comma-separated string, split it
                    $colors = array_map('trim', explode(',', $colorsInput));
                }
            }
        }

        // Create a new product
        $tumbler = new Tumbler();
        $tumbler->tumbler_name = $request->input('tumbler_name');
        $tumbler->category_id = $request->input('category_id');
        $tumbler->model_id = $request->input('model_id');
        $tumbler->price = $request->input('price');
        $tumbler->stock = $request->input('stock');
        $tumbler->description = $request->input('description');
        $tumbler->is_available = $request->input('is_available', true);
        $tumbler->colors = json_encode($colors); // Store colors as a simple JSON array
        $tumbler->sizes = json_encode($request->input('sizes', []));
        $tumbler->thumbnails = json_encode($thumbnailPaths);
        $tumbler->save();

        return redirect()->back()->with('success', 'Tumbler created successfully!');
    }
    // view details of tumbler products
    public function details($id)
    {
        $tumbler = Tumbler::findOrFail($id);
        return view("CRUD/Product_Crud/View_Product_Details", compact('tumbler'));
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
        $tumbler->save();

        return redirect()->back()->with('success', 'Tumbler updated successfully!');
    }

    // delete tumbler product
    public function destroy($id)
    {
        $tumbler = Tumbler::findOrFail($id);
        $tumbler->delete();
        return redirect()->back()->with('success', 'Tumbler deleted successfully!');
    }
}
