@extends('layouts.app')

@section('content')
    
    <div class="row">
        <aside class="col-sm-4">
            @include('items.card')
        </aside>
        <div class="col-sm-8">
            @include('items.navtabs')
            @include('items.items')
        </div>
    </div>
@endsection