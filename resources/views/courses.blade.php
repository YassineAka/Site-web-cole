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
        <label for="id">Sigle</label>
        <input type="text"  id="id" aria-describedby="emailHelp" placeholder="sigle">
      </div>
      <div class="form-group">
        <label for="name">Title</label>
        <input type="text"  id="name" placeholder="Title">
      </div>
      
      <button id="btn"type="submit" class="btn btn-primary">Add</button>

</form>

<script>
  $(document).ready(function() {
    $("#btn").click(function() {
      let id = $("#id").val();
      name = $("#name").val();
      let url = "./courses/add/" + id + "/" + name;
      $.get(url, function(jsData, status) {});
      location.reload();
    });
            });
            
</script>
 


@endsection
