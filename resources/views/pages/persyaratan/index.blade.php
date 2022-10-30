@extends('layouts.backend.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Persyaratan</h3>
                            @can('persyaratan-create')
                            <a href="{{ route('persyaratan.create') }}" class="btn btn-outline-secondary">
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
                                    <th style="width: 10px">No</th>
                                    <th>Ujian</th>
                                    <th>Persyaratan</th>
                                    <th style="width: 150px">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                <tr>
                                    <td>{{ $items->count() * ($items->currentPage() - 1) + $loop->iteration }}</td>
                                    <td>{{ $item->ujian->nama_ujian }}</td>
                                    <td>{{ $item->nama_persyaratan }}</td>

                                    <td>
                                        @can('persyaratan-edit')
                                        <a href="{{ route('persyaratan.edit', $item->id) }}" class="btn btn-outline-secondary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        @endcan
                                        @can('persyaratan-delete')
                                        <form action="{{route('persyaratan.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-secondary"><i class="fas fa-trash"></i></button>
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