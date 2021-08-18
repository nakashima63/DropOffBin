@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                {{-- 出品物画像 --}}
                <img class="card-img-top" src="{{ asset('/uploads/' . $item->image_file_name) }}" alt="Card image cap">
            </aside>
            <div class="col-sm-8">
               <div>
                   {{ $item->name }}
               </div>
               <div>
                   {{ $item->description }}
               </div>
               <div>
                   {{ $item->time_limit }}
               </div>
               <div>
                   {{ $item->category->category }}
               </div>
               
                
                {{-- 投稿フォーム --}}
                @include('microposts.form')
                {{-- 投稿一覧 --}}
                @include('microposts.microposts')
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection