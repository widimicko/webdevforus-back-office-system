<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.members.members', [
            'members' => Member::with('group')->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.members.create', [
            'groups' => Group::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        $validatedRequest = $request->validated();
        $validatedRequest['profile_pic'] = $request->file('profile_pic')->store('member/profile_pic');

        Member::create($validatedRequest);
        return redirect()->route('members.index')->with('success', 'Member created successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('dashboard.members.edit', [
            'member' => $member,
            'groups' => Group::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemberRequest  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $validatedRequest = $request->validated();
        if ($request->hasFile('profile_pic')) {
            Storage::delete($member->profile_pic);
            $validatedRequest['profile_pic'] = $request->file('profile_pic')->store('member/profile_pic');
        }

        $member->update($validatedRequest);
        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        Storage::delete($member->profile_pic);
        $member->delete();
        return redirect()->back()->with('success', 'Member deleted successfully');
    }
}
