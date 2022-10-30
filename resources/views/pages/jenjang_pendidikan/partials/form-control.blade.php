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
        <label for="nama_jenjang_pendidikan">Jenjang Pendidikan</label>
        <input type="text" class="form-control" id="nama_jenjang_pendidikan" name="nama_jenjang_pendidikan" placeholder="Jenjang Pendidikan" value="{{ old('nama_jenjang_pendidikan') ?? $item->nama_jenjang_pendidikan }}">
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $submit ?? 'Create' }}</button>
</div>