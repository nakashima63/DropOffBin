@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('items.card')
        </aside>
        <div class="col-sm-8">
            @include('items.navtabs')
            @include('messages.form')
            @if (count($messages) > 0)
                <ul class="list-unstyled">
                    @foreach ($messages as $message)
                        <li class="media mb-3">
                            <div class="media-body">
                                <div>
                                    <span class="text-muted">送信日 {{ $message->created_at }}</span>
                                    <p class="mb-0"> 送信者 {{ $message->user->nickname }}</p>
                                </div>
                                <div>
                                {{-- 投稿内容 --}}
                                <p class="mb-0">{!! nl2br(e($message->content)) !!}</p>
                                </div>
                                
                                <div>
                                @if (Auth::id() == $message->user_id || Auth::id() == $item->id)
                                    {{-- 投稿削除ボタンのフォーム --}}
                                    {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            {{-- ページネーションのリンク --}}
            {{ $messages->links() }}
            @endif
        </div>
    </div>
@endsection

