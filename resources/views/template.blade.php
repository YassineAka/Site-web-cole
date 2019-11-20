<!DOCTYPE html>
<html>

<head>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 
  
  <title> @yield('title') </title>
  <!doctype html>
  <html lang="{{ app()->getLocale() }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"   content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <!-- Styles -->
    <style>

      body{
          background: -webkit-linear-gradient(left, #3931af, #00c6ff);
      }
      .emp-profile{
          padding: 3%;
          margin-top: 3%;
          margin-bottom: 3%;
          border-radius: 0.5rem;
          background: #fff;
      }
      html,
      body {
        color: black;
        font-family: 'black', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
      }
      .mb-4{
        border-bottom: solid rgba(255, 255, 255,0.3);
      }

      a:hover{
          text-decoration:none;
      }
      .section-padding {
        padding: 60px 0;
      }
      .bottom .copyright {
          color: #e5e5e5;
          font-weight: 600;
      }
      .copyright a {
          color: #ffffff;
          margin-left: 3px;
          padding-right: 3px;
      }
      .bottom p {
          margin-bottom: 0;
          line-height: 50px;
          font-size: 16px;
          font-weight: 400;
      }

    </style>
  </head>

<body>

  <header>
    <!--Navbar blue-->
    <nav class="mb-4 navbar navbar-expand-lg navbar-dark unique-color-dark">
        <a class="navbar-brand" href="#">ESI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('') }}">Home</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{ url('teachers') }}">List Of Teachers</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{ url('courses') }}">List Of Courses</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{ url('missions') }}">List Of Missions</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{ url('groupes') }}">List Of Groups</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{ url('version') }}">Version</a>
                </li>
            </ul>
        </div>
    </nav>
  </header>
  <h1> @yield('littletitle')</h1>
  <main>
    @yield('content')
  </main>
  <footer>
    <div class="bottom section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="copyright">
							<p>© <span>2019</span> <a href="#" class="transition">ServaisRiderDu93</a> All rights reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
  </footer>
</body>


