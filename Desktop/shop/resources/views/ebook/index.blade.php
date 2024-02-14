<!-- Change extends from 'ebook.main' to 'ebookshop.layout' -->
@extends('ebook.layout1')

@section('content')
            <div class="container mt-4">
                <div class="row">
                    <!-- Blog entries-->
                    <div class="col-lg-4">
                        <!-- Featured blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="/img/posts/{{$feature_ebook->image}}" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">{{$feature_ebook->created_at->format('Y-M-d-D')}}</div>
                                <h2 class="card-title">{{$feature_ebook->title}}</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                                <a class="btn btn-primary" href="http://127.0.0.1:8000/ebook-show/7">Read more →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img src="/img/posts/{{$feature_ebook1->image}}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>{{$feature_ebook1->short_desc}}</h2>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                                </div>
                                <div class="carousel-item">
                                <img src="/img/posts/{{$feature_ebook2->image}}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>{{$feature_ebook2->short_desc}}</h2>
                                    <p>Some representative placeholder content for the second slide.</p>
                                </div>
                                </div>
                                <div class="carousel-item">
                                <img src="/img/posts/{{$feature_ebook3->image}}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2>{{$feature_ebook3->short_desc}}</h2>
                                    <p>Some representative placeholder content for the third slide.</p>
                                </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <!-- Side widgets -->
                    <div class="col-lg-3">
                        <!-- Search widget-->
                        <div class="card mb-4">
                            <div class="card-header mb-1">Search Title</div>
                            
                            {!! Form::open(array('url'=>'ebook-frontend/search','method'=>'get')) !!}
                            <div class="input-group">
                                {!! Form::text('keyword',$keyword ?? '', array('placeholder'=>'Search', 'class'=>'form-control')) !!}
                                <span class="input-group-btn">
                                    {!! Form::submit('search',array('class'=>'btn btn-default')) !!}
                                </span>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- Categories widget-->
                        <div class="card mb-4">
                            <div class="card-header">Categories</div>
                            <div class="card-body">
                                <div class="row">
                                    @if(count(array($categories)) > 0)
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled mb-0">
                                            @foreach($categories as $category)
                                                <li><a href="{{url('/ebook-frontend/category/'.$category->id)}}">{{$category->name}}</a></li>
                                            @endforeach
                                            <li><a href="#!">HTML</a></li>
                                            <li><a href="#!">Freebies</a></li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Side widget-->
                        <div class="card mb-4">
                            <div class="card-header">Side Widget</div>
                            <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <div class="row">
                    <!-- Blog entries-->
                    <div class="col-lg-6">
                        <!-- Nested row for non-featured blog posts-->
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Blog post even-->
                                @foreach ($ebooks as $ebook)
                                @if($loop->iteration % 2 == 0)
                                     @else
                                        <div class="card mb-4">
                                            <a href="#!"><img class="card-img-top" width="354px" src="/img/posts/{{$ebook->image}}" alt="..." /></a>
                                            <div class="card-body">
                                                <div class="small text-muted">{{$ebook->created_at->format('Y-M-d-D')}}</div>
                                                <h2 class="card-title h4">{{$ebook->title}}</h2>
                                                <p class="card-text">{{$ebook->short_desc}}</p>
                                                <a class="btn btn-primary" href="{{url('ebook-show/'.$ebook->id)}}">Read more →</a>
                                            </div>
                                        </div>
                                    @endif                           
                                @endforeach
                                
                            </div>

                            <div class="col-lg-6">
                                <!-- Blog post odd-->
                                @foreach ($ebooks as $ebook)
                                @if($loop->iteration % 2 == 0)
                                            <div class="card mb-4">
                                                <a href="#!"><img class="card-img-top" width="354px" src="/img/posts/{{$ebook->image}}" alt="..." /></a>
                                                <div class="card-body">
                                                    <div class="small text-muted">{{$ebook->created_at->format('Y-M-d-D')}}</div>
                                                    <h2 class="card-title h4">{{$ebook->title}}</h2>
                                                    <p class="card-text">{{$ebook->short_desc}}</p>
                                                    <a class="btn btn-primary" href="{{url('ebook-show/'.$ebook->id)}}">Read more →</a>
                                                </div>
                                            </div>
                                    @else
                                    @endif                           
                                @endforeach
                            </div>
                        </div>
                        <!-- Pagination-->
                        <nav aria-label="Pagination">
                            <hr class="my-0" />
                            <div class="pagination justify-content-center my-4"> {{$ebooks->links('pagination::bootstrap-4');}}</div>
                            
                        </nav>
                    </div>
                    <div class="col-lg-6">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="/img/posts/{{$feature_ebook1->image}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2>{{$feature_ebook1->short_desc}}</h2>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <img src="/img/posts/{{$feature_ebook2->image}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2>{{$feature_ebook2->short_desc}}</h2>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <img src="/img/posts/{{$feature_ebook3->image}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2>{{$feature_ebook3->short_desc}}</h2>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        </div>
                    </div>
            </div>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!-- <script src="js/scripts.js"></script> -->
        

                
@endsection