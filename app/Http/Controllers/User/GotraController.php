<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\GotraEntry;
use Illuminate\Http\Request;

class GotraController extends Controller
{
    public function index()
    {
        return view('user.gotra-information.index', [
            'gotras' => auth()->user()->gotraEntries()->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('user.gotra-information.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'gotra' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'is_default' => ['nullable', 'boolean'],
        ]);

        auth()->user()->gotraEntries()->create($data);

        return redirect()->route('user.gotra-information.index')->with('status', 'Gotra saved.');
    }

    public function edit(GotraEntry $gotraInformation)
    {
        $this->authorize('update', $gotraInformation);

        return view('user.gotra-information.edit', ['gotra' => $gotraInformation]);
    }

    public function update(Request $request, GotraEntry $gotraInformation)
    {
        $this->authorize('update', $gotraInformation);

        $data = $request->validate([
            'gotra' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'is_default' => ['nullable', 'boolean'],
        ]);

        $gotraInformation->update($data);

        return redirect()->route('user.gotra-information.index')->with('status', 'Gotra updated.');
    }

    public function destroy(GotraEntry $gotraInformation)
    {
        $this->authorize('delete', $gotraInformation);

        $gotraInformation->delete();

        return back()->with('status', 'Gotra deleted.');
    }
}
