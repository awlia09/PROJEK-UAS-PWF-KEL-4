<div class="mb-3">
    <label class="form-label">Kode Member</label>
    <input type="text" name="kode_member" class="form-control @error('kode_member') is-invalid @enderror"
           value="{{ old('kode_member', $member->kode_member ?? '') }}" required>
    @error('kode_member')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
           value="{{ old('nama', $member->nama ?? '') }}" required>
    @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Email (opsional)</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $member->email ?? '') }}">
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Nomor HP</label>
    <input type="text" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror"
           value="{{ old('nomor_hp', $member->nomor_hp ?? '') }}" required>
    @error('nomor_hp')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label d-block">Jenis Kelamin</label>
    @php
        $jk = old('jenis_kelamin', $member->jenis_kelamin ?? '');
    @endphp
    <div class="form-check form-check-inline">
        <input type="radio" name="jenis_kelamin" value="L" id="jk_l"
               class="form-check-input @error('jenis_kelamin') is-invalid @enderror" 
               {{ $jk === 'L' || $jk === 'Laki-laki' ? 'checked' : '' }} required>
        <label for="jk_l" class="form-check-label">L</label>
    </div>
    <div class="form-check form-check-inline">
        <input type="radio" name="jenis_kelamin" value="P" id="jk_p"
               class="form-check-input @error('jenis_kelamin') is-invalid @enderror" 
               {{ $jk === 'P' || $jk === 'Perempuan' ? 'checked' : '' }} required>
        <label for="jk_p" class="form-check-label">P</label>
    </div>
    @error('jenis_kelamin')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Tanggal Daftar</label>
    @php
        $tglDaftar = date('Y-m-d');
        if (isset($member) && $member->tanggal_daftar) {
            $tglDaftar = is_string($member->tanggal_daftar) 
                ? date('Y-m-d', strtotime($member->tanggal_daftar)) 
                : $member->tanggal_daftar->format('Y-m-d');
        }
    @endphp
    <input type="date" name="tanggal_daftar" class="form-control @error('tanggal_daftar') is-invalid @enderror"
           value="{{ old('tanggal_daftar', $tglDaftar) }}" required>
    @error('tanggal_daftar')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>