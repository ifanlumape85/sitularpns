@extends('layouts.backend.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Role Management</h3>
                            @can('role-create')
                            <a href="{{ route('roles.create') }}" class="btn btn-dark">
                                <i class="fas fa-plus"></i> Create
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
                                    <th>Name</th>
                                    <th style="width: 150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                <tr>
                                    <td>{{ $item->created_at ?? null }}</td>
                                    <td>{{ $item->name ?? null }}</td>
                                    <td>
                                        <a href="{{ route('roles.edit', $item->id) }}" class="btn btn-outline-dark">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('roles.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-dark"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Empty</td>
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