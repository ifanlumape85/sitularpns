@extends('layouts.backend.app')
@push('addon-script')
<!-- bs-custom-file-input -->
<script src="/template/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $item->nama_ujian }}</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>{{ $item->nama_ujian }}</strong><br />({{ $item->deskripsi }})</p>
                        @if($item->persyaratan)
                        <p><strong>Adapun persyaratan adalah sebagai berikut :</strong></p>
                        <div class="text-danger text-uppercase mt-4 mb-4 text-bold">Surat Pernyataan, Surat Permohonan, Surat Rekomendasi Kepala Unit Kerja mengikuti format yang sudah ditentukan. Download dan diisi sesuai format !!!</div>
                        @foreach($item->persyaratan as $persyaratan)

                        <a href="{{ $persyaratan->berkas ? env('APP_URL').'/storage/'.$persyaratan->berkas : null }}" target="_blank" class="btn btn-outline-dark btn-block mb-2">{{ $persyaratan->nama_persyaratan }}</a>
                        @endforeach

                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('detail_user.create') }}" class="btn btn-default">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection