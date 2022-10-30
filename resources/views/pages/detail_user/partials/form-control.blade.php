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
    <div class="form-group">
        <label for="id_ujian">Ujian</label>
        <select class="form-control select2" name="id_ujian" style="width: 100%;">
            <option value="" selected disabled>Pilih Satu</option>
            @foreach($ujians as $ujian)
            <option @if($item->id_ujian == $ujian->id || old('id_ujian') == $ujian->id) selected @endif value="{{ $ujian->id }}">{{ $ujian->nama_ujian }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="{{ old('nip') ?? $item->nip }}">
    </div>
    <div class="form-group">
        <label for="id_golongan">Golongan/Pangkat Terakhir</label>
        <select class="form-control select2" name="id_golongan" style="width: 100%;">
            <option value="" selected disabled>Pilih Satu</option>
            @foreach($golongans as $golongan)
            <option @if($item->id_golongan == $golongan->id || old('id_golongan') == $golongan->id) selected @endif value="{{ $golongan->id }}">{{ $golongan->nama_pangkat }} {{ $golongan->golongan }} {{ $golongan->ruang }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="jabatan">Jabatan Terakhir</label>
        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="jabatan" value="{{ old('jabatan') ?? $item->jabatan }}">
    </div>
    <div class="form-group">
        <label for="id_skpd">SKPD</label>
        <select class="form-control select2" name="id_skpd" style="width: 100%;">
            <option value="" selected disabled>Pilih Satu</option>
            @foreach($skpds as $skpd)
            <option @if($item->id_skpd == $skpd->id || old('id_skpd') == $skpd->id) selected @endif value="{{ $skpd->id }}">{{ $skpd->nama_skpd }}</option>
            @endforeach
        </select>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $submit ?? 'Proses' }}</button>
</div>