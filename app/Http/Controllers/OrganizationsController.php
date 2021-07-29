<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

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
}
