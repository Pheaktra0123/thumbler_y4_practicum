<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\ModelTumbler;
use App\Models\Tumbler;
use Illuminate\Http\Request;

class TumblerController extends Controller
{
    // view table of tumbler products
    public function tumbler(){
        $models = ModelTumbler::all();
        $categories = Categories::all();
        return view("CRUD/Product_Crud/View_Product",compact('models','categories'));
    }
    // create new tumbler product
    public function store(Request $request){
        // Validate the request
        $request->validate([
            'tumbler_name' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'model_id' => 'required|exists:models,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'colors' => 'nullable|array',
            'sizes' => 'nullable|array',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB max
        ]);
    
        // Handle file upload
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }
    
        // Create a new product
        $tumbler = new Tumbler();
        $tumbler->tumbler_name = $request->input('tumbler_name');
        $tumbler->categories_id = $request->input('categories_id');
        $tumbler->model_id = $request->input('model_id');
        $tumbler->price = $request->input('price');
        $tumbler->stock = $request->input('stock');
        $tumbler->description = $request->input('description');
        $tumbler->colors = $request->input('colors', []); // Store colors as JSON
        $tumbler->sizes = $request->input('sizes', []); // Store sizes as JSON
        $tumbler->thumbnail = $thumbnailPath;
        $tumbler->save();
        return redirect()->back()->with('success', 'Tumbler created successfully!');
    }
    // view details of tumbler products
    public function details($id){
        $tumbler = Tumbler::findOrFail($id);
        return view("CRUD/Product_Crud/View_Product_Details",compact('tumbler'));
    }
    // update tumbler product
    public function update(Request $request, $id){
        // Validate the request
        $request->validate([
            'model_id' => 'required|exists:model_tumblers,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required|string',
            'color' => 'required|string',
            'size' => 'required|numeric',
            'rating' => 'required|numeric',
            'is_available' => 'required|boolean',
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:10240', // 10MB max
        ]);

        // Find the tumbler by id
        $tumbler = Tumbler::findOrFail($id);

        // Handle the file upload
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('thumbnail', $imageName, 'public');
            $tumbler->thumbnail = $imagePath;
        }

        // Update the data in the database
        $tumbler->model_id = $request->input('model_id');
        $tumbler->category_id= $request->input('category_id');
        $tumbler->name = $request->input('name');
        $tumbler->price = $request->input('price');
        $tumbler->stock = $request->input('stock');
        $tumbler->description = $request->input('description');
        $tumbler->color= $request->input('color');
        $tumbler->size = $request->input('size');
        $tumbler->rating = $request->input('rating');
        $tumbler->is_available = $request->input('is_available');
        $tumbler->save();
        return redirect()->back()->with('success', 'Tumbler updated successfully!');
    }

    // delete tumbler product
    public function destroy($id){
        $tumbler = Tumbler::findOrFail($id);
        $tumbler->delete();
        return redirect()->back()->with('success', 'Tumbler deleted successfully!');
    }
}
