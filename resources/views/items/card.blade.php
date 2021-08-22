<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $item->name }}</h3>
    </div>
    <div class="card-body">
        <img class="card-img-top" src="{{ asset( $item->imgpath ) }}" alt="Card image cap">
    </div>
    
</div>
<div>
    @if (Auth::id() == $item->user_id && $item->nego_status == false)
        {!! Form::open(['route' => ['items.finish', $item->id]]) !!}
            {!! Form::submit('出品を終了する', ['class' => 'btn btn-danger btn-sm']) !!}
        {!! Form::close() !!}
    @elseif (Auth::id() == $item->user_id && $item->nego_status == true)
        <h3>出品終了</h3>
    @elseif (Auth::id() != $item->user_id && $item->nego_status == false)
        <h3>出品中</h3>
    @else
        <h3>出品終了</h3>
    @endif
    
</div>