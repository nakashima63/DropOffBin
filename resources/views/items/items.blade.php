<ul class="list-unstyled">
    <li class="media mb-3">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">詳細</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">出品者名</th>
              <td>{{ $item->user->nickname }}</td>
              
            </tr>
            <tr>
              <th scope="row">説明</th>
              <td>{!! nl2br(e($item->description)) !!}</td>
            </tr>
            <tr>
              <th scope="row">取引期限</th>
              <td>{{ $item->time_limit }}</td>
            </tr>
            <tr>
              <th scope="row">カテゴリ</th>
              <td>{{ $item->category->category }}</td>
            </tr>
          </tbody>
        </table>
            
    </li>
        
</ul>
    