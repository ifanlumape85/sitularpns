@extends('layouts.backend.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Persyaratan/Kelengkapan</h3>
                            @can('persyaratan-create')
                            <a href="{{ route('persyaratan.create') }}" class="btn btn-outline-dark">
                                <i class="fas fa-plus"></i> Tambah persyaratan
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
                                    <th>No</th>
                                    <th>Ujian</th>
                                    <th>Persyaratan</th>
                                    <th>--</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                <tr>
                                    <td>{{ $item->created_at ?? null }}</td>
                                    <td>{{ $item->ujian->nama_ujian ?? null }}</td>
                                    <td>{{ $item->nama_persyaratan ?? null }}</td>

                                    <td>
                                        @can('persyaratan-edit')
                                        <a href="{{ route('persyaratan.edit', $item->id) }}" class="btn btn-outline-dark">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        @endcan
                                        @can('persyaratan-delete')
                                        <form action="{{route('persyaratan.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-dark"><i class="fas fa-trash"></i></button>
                                        </form>
                                        @endcan
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">Empty</td>
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