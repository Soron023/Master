<x-master-layout>

    <h1>{{$post->title}}</h1>
<div class="row">
  <div class="col-md-8">
    @if($post->image)
    <img src="/storage/{{$post->image}}" class="card-img-top" alt="">
    @else
    <img src="/asset/noimage.jpg" class="card-img-top" alt="">
    @endif
  </div>
  <div class="col-md-4">
    <ul class="list-group">
      <li class="list-group-item">Price: ${{$post->price}}</li>
      <li class="list-group-item">Category:{{$post->category->name}}</li>
      
    </ul>
    @foreach($tags as $item)
      <span class="badge bg-secondary" >{{$item->title}}</span>
    @endforeach
    <a class="btn btn-success mt-2" href="">Buy Now</a>
  </div>
  <div class="col-md-12">
    <p >{{$post->description}}</p>
  </div>
</div>

</x-master-layout>