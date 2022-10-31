@extends('layouts.backend.app')
@push('addon-script')
<!-- bs-custom-file-input -->
<script src="/template/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function() {
        $('.select2').select2();
        bsCustomFileInput.init();

        $('#tgl_lahir').datetimepicker({
            format: 'L'
        });
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
                        <h3 class="card-title">Detail</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('detail_user.store') }}">
                        @csrf
                        @include('pages.detail_user.partials.form-control')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection