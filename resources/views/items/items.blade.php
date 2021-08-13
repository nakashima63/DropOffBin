@if (count($items) > 0)
    <ul class="list-unstyled">
        @foreach ($items as $items)
            <li class="media mb-3">
                <div class="media-body">
                    <div>
                        {{-- 出品内容 --}}
                        <p class="mb-0">{!! nl2br(e($items->name)) !!}</p>
                    </div>
                    <div>
                        @if (Auth::id() == $items->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>

                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $items->links() }}
@endif