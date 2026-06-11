<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Puja;
use App\Models\Temple;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PujaController extends Controller
{
    public function index()
    {
        return view('admin.pujas.index', [
            'pujas' => Puja::query()->with(['temple', 'category'])->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.pujas.create', [
            'temples' => Temple::orderBy('name')->get(),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'temple_id' => ['required', 'exists:temples,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:pujas,slug'],
            'description' => ['required', 'string'],
            'benefits' => ['required', 'string'],
            'duration_minutes' => ['required', 'integer', 'min:15'],
            'price' => ['required', 'numeric', 'min:0'],
            'featured_image' => ['nullable', 'string', 'max:2048'],
            'status' => ['required', 'in:draft,published'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        $data['is_featured'] = $request->boolean('is_featured');

        Puja::create($data);

        return redirect()->route('admin.pujas.index')->with('status', 'Puja created.');
    }

    public function edit(Puja $puja)
    {
        return view('admin.pujas.edit', [
            'puja' => $puja,
            'temples' => Temple::orderBy('name')->get(),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Puja $puja)
    {
        $data = $request->validate([
            'temple_id' => ['required', 'exists:temples,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:pujas,slug,'.$puja->id],
            'description' => ['required', 'string'],
            'benefits' => ['required', 'string'],
            'duration_minutes' => ['required', 'integer', 'min:15'],
            'price' => ['required', 'numeric', 'min:0'],
            'featured_image' => ['nullable', 'string', 'max:2048'],
            'status' => ['required', 'in:draft,published'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        $data['is_featured'] = $request->boolean('is_featured');

        $puja->update($data);

        return redirect()->route('admin.pujas.index')->with('status', 'Puja updated.');
    }

    public function destroy(Puja $puja)
    {
        $puja->delete();

        return back()->with('status', 'Puja deleted.');
    }
}
