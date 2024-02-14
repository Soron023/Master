@extends('admin.main')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit : Product</h1>
        
        @if (count($errors) > 0)
        <!-- Form Error List -->
        <div class="alert alert-danger">
            <strong>Something is Wrong</strong>
            <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div>
            <br>
            {!! Form::model($post , array('route' => array('post.update', $post->id), 'method'=>'PUT','files'=>'true')) !!}
            <br>
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', $categories, $post->category->id, array('class'=>'form-control')) !!}
            <br><br>
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title',null, array('class'=>'form-control')) !!}
            <br>
            {!! Form::label('author', 'Author:') !!}
            {!! Form::text('author',null, array('class'=>'form-control')) !!}
            <br>
            {!! Form::label('image', 'Image:') !!}
            {!! Form::file('image',null, array('class'=>'form-control')) !!}
            <br><br>
            {!! Form::label('short_desc', 'Short Desc:') !!}
            {!! Form::text('short_desc',null, array('class'=>'form-control')) !!}
            <br>
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description',null, array('class'=>'form-control')) !!}
            <br>
            {!! Form::submit('Update Post', array('class'=>'btn btn-primary')) !!}
            {!! Form::close() !!}
            <br>

        </div>
        <div style="height: 100vh;"></div>
    </div>
</main>
@endsection