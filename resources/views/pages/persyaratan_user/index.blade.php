@extends('layouts.backend.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Berkas</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Pelayanan</th>
                                    <th>Berkas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                <tr>
                                    <td><a href="{{ route('registrasi.show', $item->id_registrasi) }}" class="btn btn-outline-secondary"><strong>{{ $item->no_registrasi ?? null }}</strong></a></td>
                                    <td>{{ $item->nip ?? null }}<br />{{ $item->name ?? null }}</td>
                                    <td>{{ $item->nama_ujian ?? null }}</td>
                                    <td>
                                        {{ $item->nama_persyaratan ?? null }}.

                                    </td>
                                    <td>
                                        @if(Storage::disk('public')->exists($item->berkas ?? null))

                                        <a href="{{ route('berkas.show', $item->id) }}" class="btn btn-secondary">Lihat</a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Empty</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection