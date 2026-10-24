@extends('layouts.app')

@section('title', 'Daftar Member')

@section('content')

    <form action="{{ route('members.update', $member) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="member_code" value="{{ old('member_code') }}">
        <input type="text" name="name" value="{{ old('name') }}">
        <input type="email" name="email" value="{{ old('email') }}">
        <input type="text" name="phone" value="{{ old('phone') }}">
        <textarea name="address">{{ old('address') }}</textarea>
        <button type="submit">Simpan</button>
    </form>