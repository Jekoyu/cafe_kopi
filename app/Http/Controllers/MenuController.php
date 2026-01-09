<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Tampilkan daftar menu (GROUP BY CATEGORY)
     */
    public function index()
    {
        // ambil kategori + menu di dalamnya (Eloquent ORM)
        // urutin category & menu biar rapi
        $categories = Category::with(['menus' => function ($q) {
                $q->orderBy('name');
            }])
            ->orderBy('name')
            ->get();

        return view('menu.index', compact('categories'));
    }

    /**
     * Form tambah menu
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('menu.create', compact('categories'));
    }

    /**
     * Simpan menu baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:100',
            'price'       => 'required|string|max:50',
            'description' => 'nullable|string',
            'image'       => 'nullable|string',
        ]);

        Menu::create($validated);

        return redirect()
            ->route('menu.index')
            ->with('success', 'Menu berhasil ditambahkan');
    }

    /**
     * Form edit menu
     */
    public function edit(Menu $menu)
    {
        $categories = Category::orderBy('name')->get();

        return view('menu.edit', compact('menu', 'categories'));
    }

    /**
     * Update menu
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:100',
            'price'       => 'required|string|max:50',
            'description' => 'nullable|string',
            'image'       => 'nullable|string',
        ]);

        $menu->update($validated);

        return redirect()
            ->route('menu.index')
            ->with('success', 'Menu berhasil diperbarui');
    }

    /**
     * Hapus menu
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()
            ->route('menu.index')
            ->with('success', 'Menu berhasil dihapus');
    }
}
