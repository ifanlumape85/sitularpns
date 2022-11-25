@extends('layouts.backend.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h1 class="h5 text-dark">Registrasi</h1>
                            @can('detail_user-create')
                            <a href="{{ route('detail_user.create') }}" class="btn btn-dark">
                                <i class="fas fa-plus"></i> Daftar
                            </a>
                            @endcan
                        </div>

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
                                    <th>Tanggal</th>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Layanan</th>
                                    <th style="width: 190px">--</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                <tr>
                                    <td>{{ $item->created_at ?? null }}</td>
                                    <td>{{ $item->no_registrasi ?? null }}</td>
                                    <td>{{ $item->name ?? null }}</td>
                                    <td>{{ $item->nama_ujian ?? null }}</td>
                                    <td>
                                        @can('registrasi-list')
                                        <a href="{{ route('registrasi.show', $item->id) }}" class="btn btn-outline-dark">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @endcan
                                        @can('registrasi-edit')
                                        <a href="{{ route('registrasi.edit', $item->id) }}" class="btn btn-outline-dark">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan
                                        @can('registrasi-delete')
                                        <form action="{{route('registrasi.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-dark"><i class="fas fa-trash"></i></button>
                                        </form>
                                        @endcan
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