<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  
  
  <title> @yield('title') </title>
  <!doctype html>
  <html lang="{{ app()->getLocale() }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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


