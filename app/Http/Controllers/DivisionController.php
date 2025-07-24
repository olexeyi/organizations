<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Organization;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function create(Request $request)
    {
        $organization = Organization::findOrFail($request->input('org_id'));
        $parentDivisions = Division::where('organization_id', $organization->id)->get();

        return view('divisions.create', compact('organization', 'parentDivisions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'head' => 'nullable|string|max:255',
            'organization_id' => 'required|exists:organizations,id',
            'parent_id' => 'nullable|exists:divisions,id',
        ]);

        Division::create($validated);

        return redirect()->route('organizations.index')->with('success', 'Подразделение добавлено');
    }

    public function edit(Division $division)
    {
        $parentDivisions = Division::where('organization_id', $division->organization_id)
            ->where('id', '!=', $division->id)
            ->get();

        return view('divisions.edit', [
            'division' => $division,
            'organization' => $division->organization,
            'parentDivisions' => $parentDivisions,
        ]);
    }

    public function update(Request $request, Division $division)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'head' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:divisions,id',
        ]);

        $division->update($validated);

        return redirect()->route('organizations.index')->with('success', 'Подразделение обновлено');
    }

    public function destroy(Division $division)
    {
        $division->delete();

        return redirect()->route('organizations.index')->with('success', 'Подразделение удалено');
    }
}
