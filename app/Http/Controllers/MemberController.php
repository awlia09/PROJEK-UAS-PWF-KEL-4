<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller {
    public function index() {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create() {
        return view('members.create');
    }

    public function store(Request $request) {
        Member::create($request->all());
        return redirect()->route('members.index');
    }

    public function show(Member $member) {
        return view('members.show', compact('member'));
    }

    public function edit(Member $member) {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member) {
        $member->update($request->all());
        return redirect()->route('members.index');
    }

    public function destroy(Member $member) {
        $member->delete();
        return redirect()->route('members.index');
    }
}