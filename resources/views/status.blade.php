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
                        <div class="card-title">Registrasi</div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-nowrap">
                            <tr>
                                <th>Tanggal</th>
                                <th>Nomor</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Layanan</th>
                                <th>Berkas</th>
                                <th>--</th>
                            </tr>
                            @foreach($registrasis as $registrasi)
                            <tr>
                                <td>{{ $registrasi->created_at ?? null }}</td>
                                <td>{{ $registrasi->no_registrasi ?? null }}</td>
                                <td>{{ $registrasi->detail_user->nip ?? null }}</td>
                                <td>{{ $registrasi->detail_user->user->name ?? null }}</td>
                                <td>{{ $registrasi->detail_user->ujian->nama_ujian ?? null }}</td>
                                <td>{{ $registrasi->persyaratan_users()->count() ?? 0 }}/{{ $registrasi->detail_user->ujian->persyaratan()->count() ?? 0 }}</td>
                                <td><a href="{{ route('registrasi.show', $registrasi->id) }}" class="btn btn-outline-dark"><i class="fa fa-eye"></i></a></td>
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