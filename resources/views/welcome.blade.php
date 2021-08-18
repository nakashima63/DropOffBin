@extends('layouts.app')

@section('content')

@if (count($items) > 0)
<h1>最近出品されたもの</h1>
    @foreach ($items as $item)
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                        @if(isset( $item->image_file_name ))
                        <img class="card-img-top" src="{{ asset('/uploads/' . $item->image_file_name) }}" alt="Card image cap">
                        @else
                        @endif
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">詳細</button>
                                        {!! link_to_route('item.details', '詳細', [], ['class' => 'btn btn-sm btn-outline-secondary']) !!}
                                    </div>
                                </div>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
        </diV>
    @endforeach
@endif
@endsection
