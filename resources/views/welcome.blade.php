@extends('layouts.app')

@section('content')
<div class="jumbotron">
  <h1 class="display-4">お部屋にいらないものはありませんか？</h1>
  <p class="lead">DropOffBinは学生寮に住む寮生同士が不用品をやりとりできるサービスです。</p>
  <hr class="my-4">
  <p>メッセージを送ることで受け渡し場所等の連絡ができます。</p>
</div>
<h1>最近出品されたもの</h1>
@if (count($items) > 0)
    
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach ($items as $item)
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                        @if(isset( $item->image_file_name ))
                        <img class="card-img-top" src="{{ asset( $item->imgpath ) }}" alt="Card image cap">
                        @else
                        @endif
                            <div class="card-body">
                                <p class="card-text">{{ $item ->name }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a  href="{{ route('items.show', ['item' => $item->id]) }}" >
                                            <button type="button" class="btn btn-sm btn-outline-secondary">詳細</button>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $items->links() }}
                </div>
            </div>
        </diV>
@endif
@endsection
