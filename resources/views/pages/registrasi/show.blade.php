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
                            <h1 class="h5 text-dark">Detail Registrasi {{ $item->detail_user->ujian->nama_ujian }}</h1>
                            <a href="{{ route('registrasi.index') }}" class="btn btn-dark">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('cetak-registrasi', $item) }}" class="btn btn-default"><i class="fa fa-print"></i> Cetak Bukti Pendaftaran</a>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <p class="card-title"><strong>IDENTITAS PEGAWAI</strong></p>
                                    </div>
                                    <div class="card-body">

                                        <strong>No/Tgl. Daftar</strong>
                                        <p>{{ $item->no_registrasi ?? "-"}}/{{ $item->created_at }}</p>

                                        <strong>NIP</strong>
                                        <p class="text-muted">{{ $item->detail_user->nip ?? "-"}}</p>

                                        <strong>Nama (<small>Nama harus sesuai dengan SK.</small>)</strong>
                                        <p class="text-muted">{{ $item->detail_user->user->name ?? "-"}}<br /></p>

                                        <strong>Tempat/Tgl. Lahir</strong>
                                        <p class="text-muted">{{ $item->detail_user->tempat_lahir ?? null }}, {{ $item->detail_user->tgl_lahir ?? null }}<br /></p>

                                        <strong>Pangkat/Golongan Terakhir</strong>
                                        <p class="text-muted">{{ $item->detail_user->golongan->nama_pangkat ?? null }} {{ $item->detail_user->golongan->golongan ?? null }} {{ $item->detail_user->golongan->ruang ?? null }}</p>

                                        <strong>Jabatan Terakhir</strong>
                                        <p class="text-muted">{{ $item->detail_user->jabatan ?? "-"}}</p>

                                        <strong>Unit Kerja</strong>
                                        <p class="text-muted">{{ $item->detail_user->skpd->nama_skpd ?? "-"}}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <p class="card-title"><strong>PENDIDIKAN YANG DIAMBIL</strong></p>
                                    </div>
                                    <div class="card-body">

                                        <strong>Jenjang Pendidikan</strong>
                                        <p class="text-muted">{{ $item->jenjang_pendidikan->nama_jenjang_pendidikan ?? "-"}}</p>
                                        <strong>Program Studi</strong>
                                        <p class="text-muted">{{ $item->program_studi ?? "-"}}</p>
                                        <strong>Fakultas</strong>
                                        <p class="text-muted">{{ $item->fakultas ?? "-"}}</p>
                                        <strong>Universitas</strong>
                                        <p class="text-muted">{{ $item->universitas ?? "-"}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text-danger"><strong>KELENGKAPAN SURAT!!!</strong></p>

                                @if($item->detail_user->ujian->persyaratan)
                                @foreach($item->detail_user->ujian->persyaratan as $persyaratan)
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">

                                                <div class="text-bold">{{ $persyaratan->nama_persyaratan ?? null }}</div>

                                                @if($persyaratan->persyaratan_user)

                                                @forelse($persyaratan->persyaratan_user_id($item->id) as $persyaratan_user)
                                                <div class="text-left">
                                                    <a href="{{ route('berkas.show', $persyaratan_user->id) }}" class="btn btn-outline-dark mt-2 mr-2"><i class="fa fa-file"></i> Sudah diupload</a>
                                                </div>
                                                @empty
                                                <a class="btn btn-outline-danger">Berkas belum diupload</a>
                                                @endforelse
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection