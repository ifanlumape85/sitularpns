<nav class="nav-menu d-none d-lg-block">
    <ul>
        <li class="active"><a href="{{ route('home') }}">Beranda</a></li>
        @isset($menus)
        @foreach($menus as $menu)
        <li class="drop-down"><a href="#">{{ $menu->name }}</a>
            @if($menu->pages)
            <ul>
                @foreach($menu->pages as $page)
                @if($page->link)
                <li><a href="{{ env('APP_URL') }}/{{ $page->link ?? null }}">{{ $page->name ?? null }}</a></li>
                @else
                <li><a href="{{ route('detail-page', $page->slug) }}">{{ $page->name ?? null }}</a></li>
                @endif
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach
        @endisset
    </ul>
</nav><!-- .nav-menu -->