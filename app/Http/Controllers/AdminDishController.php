<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class AdminDishController extends Controller
{
    // List all dishes
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');

        $query = Dish::with('category');

        if ($search) {
            $query->where('dish_name', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%');
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $dishes = $query->get();
        $categories = Category::all();

        return view('admin.single_dishes', compact('dishes', 'categories', 'search', 'categoryId'));
    }

    // View dish details
    public function show($id)
    {
        $dish = Dish::with('category')->findOrFail($id);

        return view('admin.single_dishes_detail', compact('dish'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::all();

        return view('admin.single_dishes_add', compact('categories'));
    }

    // Save new dish
    public function store(Request $request)
    {
        $request->validate([
            'dish_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_available' => 'boolean',
        ]);

        $data = $request->only('dish_name', 'category_id', 'price', 'description');
        $data['is_available'] = $request->has('is_available');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/dishes'), $filename);
            $data['image_url'] = 'uploads/dishes/'.$filename;
        }

        Dish::create($data);

        return redirect()->route('quanly_monandon')->with('success', 'Đã thêm món ăn mới thành công!');
    }

    // Show edit form
    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        $categories = Category::all();

        return view('admin.single_dishes_edit', compact('dish', 'categories'));
    }

    // Update dish
    public function update(Request $request, $id)
    {
        $request->validate([
            'dish_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_available' => 'boolean',
        ]);

        $dish = Dish::findOrFail($id);
        $data = $request->only('dish_name', 'category_id', 'price', 'description');
        $data['is_available'] = $request->has('is_available');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($dish->image_url && file_exists(public_path($dish->image_url))) {
                @unlink(public_path($dish->image_url));
            }

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/dishes'), $filename);
            $data['image_url'] = 'uploads/dishes/'.$filename;
        }

        $dish->update($data);

        return redirect()->route('quanly_monandon')->with('success', 'Đã cập nhật món ăn thành công!');
    }

    // Delete dish
    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);

        // Delete image file if exists
        if ($dish->image_url && file_exists(public_path($dish->image_url))) {
            @unlink(public_path($dish->image_url));
        }

        $dish->delete();

        return redirect()->route('quanly_monandon')->with('success', 'Đã xóa món ăn thành công!');
    }
}
