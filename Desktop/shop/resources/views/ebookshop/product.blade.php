@extends('ebookshop.layout')
   
@section('content')
    
<div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img class="card-img-top" width="354px" src="/img/posts/{{$product->image}}" alt="..." />
                <div class="caption">
                    <h4>{{ $product->author }}</h4>
                    <p>{{ $product->title }}</p>
                    <p>{{ $product->short_desc }}</p>
                    <p><strong>Price: </strong> {{ $product->price }}$</p>
                    <p class="btn-holder"><a href="{{ route('ebook.add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach

   
</div>
    
@endsection
