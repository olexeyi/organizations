<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Organization;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index(Request $request)
    {
        $organizationId = $request->query('organization_id');
        $divisionId = $request->query('division_id');

        $newsQuery = News::query();
        $entity = null;

        if ($divisionId) {
            $division = Division::findOrFail($divisionId);
            $entity = $division;

            $newsQuery->where('division_id', $divisionId);
        } elseif ($organizationId) {
            $organization = Organization::findOrFail($organizationId);
            $entity = $organization;

            $newsQuery->where('organization_id', $organizationId)->whereNull('division_id');
        } else {
            abort(404);
        }

        $news = $newsQuery->latest()->get();

        return view('news.index', compact('news', 'entity'));
    }

    public function create(Request $request)
    {
        if ($request->has('organization_id')) {
            $organization = Organization::findOrFail($request->organization_id);
            return view('news.create', compact('organization'));
        } elseif ($request->has('division_id')) {
            $division = Division::findOrFail($request->division_id);
            return view('news.create', compact('division'));
        }

        abort(404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'organization_id' => 'nullable|exists:organizations,id',
            'division_id' => 'nullable|exists:divisions,id',
        ]);

        if (!empty($validated['division_id']) && empty($validated['organization_id'])) {
            $division = \App\Models\Division::find($validated['division_id']);
            if ($division) {
                $validated['organization_id'] = $division->organization_id;
            }
        }

        $news = \App\Models\News::create($validated);

        if ($news->division_id) {
            return redirect()->route('news.index', ['division_id' => $news->division_id]);
        }

        return redirect()->route('news.index', ['organization_id' => $news->organization_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function getAllNestedDivisionIds(array $parentIds): array
    {
        $all = [];

        foreach ($parentIds as $id) {
            $children = \App\Models\Division::where('parent_id', $id)->pluck('id')->toArray();
            if ($children) {
                $all = array_merge($all, $children, $this->getAllNestedDivisionIds($children));
            }
        }

        return $all;
    }
}
