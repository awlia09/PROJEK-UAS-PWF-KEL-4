<div class="form-group">
    <label class="form-label">Kode Anggota</label>
    <input type="text" name="kode_anggota" class="form-control" value="{{ old('kode_anggota', $member->kode_anggota ?? '') }}" required placeholder="Contoh: ANG-001">
</div>

<div class="form-group">
    <label class="form-label">Nama Lengkap</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $member->nama ?? '') }}" required placeholder="Masukkan nama anggota">
</div>

<div class="form-group">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $member->email ?? '') }}" required placeholder="nama@email.com">
</div>

<div class="form-group">
    <label class="form-label">No. Telepon / HP</label>
    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $member->no_hp ?? '') }}" placeholder="08123456789">
</div>

<div class="form-group">
    <label class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap">{{ old('alamat', $member->alamat ?? '') }}</textarea>
</div>