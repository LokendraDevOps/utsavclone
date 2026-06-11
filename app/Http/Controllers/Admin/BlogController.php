<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::query()->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blogs,slug'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'string', 'max:2048'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['published_at'] = $data['status'] === 'published' ? Carbon::now() : null;

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('status', 'Blog created.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blogs,slug,'.$blog->id],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'string', 'max:2048'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['published_at'] = $data['status'] === 'published' ? ($blog->published_at ?? Carbon::now()) : null;

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('status', 'Blog updated.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return back()->with('status', 'Blog deleted.');
    }
}
