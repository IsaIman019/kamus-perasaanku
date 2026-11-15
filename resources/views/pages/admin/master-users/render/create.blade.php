@extends('pages.admin.master-users.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
                <a href="{{ route('admin.master-users.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.master-users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Minimal 6 karakter" required>
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="ACTIVE">Aktif</option>
                            <option value="INACTIVE">Tidak Aktif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
