@extends('layouts.backend.app', ['h1_title' => 'SITULAR PNS'])
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Pengguna/User</div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-nowrap">
                            <tr>
                                <th>Tanggal</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Verified At</th>
                            </tr>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $item->created_at ?? null }}</td>
                                <td>{{ $item->name ?? null }}</td>
                                <td>{{ $item->email ?? null }}</td>
                                <td>
                                    @if($item->email_verified_at == null)
                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-dark p-0 m-0 align-baseline">Kirim email aktivasi</button>.
                                    </form>
                                    @else
                                    {{ $item->email_verified_at ?? null }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection