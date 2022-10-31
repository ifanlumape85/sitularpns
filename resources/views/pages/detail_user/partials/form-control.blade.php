<div class="card-body">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card card-dark">
        <div class="card-header">
            <div class="card-title">IDENTITAS PEGAWAI</div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="id_ujian">Layanan</label>
                <select class="form-control select2" name="id_ujian" style="width: 100%;">
                    <option value="" selected disabled>Pilih Satu</option>
                    @foreach($ujians as $ujian)
                    <option @if($item->id_ujian == $ujian->id || old('id_ujian') == $ujian->id) selected @endif value="{{ $ujian->id }}">{{ $ujian->nama_ujian }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="{{ old('nip') ?? $item->nip }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nip">Nama</label>
                        <input disabled type="text" class="form-control" value="{{ auth()->user()->name }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="tempat_lahir" value="{{ old('tempat_lahir') ?? $item->tempat_lahir }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <div class="input-group date" id="tgl_lahir" data-target-input="nearest">
                            <input name="tgl_lahir" type="text" class="form-control datetimepicker-input" data-target="#tgl_lahir" />
                            <div class="input-group-append" data-target="#tgl_lahir" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="id_golongan">Pangkat/Golongan</label>
                        <select class="form-control select2" name="id_golongan" style="width: 100%;">
                            <option value="" selected disabled>Pilih Satu</option>
                            @foreach($golongans as $golongan)
                            <option @if($item->id_golongan == $golongan->id || old('id_golongan') == $golongan->id) selected @endif value="{{ $golongan->id }}">{{ $golongan->nama_pangkat }} {{ $golongan->golongan }} {{ $golongan->ruang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="id_jenjang_pendidikan">Pendidikan Terakhir</label>
                        <select class="form-control select2" name="id_jenjang_pendidikan" style="width: 100%;">
                            <option value="" selected disabled>Pilih Satu</option>
                            @foreach($jenjang_pendidikans as $jenjang_pendidikan)
                            <option @if($item->id_jenjang_pendidikan == $jenjang_pendidikan->id || old('id_jenjang_pendidikan') == $jenjang_pendidikan->id) selected @endif value="{{ $jenjang_pendidikan->id }}">{{ $jenjang_pendidikan->nama_jenjang_pendidikan ?? null }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="jabatan" value="{{ old('jabatan') ?? $item->jabatan }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="id_skpd">Unit Kerja</label>
                        <select class="form-control select2" name="id_skpd" style="width: 100%;">
                            <option value="" selected disabled>Pilih Satu</option>
                            @foreach($skpds as $skpd)
                            <option @if($item->id_skpd == $skpd->id || old('id_skpd') == $skpd->id) selected @endif value="{{ $skpd->id }}">{{ $skpd->nama_skpd }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-dark">
        <div class="card-header">
            <div class="card-title">PENDIDKAN YANG DIAMBIL</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="id_jenjang_pendidikan2">Jenjang Pendidikan</label>
                        <select class="form-control select2" name="id_jenjang_pendidikan2" style="width: 100%;">
                            <option value="" selected disabled>Pilih Satu</option>
                            @foreach($jenjang_pendidikans as $jenjang_pendidikan)
                            <option @if($item->id_jenjang_pendidikan == $jenjang_pendidikan->id || old('id_jenjang_pendidikan') == $jenjang_pendidikan->id) selected @endif value="{{ $jenjang_pendidikan->id }}">{{ $jenjang_pendidikan->nama_jenjang_pendidikan ?? null }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="program_studi">Program Studi</label>
                        <input type="text" class="form-control" id="program_studi" name="program_studi" placeholder="program_studi" value="{{ old('program_studi') ?? $item->program_studi }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="fakultas">Fakultas</label>
                        <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="fakultas" value="{{ old('fakultas') ?? $item->fakultas }}">
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col">
                    <div class="form-group">
                        <label for="universitas">Universitas</label>
                        <input type="text" class="form-control" id="universitas" name="universitas" placeholder="universitas" value="{{ old('universitas') ?? $item->universitas }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Tgl. Diterima</label>
                        <div class="input-group date" id="tgl_diterima" data-target-input="nearest">
                            <input name="tgl_diterima" type="text" class="form-control datetimepicker-input" data-target="#tgl_diterima" />
                            <div class="input-group-append" data-target="#tgl_diterima" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-dark">{{ $submit ?? 'Proses' }}</button>
</div>