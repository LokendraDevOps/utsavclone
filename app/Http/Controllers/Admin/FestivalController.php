<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class FestivalController extends Controller
{
    public function index()
    {
        return view('admin.festivals.index', [
            'festivals' => Festival::query()->orderBy('festival_date')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.festivals.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:festivals,slug'],
            'festival_date' => ['required', 'date'],
            'description' => ['required', 'string'],
            'featured_image' => ['nullable', 'string', 'max:2048'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);

        Festival::create($data);

        return redirect()->route('admin.festivals.index')->with('status', 'Festival created.');
    }

    public function edit(Festival $festival)
    {
        return view('admin.festivals.edit', compact('festival'));
    }

    public function update(Request $request, Festival $festival)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:festivals,slug,'.$festival->id],
            'festival_date' => ['required', 'date'],
            'description' => ['required', 'string'],
            'featured_image' => ['nullable', 'string', 'max:2048'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);

        $festival->update($data);

        return redirect()->route('admin.festivals.index')->with('status', 'Festival updated.');
    }

    public function destroy(Festival $festival)
    {
        $festival->delete();

        return back()->with('status', 'Festival deleted.');
    }
}
