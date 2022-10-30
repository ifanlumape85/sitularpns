@extends('layouts.backend.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('roles.store') }}">
                        @csrf
                        @include('pages.roles.partials.form-control')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection