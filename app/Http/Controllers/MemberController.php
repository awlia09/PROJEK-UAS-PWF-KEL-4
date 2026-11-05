<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_member'    => ['required', 'unique:members,kode_member'],
            'nama'           => ['required'],
            'email'          => ['nullable', 'email'],
            'nomor_hp'       => ['required', 'numeric'],
            'jenis_kelamin'  => ['required', 'in:L, P'],
            'tanggal_daftar' => ['required', 'date'],
        ]);

        Member::create($data);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show(Member $member) {
        $member->load('borrowings.details.book');
        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $data = $request->validate([
            'kode_member'    => ['required', Rule::unique('members', 'kode_member')->ignore($member->id)],
            'nama'           => ['required'],
            'email'          => ['nullable', 'email'],
            'nomor_hp'       => ['required', 'numeric'],
            'jenis_kelamin'  => ['required', 'in:L,P'],
            'tanggal_daftar' => ['required', 'date'],
        ]);

        $member->update($data);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(Member $member) {
        if ($member->borrowings()->exists()) {
            return back()->with('error', 'Anggota masih memiliki peminjaman, tidak dapat dihapus.');
        }

        $member->delete();

        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus.');
    }
}