@extends('pages.admin.skor-user.wrapper')

@section('render')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Skor User: {{ $user->name }}</h6>
                <a href="{{ route('admin.skor-user.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
            <div class="card-body">
                @if($user->skor->count())
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Level</th>
                                <th>Skor</th>
                                <th>Terakhir Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->skor as $i => $skor)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $skor->level->nama }}</td>
                                <td>{{ $skor->score }}</td>
                                <td>{{ $skor->updated_at->format('d-m-Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p>User belum memiliki skor.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
