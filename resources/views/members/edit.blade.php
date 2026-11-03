@extends('layouts.app')

@section('content')
    <div class="card" style="max-width: 600px; margin: 0 auto;">
        <h2 class="page-title" style="margin-bottom: 1.5rem;">Edit Data Anggota</h2>

        <form action="{{ route('members.update', $member->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('members._form')

            <div class="btn-group" style="margin-top: 1.5rem;">
                <button type="submit" class="btn btn-simpan">Update Anggota</button>
                <a href="{{ route('members.index') }}" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>
@endsection