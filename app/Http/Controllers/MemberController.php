<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Imports\MembersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    public function index()
    {
        return view('dashboard.members.members', [
            'members' => Member::with('group')->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.members.create', [
            'groups' => Group::all()
        ]);
    }

    public function store(StoreMemberRequest $request)
    {
        $validatedRequest = $request->validated();
        $validatedRequest['profile_pic'] = $request->file('profile_pic')->store('member/profile_pic');

        Member::create($validatedRequest);
        return redirect()->route('members.index')->with('success', 'Member created successfully');

    }

    public function edit(Member $member)
    {
        return view('dashboard.members.edit', [
            'member' => $member,
            'groups' => Group::all()
        ]);
    }

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

    public function destroy(Member $member)
    {
        Storage::delete($member->profile_pic);
        $member->delete();
        return redirect()->back()->with('success', 'Member deleted successfully');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'excel' => 'required|mimes:xls,xlsx,csv'
        ]);

        Excel::import(new MembersImport, request()->file('excel'));
        return redirect()->back()->with('success', 'Data imported successfully');
    }
}
