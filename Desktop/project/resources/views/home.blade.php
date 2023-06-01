<x-master-layout>
    <a class="btn btn-success mt-2" href="/post/new">Create Post</a>
    <h1>Latest Posted</h1>
<div class="row">
    @foreach ($posts as $post)
    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          @if($post->image)
            <img src="/storage/{{$post->image}}" class="card-img-top" alt="...">
          @else
          <img src="/asset/noimage.jpg" class="card-img-top" alt="...">
          @endif
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <h5 class="card-title">{{$post->price}}</h5>
              <p class="card-text">{{$post->description}}</p>
              <a href="/post/{{$post->id}}" class="btn btn-success">Contact Seller</a>
              <a href="/post/{{$post->id}}" class="btn btn-success">Add To Card</a>
            </div>
          </div>
    </div>
    @endforeach
</div>
<a class="btn btn-primary mt-3" href="/post">See more..</a>
</x-master-layout>