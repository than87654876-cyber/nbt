<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        // Lấy các danh mục và các món ăn thuộc danh mục đó
        $categories = Category::with(['dishes' => function ($q) use ($query) {
            $q->where('is_available', true);
            if ($query) {
                $q->where('dish_name', 'like', '%'.$query.'%');
            }
        }])->get();

        return view('client.shop', compact('categories', 'query'));
    }

    public function shopLogged(Request $request)
    {
        $query = $request->input('search');

        // Lấy các danh mục và các món ăn thuộc danh mục đó
        $categories = Category::with(['dishes' => function ($q) use ($query) {
            $q->where('is_available', true);
            if ($query) {
                $q->where('dish_name', 'like', '%'.$query.'%');
            }
        }])->get();

        return view('client.shop_logged', compact('categories', 'query'));
    }
}
