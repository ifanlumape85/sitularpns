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
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection