<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">DropOffBin</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="post-search-form col-md-6">
        <form class="form-inline" action="{{ route('items.search') }}">
            <div class="form-group">
                <input type="text" name="key"  class="form-control mr-sm-2" placeholder="検索" aria-label="Search">
            </div>
        　<input type="submit" value="検索" class="btn btn-outline-success my-2 my-sm-0">
        </form>
        </div>

        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li>{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    
    </nav>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <ul class="navbar-nav">
            {{-- 出品用ページへのリンク --}}
            <li class="nav-item">{!! link_to_route('items.create', '出品する', [], ['class' => 'nav-link']) !!}</li>
            {{-- マイページへのリンク --}}
            <li class="nav-item">{!! link_to_route('items.mypage', 'マイページ', [], ['class' => 'nav-link']) !!}</li>
        </ul>
    </nav>
</header>

