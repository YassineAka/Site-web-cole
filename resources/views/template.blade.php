<!DOCTYPE html>
<html>

<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 
  
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

      html,
      body {
        background-color: #fff;
        color: black;
        font-family: 'black', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
      }

    </style>
  </head>

<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('') }}">Home </a>
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
</body>


