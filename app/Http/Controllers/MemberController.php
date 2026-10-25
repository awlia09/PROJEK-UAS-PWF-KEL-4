<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    // Menampilkan daftar anggota
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('members.create');
    }

    // Menyimpan anggota baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_member'    => ['required', 'unique:members,kode_member'],
            'nama'           => ['required'],
            'email'          => ['nullable', 'email'],
            'nomor_hp'       => ['required', 'numeric'],
            'jenis_kelamin'  => ['required', 'in:Laki-laki,Perempuan'],
            'tanggal_daftar' => ['required', 'date'],
        ]);

        Member::create($data);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    // Menampilkan detail satu anggota
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    // Menampilkan form edit
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    // Menyimpan perubahan
    public function update(Request $request, Member $member)
    {
        $data = $request->validate([
            'kode_member'    => ['required', Rule::unique('members', 'kode_member')->ignore($member->id)],
            'nama'           => ['required'],
            'email'          => ['nullable', 'email'],
            'nomor_hp'       => ['required', 'numeric'],
            'jenis_kelamin'  => ['required', 'in:Laki-laki,Perempuan'],
            'tanggal_daftar' => ['required', 'date'],
        ]);

        $member->update($data);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    // Menghapus anggota
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus.');
    }
}