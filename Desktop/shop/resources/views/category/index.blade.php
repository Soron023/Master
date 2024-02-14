@extends('admin.main')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>

		@if(Session::has('category_update'))
        <div class="alert alert-success"><em>{!! session('category_update') !!}</em>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>    
        </div>
        @endif

		@if(Session::has('category_delete'))
            <div class="alert alert-success"><em>{!! session('category_delete') !!}</em>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>    
            </div>
        @endif

		<div style="text-align:right">
		<a  class="btn btn-primary" href="{{url('/category/create')}}">Create New Category</a>
		</div>
		@if (count($categories) > 0)
			<table class="table">
				<thead>
					<th>Category</th>
                    <th>Description</th>
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
									<button class="btn btn-danger delete">Delete</button>
								{!! Form::close() !!} 
						</td>
					</tr>   

					@endforeach

				</tbody>
			</table>

			<!-- for navigation button -->
			<div>
               {!! $categories->links('pagination::bootstrap-4'); !!}
            </div>
			<!-- for navigation button -->

			<!-- for dialog delete -->
			<script>
                    $(".delete").click(function() {
                        var form = $(this).closest('form');
                        $('<div></div>').appendTo('body')
                            .html('<div><h6> Are you sure ?</h6></div>')
                            .dialog({
                                modal: true,
                                title: 'Delete message',
                                zIndex: 10000,
                                autoOpen: true,
                                width: 'auto',
                                resizable: false,
                                buttons: {
                                    Yes: function() {
                                        $(this).dialog('close');
                                        form.submit();
                                    },
                                    No: function() {
                                        $(this).dialog("close");
                                        return false;
                                    }
                                },
                                close: function(event, ui) {
                                    $(this).remove();
                                }
                            });
                        return false;
                    });
                </script>
		@endif
</div>
</main>

@endsection