<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Auth::user()->products()->count();
        $recentProducts = Auth::user()->products()->latest()->take(5)->get();
        $productsByCategory = Auth::user()->products()
            ->selectRaw('category_id, categories.name as category_name, COUNT(*) as count')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->groupBy('category_id', 'categories.name')
            ->get();

        return view('dashboard', compact('totalProducts', 'recentProducts', 'productsByCategory'));
    }
}