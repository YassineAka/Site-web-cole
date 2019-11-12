@extends('template')
@section('title','List Of a teacher')
@section('content')
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="../../../resources/Images/photoprofil.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"> </h5>
    <p class="card-text"></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$teacher->id}}</li>
    <li class="list-group-item">{{$teacher->name}}</li>
    <li class="list-group-item">{{$teacher->firstName}}</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
@endsection