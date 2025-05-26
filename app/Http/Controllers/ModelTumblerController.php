<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\ModelTumbler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModelTumblerController extends Controller
{
    //
    public function Model(Request $request)
    {
        $query = ModelTumbler::query();
        $query->with('category'); // Eager load the category relationship
        $query->orderBy('created_at', 'Asc'); // Order by created_at in ascending order

        // Add this block for search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', '%' . $search . '%');
        }

        $Models = $query->paginate(4); // Paginate the results (5 per page)
        $tumblers = ModelTumbler::all(); // Get all tumblers
        $categories = Categories::all(); // Get all categories
        // Eager load the category relationship for each model
        foreach ($Models as $model) {
            $model->category_name = $model->category ? $model->category->name : 'Uncategorized';
        }
        return view('CRUD/Model_Crud/View_model', compact('Models', 'categories', 'tumblers'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'model_name' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:10240', // 10MB max
        ]);

        // Handle the file upload
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('thumbnail', $imageName, 'public');
        } else {
            $imagePath = null; // Set a default value if no file is uploaded
        }

        // Store the data in the database
        $model = new ModelTumbler();
        $model->name = $request->input('model_name');
        $model->category_id = $request->input('categories_id'); // Associate with the selected category
        $model->thumbnail = $imagePath;
        $model->save();

        return redirect()->back()->with('success', 'Model created successfully!');
    }
    public function update(Request $request, $id)
    {
        // Find the model to update
        $model = ModelTumbler::findOrFail($id);
    
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id', // Ensure the category exists
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:10240', // 10MB max
        ]);
    
        // Update the model name and category ID
        $model->name = $request->input('title');
        $model->category_id = $request->input('categories_id');
    
        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete the old thumbnail if it exists
            if ($model->thumbnail && Storage::exists('public/categories/' . $model->thumbnail)) {
                Storage::delete('public/categories/' . $model->thumbnail);
            }
    
            // Store the new thumbnail
            $thumbnailPath = $request->file('thumbnail')->store('categories', 'public');
            $model->thumbnail = $thumbnailPath;
        }
    
        // Save the updated model
        $model->save();
    
        return redirect()->back()->with('success', 'Model updated successfully.');
    }
    public function destroy($id)
    {
        $Models = ModelTumbler::findOrFail($id);

        // Delete the thumbnail if it exists
        if ($Models->thumbnail && Storage::exists($Models->thumbnail)) {
            Storage::delete($Models->thumbnail);
        }

        // Delete the category
        $Models->delete();

        return redirect()->back()->with('success', 'Model deleted successfully.');
    }
}
