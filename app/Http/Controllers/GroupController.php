<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Requests\StoreGroupRequest;

class GroupController extends Controller
{
    public function index()
    {
        return view('dashboard.groups.groups', [
            'groups' => Group::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function store(StoreGroupRequest $request)
    {
        Group::create($request->validated());
        return redirect()->back()->with('success', 'Group created successfully');
    }

    public function update(StoreGroupRequest $request, Group $group)
    {
        $group->update($request->validated());
        return response()->json(['message' => 'Group updated successfully']);
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->back()->with('success', 'Group deleted successfully');

    }
}
