<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $item->name }}</h3>
    </div>
    <div class="card-body">
        <img class="card-img-top" src="{{ asset('/uploads/' . $item->image_file_name) }}" alt="Card image cap">
    </div>
</div>