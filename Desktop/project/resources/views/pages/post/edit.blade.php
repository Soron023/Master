<x-master-layout>
<h2>Editting : {{$post->id}}</h2>


<form action="/post/update{{$post->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="inputTitle" class="form-label">Title</label>
      <input type="text" name="title" value="{{old('title',$post->title)}}" class="form-control @if($errors->first('title')) is-invalid @endif" id="inputTitle" aria-describedby="titleHelp">
      
    </div>
    <div class="mb-3">
        <label for="inputPrice" class="form-label">Price</label>
        <input type="number" value="{{old('price',$post->price)}}" name="price" class="form-control @if($errors->first('price')) is-invalid @endif" id="inputPrice"\>
    </div>
    <div class="mb-3">
      <label for="inputCategory" class="form-label">Category</label>
      <select name="category" class="form-control @if($errors->first('categories')) is-invalid @endif" id="inputCategory">
        @foreach($categories as $item)
        <option @if(old('category',$post->category_id)==$item->id) selected @endif value="{{$item->id}}">{{$item ->name}}</option>
        @endforeach
      </select>
  </div>
    <div class="mb-3">
        <label for="inputImage" class="form-label">Image</label>
        <input type="file" name="image" class="form-control @if($errors->first('image')) is-invalid @endif" id="inputImage" aria-describedby="ImageHelp">
        <img style="width: 300px" class="img-thumbnail" src="/storage/{{$post->image}}" alt="">
    </div>
    <div class="mb-3">
        <label for="inputDescription" class="form-label">Description</label>
        <textarea name="description" class="form-control @if($errors->first('description')) is-invalid @endif" id="inputDescription" cols="30" rows="10">{{old('description',$post->description)}}</textarea>
      </div>
      @foreach($tags as $item)
      <div class="form-check">
        <input @if(in_array($item->id, old('tag',$post_tag))) checked @endif class="form-check-input" name="tag[]" type="checkbox" value="{{$item->id}}" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          {{$item -> title}}
        </label>
      </div>
      @endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</x-master-layout> 