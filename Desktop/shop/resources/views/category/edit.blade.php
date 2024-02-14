@extends('admin.main')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Category</h1>
        
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
            {!! Form::model($category , array('route' => array('category.update', $category->id), 'method'=>'PUT')) !!}
            {!! Form::label('name', 'Name: ') !!}
            {!! Form::text('name', null,array('class'=>'form-control')) !!}

            {!! Form::label('description', 'Description: ') !!}
            {!! Form::text('description', null,array('class'=>'form-control')) !!}
            <br>
            {!! Form::submit('Update',array('class'=> 'btn btn-primary')) !!}
            <a class="btn btn-secondary" href="{{url('/category')}}">Cancel</a>
            {!! Form::close() !!}
            <br>

        </div>
        <div style="height: 100vh;"></div>
    </div>
</main>
@endsection