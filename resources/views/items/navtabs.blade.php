<ul class="nav nav-tabs">
    {{-- 出品物詳細タブ --}}
    <li class="nav-item">
        <a href="{{ route('items.show', ['item' => $item->id]) }}" class="nav-link {{ Request::routeIs('items.show') ? 'active' : '' }}">
            出品物詳細
        </a>
    </li>
    {{-- メッセージタブ --}}
    <li class="nav-item">
        <a href="{{ route('message.index', ['id' => $item->id]) }}" class="nav-link {{ Request::routeIs('message.index') ? 'active' : '' }}">
            メッセージ
        </a>
    </li>
</ul>