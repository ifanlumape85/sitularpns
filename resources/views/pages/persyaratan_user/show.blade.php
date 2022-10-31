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
                        <div class="d-flex justify-content-between">
                            <h2 class="h4">Detail Surat</h2>
                            @can('registrasi-list')
                            <a href="{{ route('registrasi.show', $item->id_registrasi) }}" class="btn btn-default">Kembali</a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div>NIP</div>
                        <p class="text-bold">{{ $item->registrasi->detail_user->nip ?? null }}</p>
                        <div>Nama</div>
                        <p class="text-bold">{{ $item->registrasi->detail_user->user->name ?? null }}</p>
                        <div>Berkas Persyaratan</div>
                        <p class="text-bold">{{ $item->persyaratan->nama_persyaratan ?? null }}</p>


                        <embed src="{{ Storage::url($item->berkas) }}" type="application/pdf" width="100%" height="860">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection