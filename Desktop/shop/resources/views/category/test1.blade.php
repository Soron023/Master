<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CATEGORY TEST1</h1>
    

    <h2>Name:</h2>
    @foreach($categories as $category)
    {{$category -> name }} <br>
    @endforeach

    <br><br><br>

    <h2>Description:</h2>
    @foreach($categories as $category)
    {{$category -> description }} <br>
    @endforeach
    
    <h2>Other</h2>

    @if (count($categories) > 0)
			<table class="table">
				<thead>
					<th>Category name</th>
					<th>Category Description</th>
					<th>Action</th>
				</thead>

				<tbody>
					@foreach ($categories as $category)
					<tr>
						<td>
							<div>{!! $category->name !!}</div>
						</td>
						<td>
							<div>{!! $category->description !!}</div>
						</td>
						<td>
							<a class="btn btn-primary" href="{!! url('category/' . $category->id . '/edit') !!}">Edit</a>
						</td>             
						<td>
								{!! Form::open(array('url'=>'category/'. $category->id, 'method'=>'DELETE')) !!}
								{!! csrf_field() !!}
								{!! method_field('DELETE') !!}
									<button class="btn btn-danger">Delete</button>
								{!! Form::close() !!} 
						</td>
					</tr>   

					@endforeach

				</tbody>
			</table>
		@endif
</body>

<footer>
    <!-- <div style="width:100%, height:300px, color:red"></div> -->
    <div style="height:100px; width:100%; background:#000000"></div>
</footer>

</html>