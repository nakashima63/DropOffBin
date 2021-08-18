@extends('layouts.app')

@section('content')
    
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $item->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="card-img-top" src="{{ asset('/uploads/' . $item->image_file_name) }}" alt="Card image cap">
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs">
                {{-- 出品物詳細タブ --}}
                <li class="nav-item">
                    <a href="{{ route('items.show', ['item' => $item->id]) }}" class="nav-link {{ Request::routeIs('items.show') ? 'active' : '' }}">
                        出品物詳細
                    </a>
                </li>
                {{-- メッセージタブ --}}
                <li class="nav-item"><a href="#" class="nav-link">メッセージ</a></li>
            </ul>
            @include('items.items')
        </div>
    </div>
@endsection