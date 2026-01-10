<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;

class AdminDashboardController extends Controller
{
  public function index()
  {
    $stats = [
      'total_menus' => Menu::count(),
      'total_categories' => Category::count(),
      'available_menus' => Menu::where('is_available', true)->count(),
      'unavailable_menus' => Menu::where('is_available', false)->count(),
    ];

    $recentMenus = Menu::with('category')
      ->latest()
      ->take(5)
      ->get();

    $categories = Category::withCount('menus')
      ->orderBy('menus_count', 'desc')
      ->get();

    return view('admin.dashboard.index', compact('stats', 'recentMenus', 'categories'));
  }
}
