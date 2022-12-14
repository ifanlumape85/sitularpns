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
        <label for="id_ujian">Pelayanan/Ujian</label>
        <select class="form-control select2" name="id_ujian" style="width: 100%;">
            <option value="" selected disabled>Pilih Satu</option>
            @foreach($ujians as $ujian)
            <option @if($item->id_ujian == $ujian->id || old('id_ujian') == $ujian->id) selected @endif value="{{ $ujian->id }}">{{ $ujian->nama_ujian }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nama_persyaratan">Persyaratan</label>
        <input type="text" class="form-control" id="nama_persyaratan" name="nama_persyaratan" placeholder="Nama Persyaratan" value="{{ old('nama_persyaratan') ?? $item->nama_persyaratan }}">
    </div>
    @if(Storage::disk('public')->exists($item->berkas ?? null))

    <a h43r="{{ Storage::url($item->berkas ?? null) }}">{{ $item->berkas ?? null }}</a>
    @endif
    <div class="form-group">
        <label for="berkas">PDF</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="berkas" name="berkas">
                <label class="custom-file-label" for="berkas">Choose file</label>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-dark">{{ $submit ?? 'Create' }}</button>
</div>