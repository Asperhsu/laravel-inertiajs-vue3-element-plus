<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Http\Requests\OrganizationRequest;

class OrganizationsController extends Controller
{
    public function index(Request $request)
    {
        return inertia('Organizations/Index', [
            'filters' => $request->all('search', 'order_by', 'order_asc'),
            'organizations' => Organization::query()
                ->when($request->input('order_by'), function ($query, $orderBy) use ($request) {
                    $direction = $request->input('order_asc', 'true') == 'true' ? 'asc' : 'desc';
                    $query->orderBy($orderBy, $direction);
                })
                ->filter($request->only('search'))
                ->paginate()
                ->withQueryString(),
        ]);
    }

    public function create()
    {
        return inertia('Organizations/Create');
    }

    public function store(OrganizationRequest $request)
    {
        Organization::create($request->validated());

        return redirect()->route('organizations.index')
            ->with('success', 'Organization created.');
    }

    public function edit(Organization $organization)
    {
        return inertia('Organizations/Edit', [
            'organization' => $organization,
        ]);
    }

    public function update(OrganizationRequest $request, Organization $organization)
    {
        $organization->update($request->validated());

        return redirect()->back()->with('success', 'Organization updated.');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();

        return redirect()->route('organizations.index')
            ->with('success', 'Organization deleted.');
    }
}
