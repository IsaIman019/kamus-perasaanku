@extends('pages.admin.master-users.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Master Soal</h6>
                <a href="{{ route('admin.master-soal.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Tambah Soal
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="soalTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Level</th>
                                <th>Judul</th>
                                <th>Pertanyaan</th>
                                <th>Jumlah Isian</th>
                                <th>Bobot</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($soal as $i => $s)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $s->level->nama ?? '-' }}</td>
                                <td>{{ $s->judul }}</td>
                                <td>{{ $s->pertanyaan }}</td>
                                <td>{{ $s->jumlah_isian }}</td>
                                <td>{{ $s->bobot }}</td>
                                <td>
                                    @if($s->status == 'ACTIVE')
                                        <span class="badge badge-success">Aktif</span>
                                    @elseif($s->status == 'INACTIVE')
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    @else
                                        <span class="badge badge-secondary">-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.master-soal.show', $s->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.master-soal.edit', $s->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.master-soal.destroy', $s->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm btn-delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#soalTable').DataTable({
        "pageLength": 10,
        "lengthChange": true,
        "ordering": true,
        "language": {
            "search": "Cari Data:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "paginate": {
                "first": "Awal",
                "last": "Akhir",
                "next": "›",
                "previous": "‹"
            },
            "zeroRecords": "Tidak ada data yang cocok",
        }
    });

    // SweetAlert delete confirmation
    $('.btn-delete').click(function (e) {
        e.preventDefault();
        let form = $(this).closest('form');

        Swal.fire({
            title: 'Yakin hapus?',
            text: "Data soal ini akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endpush
