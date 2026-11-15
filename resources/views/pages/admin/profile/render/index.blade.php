@extends('pages.admin.profile.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Profil User</h6>
                
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs mb-3" id="profileTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="show-tab" data-toggle="tab" href="#show" role="tab" aria-controls="show" aria-selected="true">Detail Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Edit</a>
                    </li>
                </ul>

                <div class="tab-content" id="profileTabContent">
                    {{-- Show Tab --}}
                    <div class="tab-pane fade show active" id="show" role="tabpanel" aria-labelledby="show-tab">
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                                <p class="card-text"><strong>Role:</strong> {{ $user->role }}</p>
                                <p class="card-text">
                                    <strong>Status:</strong>
                                    @if($user->status == 'ACTIVE')
                                        <span class="badge badge-success">Aktif</span>
                                    @elseif($user->status == 'INACTIVE')
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    @else
                                        <span class="badge badge-secondary">-</span>
                                    @endif
                                </p>
                                <p class="card-text"><small class="text-muted">Dibuat: {{ $user->created_at->format('d M Y H:i') }}</small></p>
                                <p class="card-text"><small class="text-muted">Terakhir diubah: {{ $user->updated_at->format('d M Y H:i') }}</small></p>
                            </div>
                        </div>
                    </div>

                    {{-- Edit Tab --}}
                    <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                        <form action="{{ route('admin.profile.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" readonly required>
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" name="role" class="form-control" value="{{ old('role', $user->role) }}" readonly required>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="ACTIVE" {{ $user->status == 'ACTIVE' ? 'selected' : '' }}>Aktif</option>
                                    <option value="INACTIVE" {{ $user->status == 'INACTIVE' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Password <small class="text-muted">(Kosongkan jika tidak ingin diubah)</small></label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password baru">
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
