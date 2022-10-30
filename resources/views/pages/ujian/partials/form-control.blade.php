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
        <label for="nama_ujian">Nama Pelayanan/Ujian</label>
        <input type="text" class="form-control" id="nama_ujian" name="nama_ujian" placeholder="Nama Ujian" value="{{ old('nama_ujian') ?? $item->nama_ujian }}">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" rows="3" placeholder="Deskripsi ..." name="deskripsi" id="deskripsi">{{ old('deskripsi') ?? $item->deskripsi }}</textarea>
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $submit ?? 'Create' }}</button>
</div>