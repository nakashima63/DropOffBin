<ul class="list-unstyled">
    <li class="media mb-3">
            <li class="mb-0">
                <p>説明</p>
                {!! nl2br(e($item->description)) !!}
            </li>
            <li class="mb-0">
                <p>取引期限</p>
                {{ $item->time_limit }}
            </li>
            <li class="mb-0">
                <p>カテゴリ</p>
                {{ $item->category->category }}
            </li>
    </li>
        
</ul>
    