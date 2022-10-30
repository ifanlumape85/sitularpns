@extends('layouts.frontend.app-detail')
@section('page-title', $breadcrumb_title)
@section('page', $breadcrumb_h1)
@section('page-active', $breadcrumb_title)
@section('content')
@foreach($items as $item)
<article class="entry entry-single">
    @if(Storage::disk('public')->exists($item->image ?? null))
    <div class="entry-img">
        <img src="{{ Storage::url($item->image ?? null) }}" alt="" class="img-fluid">
    </div>
    @endif

    @isset($item->name)
    <h2 class="entry-title">
        <a href="#">{{ $item->name ?? null }}</a>
    </h2>
    @endisset

    @isset($item->nama_ujian)
    <h2 class="entry-title">
        <a href="#">{{ $item->nama_ujian ?? null }}</a>
    </h2>
    @endisset

    <div class="entry-meta">
        <ul>
            @isset($item->author->name)
            <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="#">{{ $item->author->name ?? null }}</a></li>
            @endisset
            @isset($item->created_at)
            <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="#"><time datetime="2021-03-25">{{ $item->created_at ?? null }}</time></a></li>
            @endisset
        </ul>
    </div>

    <div class="entry-content">
        @isset($item->body)
        <p>{!! nl2br(e(Str::limit($item->body ?? null, 300))) !!}</p>
        @endisset
        @isset($item->deskripsi)
        <p>{!! nl2br(e($item->deskripsi ?? null, 300)) !!}</p>
        @isset($item->persyaratan)
        <ul>
            @foreach($item->persyaratan as $persyaratan)
            <li>{{ $persyaratan->nama_persyaratan ?? null }}</li>
            @endforeach
        </ul>
        @endisset
        @endisset
    </div>

    @isset($item->category)
    <div class="entry-footer clearfix">
        <div class="float-left">
            <i class="icofont-folder"></i>
            <ul class="cats">
                <li><a href="{{ route('category', $item->category) }}">{{ $item->category->name ?? null }}</a></li>
            </ul>
            @if($item->tags)
            <i class="icofont-tags"></i>
            <ul class="tags">
                @foreach($item->tags as $tag)
                <li><a href="{{ route('tag', $tag) }}">{{ $tag->name ?? null }}</a></li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    @endisset
</article><!-- End blog entry -->
@endforeach
@endsection