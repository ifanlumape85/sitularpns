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
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') ?? $item->name }}">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea class="form-control" rows="3" placeholder="Enter ..." name="body" id="body">{{ old('body') ?? $item->body }}</textarea>
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
    <button type="submit" class="btn btn-primary">{{ $submit ?? 'Create' }}</button>
</div>