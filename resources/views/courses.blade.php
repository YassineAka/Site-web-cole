@extends('template')
@section('title','List Of Courses')
@section('littletitle','List Of Courses')
@section('content')

<table id="MyTable" border=1>
        <tr>
        <th>Sigle</th>
        <th>Libellé</th>
        </tr>
        @foreach ($courses as $course)
            <tr>
            <td class ="courses" id="{{$course->getId()}}">{{$course->getId()}}</td>
            <td>{{$course->getTitle()}}</td>
            </tr>
        @endforeach
</table>

<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" id="id" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" class="form-control" id="name" placeholder="Password">
  </div>
  
  <button id="btn"type="submit" class="btn btn-primary">Submit</button>

</form>
<script>
            $(document).ready(function() {
                $("#btn").click(function() {
                    let id = $("#id").val();
                    name = $("#name").val();
                    let url = "./courses/add/" + id + "/" + name;
                    $.get(url, function(jsData, status) {
                    });
                });
            });
        </script>
 


@endsection
