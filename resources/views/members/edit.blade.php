@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Anggota</h3>

    <form action="{{ route('members.update', $member) }}" method="POST">
        @csrf
        @method('PUT')
        @include('members._form')
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection