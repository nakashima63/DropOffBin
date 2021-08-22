@extends('layouts.app')

@section('content')
<h1>検索結果</h1>
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