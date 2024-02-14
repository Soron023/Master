<!DOCTYPE html>
<html>
<head>
    <title>Meng Makara E-Book</title>
        <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/D logo.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/contact.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{Html::style('css/frontendstyle.css')}}
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <div class="container">
                <a class="navbar-brand" href="#!">Meng Makara E-Book</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/ebook') }}">E-Book</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/ebook-shop') }}">E-Book Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/shop') }}">Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/ebook-frontend') }}">Admin</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/contact')}}">Contact</a></li>
                        <li class="nav-item"><a class="nav-link"  href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container1 mt-5">
        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        <form action="" method="post" action="{{ route('contact.store') }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
                <!-- Error -->
                @if ($errors->has('name'))
                <div class="error">
                    {{ $errors->first('name') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
                @if ($errors->has('email'))
                <div class="error">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone">
                @if ($errors->has('phone'))
                <div class="error">
                    {{ $errors->first('phone') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                    id="subject">
                @if ($errors->has('subject'))
                <div class="error">
                    {{ $errors->first('subject') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                    rows="4"></textarea>
                @if ($errors->has('message'))
                <div class="error">
                    {{ $errors->first('message') }}
                </div>
                @endif
            </div>
            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
    </div>
</body>
</html>
