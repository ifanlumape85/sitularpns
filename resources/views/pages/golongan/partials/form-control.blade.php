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
        <label for="nama_pangkat">Pangkat</label>
        <input type="text" class="form-control" id="nama_pangkat" name="nama_pangkat" placeholder="Pangkat" value="{{ old('nama_pangkat') ?? $item->nama_pangkat }}">
    </div>
    <div class="form-group">
        <label for="golongan">Pangkat</label>
        <input type="text" class="form-control" id="golongan" name="golongan" placeholder="Golongan" value="{{ old('golongan') ?? $item->golongan }}">
    </div>
    <div class="form-group">
        <label for="ruang">Pangkat</label>
        <input type="text" class="form-control" id="ruang" name="ruang" placeholder="Ruang" value="{{ old('ruang') ?? $item->ruang }}">
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $submit ?? 'Create' }}</button>
</div>