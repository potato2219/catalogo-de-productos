<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the home page with the list of computer hardware products.
     */
    public function index(Request $request): View
    {
        $category = $request->query('category');
        $search = $request->query('search');
        $sort = $request->query('sort', 'default');

        $query = Product::query();

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        if ($search) {
            $query->where(function ($q) use ($search): void {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('brand', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        match ($sort) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'rating' => $query->orderBy('rating', 'desc'),
            'name' => $query->orderBy('name', 'asc'),
            default => $query->orderBy('is_featured', 'desc')->latest(),
        };

        $products = $query->get();
        $categories = Product::select('category')->distinct()->pluck('category');

        return view('home', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $category ?? 'all',
            'currentSearch' => $search,
            'currentSort' => $sort,
        ]);
    }
}
