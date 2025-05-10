<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    //
    public function Categories(Request $request)
    {
        $query = Categories::query();

        // Apply search filter if a search query is provided
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $Categories = $query->paginate(4); // Paginate the results
        return view('CRUD.Tumbler_Crud.View_Categories', compact('Categories'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'category_name' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:10240', // 10MB max
        ]);

        // Handle the file upload
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('thumbnail', $imageName, 'public');
        } else {
            dd("No file uploaded");
        }

        // Store the data in the database
        $category = new Categories();
        $category->name = $request->input('category_name');
        $category->thumbnail = $imagePath;
        $category->save();

        return redirect()->back()->with('success', 'Category created successfully!');
    }
    public function update(Request $request, $id)
    {
        $category = Categories::findOrFail($id);

        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:10240', // 10MB max
        ]);

        // Update the category name
        $category->name = $request->input('title');

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete the old thumbnail if it exists
            if ($category->thumbnail && Storage::exists($category->thumbnail)) {
                Storage::delete($category->thumbnail);
            }

            // Store the new thumbnail
            $thumbnailPath = $request->file('thumbnail')->store('public/categories');
            $category->thumbnail = $thumbnailPath;
        }

        // Save the updated category
        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Categories::findOrFail($id);

        // Delete the thumbnail if it exists
        if ($category->thumbnail && Storage::exists($category->thumbnail)) {
            Storage::delete($category->thumbnail);
        }

        // Delete the category
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
