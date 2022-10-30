@extends('layouts.backend.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Verifikasi email anda</div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Link verifikasi yang baru sudah dikirim ke alamat email anda.
                        </div>
                        @endif
                        Sebelum melanjutkan, mohon cek email anda untuk link verifikasi.
                        Jika anda tidak menerima email,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Klik disini untuk permintaan lagi</button>.
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection