@extends('layouts.backend.app', ['h1_title' => 'SITULAR PNS'])
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p><strong>Hai, {{ auth()->user()->name ?? null }} | {{ auth()->user()->getRoleNames()[0] ?? null }}</strong></p>

            </div>
            @if(!auth()->user()->isAdmin())
            @foreach($ujians as $ujian)
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">{{ $ujian->nama_ujian }}</div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">{{ $ujian->deskripsi }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('detail-ujian', $ujian) }}" class="btn btn-default">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <!-- /.row -->
        @if(auth()->user()->isAdmin())
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <a href="{{ route('status_registrasi') }}" class="text-dark">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pendaftaran</span>
                            <span class="info-box-number">
                                {{ $registrasi ?? 0 }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Layanan</span>
                        <span class="info-box-number">{{ $ujians->count() ?? 0 }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <a href="{{ route('aktif') }}" class="text-dark">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pengguna Aktif</span>
                            <span class="info-box-number">{{ $active ?? 0 }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <a href="{{ route('tidak') }}" class="text-dark">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pengguna Tidak Aktif</span>
                            <span class="info-box-number">{{ $not_active ?? 0 }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        @endif
        <!-- /.row -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection