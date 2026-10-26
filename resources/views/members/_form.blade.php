<div class="mb-3">
    <label class="form-label">Kode Member</label>
    <input type="text" name="kode_member" class="form-control"
           value="{{ old('kode_member', $member->kode_member ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control"
           value="{{ old('nama', $member->nama ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Email (opsional)</label>
    <input type="email" name="email" class="form-control"
           value="{{ old('email', $member->email ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Nomor HP</label>
    <input type="text" name="nomor_hp" class="form-control"
           value="{{ old('nomor_hp', $member->nomor_hp ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label d-block">Jenis Kelamin</label>
    @php
        $jk = old('jenis_kelamin', $member->jenis_kelamin ?? '');
    @endphp
    <div class="form-check form-check-inline">
        <input type="radio" name="jenis_kelamin" value="Laki-laki" id="jk_l"
               class="form-check-input" {{ $jk === 'Laki-laki' ? 'checked' : '' }}>
        <label for="jk_l" class="form-check-label">Laki-laki</label>
    </div>
    <div class="form-check form-check-inline">
        <input type="radio" name="jenis_kelamin" value="Perempuan" id="jk_p"
               class="form-check-input" {{ $jk === 'Perempuan' ? 'checked' : '' }}>
        <label for="jk_p" class="form-check-label">Perempuan</label>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Tanggal Daftar</label>
    <input type="date" name="tanggal_daftar" class="form-control"
           value="{{ old('tanggal_daftar', isset($member) ? $member->tanggal_daftar->format('Y-m-d') : date('Y-m-d')) }}">
</div>