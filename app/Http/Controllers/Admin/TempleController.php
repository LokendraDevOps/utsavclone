<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Temple;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TempleController extends Controller
{
    public function index()
    {
        return view('admin.temples.index', [
            'temples' => Temple::query()->withCount('pujas')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.temples.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:temples,slug'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'featured_image' => ['nullable', 'string', 'max:2048'],
            'gallery' => ['nullable', 'array'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        $data['is_featured'] = $request->boolean('is_featured');

        Temple::create($data);

        return redirect()->route('admin.temples.index')->with('status', 'Temple created.');
    }

    public function edit(Temple $temple)
    {
        return view('admin.temples.edit', compact('temple'));
    }

    public function update(Request $request, Temple $temple)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:temples,slug,'.$temple->id],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'featured_image' => ['nullable', 'string', 'max:2048'],
            'gallery' => ['nullable', 'array'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        $data['is_featured'] = $request->boolean('is_featured');

        $temple->update($data);

        return redirect()->route('admin.temples.index')->with('status', 'Temple updated.');
    }

    public function destroy(Temple $temple)
    {
        $temple->delete();

        return back()->with('status', 'Temple deleted.');
    }
}
