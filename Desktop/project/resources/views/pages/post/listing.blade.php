<x-master-layout>

    <h1>Discover our Posted</h1>
    <a href="/post" class="btn btn-danger">Reset</a>

    @foreach($categories as $item)
    <a href="/post?c={{$item->id}}" class="btn btn-primary">{{$item->name}}</a>
    @endforeach
<div class="row">
    @foreach ($posts as $post)
    <div class="col-md-3 mt-2">
        <div class="card" style="width: 18rem;">
          @if($post->image)
            <img src="/storage/{{$post->image}}" class="card-img-top" alt="...">
          @else
          <img src="/asset/noimage.jpg" class="card-img-top" alt="...">
          @endif
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <h5 class="card-title">{{$post->price}}</h5>
              <h5 class="card-title">{{$post->category? $post->category->name : ''}}</h5>
              <p class="card-text">{{$post->description}}</p>
              <a href="/post/{{$post->id}}" class="btn btn-success">Contact Seller</a>
              <a href="/post/{{$post->id}}" class="btn btn-success">Add To Card</a>
            </div>
          </div>
    </div>
    @endforeach
</div>
<div class="bnt btn-success mt-2">{{$posts->links()}}</div>
</x-master-layout>