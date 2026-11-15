@extends('pages.admin.master-users.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail User</h6>
                <a href="{{ route('admin.master-users.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" value="{{ $user->name }}" disabled>
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" class="form-control" id="role" value="{{ $user->role }}" disabled>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" value="{{ $user->status }}" disabled>
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
