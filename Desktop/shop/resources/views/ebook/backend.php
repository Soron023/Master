@extends('ebook.main')

@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">E-Book: Product</h1>
        <a class="btn btn-primary" href="{{ url('/ebook/create') }}">Create new E-Book</a>
        <br><br>
        @if(Session::has('ebook_update'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times</span></button>
                <strong>Success!</strong>{!! session('ebook_update') !!}    
                </div>
        @endif
        @if(Session::has('ebook_delete'))
                <div class="alert alert-success"><em>{!! session('ebook_delete') !!}</em>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>    
                </div>
        @endif
        @if(Session::has('ebook_create'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Success!</strong> {!! session('ebook_create') !!}
                </div>
        @endif

        @if (count($ebooks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All E-Books
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>E-book id</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category id</th>
                                <th>Category name</th>
                                <th>Image</th>
                                <th>Description</th>
                                
                            </thead>

                            <tbody>
                                @foreach ($ebooks as $ebook)
                                <tr>
                                    <td>
                                        <div>{!! $ebook->id !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $ebook->title !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $ebook->author !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $ebook->category_id !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $ebook->category->name !!}</div> 
                                        <!-- this category name come from category id in post table -->
                                    </td>
                                    <td>
                                        <div>{!! Html::image("/img/posts/".$ebook->image, $ebook->title, array('width'=>'60'))  !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $ebook->short_desc !!}</div>
                                    </td>

                                     <td><a class="btn btn-primary" href="{!! url('post/' . $ebook->id . '/edit') !!}">Edit</a></td>  

                                     <td>
                                        {!! Form::open(array('url'=>'ebook/'. $ebook->id, 'method'=>'DELETE')) !!}
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                            <button class="btn btn-danger">Delete</button>
                                         {!! Form::close() !!}   
                                       
                                    </td>
                                    
                                </tr>   

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
        @endif
</div>
</main>

@endsection