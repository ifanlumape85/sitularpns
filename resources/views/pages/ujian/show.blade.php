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
                        <ol>
                            @foreach($item->persyaratan as $persyaratan)
                            <li>{{ $persyaratan->nama_persyaratan }}</li>
                            @endforeach

                            @endif
                        </ol>
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