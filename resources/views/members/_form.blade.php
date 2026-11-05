<div class="form-group">
    <label class="form-label" for="kode_member">Kode Member</label>
    <input type="text" id="kode_member" name="kode_member"
           class="form-control @error('kode_member') is-invalid @enderror"
           value="{{ old('kode_member', $member->kode_member ?? '') }}" required placeholder="Contoh: MBR-010">
</div>

<div class="form-group">
    <label class="form-label" for="nama">Nama Lengkap</label>
    <input type="text" id="nama" name="nama"
           class="form-control @error('nama') is-invalid @enderror"
           value="{{ old('nama', $member->nama ?? '') }}" required placeholder="Masukkan nama anggota">
</div>

<div class="form-group">
    <label class="form-label" for="email">Email</label>
    <input type="email" id="email" name="email"
           class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $member->email ?? '') }}" required placeholder="nama@email.com">
</div>

<div class="form-group">
    <label class="form-label" for="nomor_hp">No. HP</label>
    <input type="text" id="nomor_hp" name="nomor_hp"
           class="form-control @error('nomor_hp') is-invalid @enderror"
           value="{{ old('nomor_hp', $member->nomor_hp ?? '') }}" placeholder="08123456789">
    <div class="form-hint">Opsional. Angka saja (boleh diawali +), 8 sampai 15 digit.</div>
</div>

<div class="form-group">
    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
    <select id="jenis_kelamin" name="jenis_kelamin"
            class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
        <option value="">-- Pilih --</option>
        <option value="L" {{ old('jenis_kelamin', $member->jenis_kelamin ?? '') === 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ old('jenis_kelamin', $member->jenis_kelamin ?? '') === 'P' ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>

<div class="form-group">
    <label class="form-label" for="tanggal_daftar">Tanggal Daftar</label>
    <input type="date" id="tanggal_daftar" name="tanggal_daftar"
           class="form-control @error('tanggal_daftar') is-invalid @enderror"
           value="{{ old('tanggal_daftar', isset($member) ? $member->tanggal_daftar->format('Y-m-d') : date('Y-m-d')) }}" required>
</div>