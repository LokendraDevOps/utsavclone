<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{
    public function index()
    {
        return view('user.family-members.index', [
            'familyMembers' => auth()->user()->familyMembers()->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('user.family-members.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'relation' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'date'],
            'gender' => ['nullable', 'string', 'max:50'],
        ]);

        auth()->user()->familyMembers()->create($data);

        return redirect()->route('user.family-members.index')->with('status', 'Family member added successfully.');
    }

    public function edit(FamilyMember $familyMember)
    {
        $this->authorize('update', $familyMember);

        return view('user.family-members.edit', compact('familyMember'));
    }

    public function update(Request $request, FamilyMember $familyMember)
    {
        $this->authorize('update', $familyMember);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'relation' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'date'],
            'gender' => ['nullable', 'string', 'max:50'],
        ]);

        $familyMember->update($data);

        return redirect()->route('user.family-members.index')->with('status', 'Family member updated.');
    }

    public function destroy(FamilyMember $familyMember)
    {
        $this->authorize('delete', $familyMember);

        $familyMember->delete();

        return back()->with('status', 'Family member deleted.');
    }
}
