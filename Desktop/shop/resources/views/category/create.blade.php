@extends('admin.main')

@section('content')
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Create Category</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="{{url('/category')}}">View All Category </a></li>
			<li class="breadcrumb-item active"><a href="{{url('/category/create')}}">Create category</a></li>
		</ol>
		
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
			{!! Form::open(['url' => 'category']) !!}
			{!! Form::label('name', 'Name: ') !!}
			{!! Form::text('name', '',array('class'=>'form-control')) !!}
			{!! Form::label('description', 'Description: ') !!}
			{!! Form::text('description', '',array('class'=>'form-control')) !!}
			<br>
			{!! Form::submit('Create',array('class'=> 'btn btn-primary')) !!}
			<a class="btn btn-secondary" href="{{url('/category')}}">Cancel</a>
            {!! Form::close() !!}
			
		</div>
		<div style="height: 100vh;"></div>
		<div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
	</div>
</main>
@endsection