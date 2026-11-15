{{-- resources/views/pages/admin/master-perasaan/render/index.blade.php --}}
@extends('pages.admin.master-perasaan.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Master Emosi</h6>
                <a href="{{ route('admin.master-perasaan.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Tambah Emosi
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="perasaanTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($perasaans as $i => $item)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    @if($item->status == 'ACTIVE')
                                        <span class="badge badge-success">Aktif</span>
                                    @elseif($item->status == 'INACTIVE')
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    @else
                                        <span class="badge badge-secondary">-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.master-perasaan.show', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.master-perasaan.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.master-perasaan.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
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
        $('#perasaanTable').DataTable({
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
                text: "Data Perasaan ini akan dihapus permanen!",
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
