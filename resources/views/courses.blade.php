@extends('template')
@section('title','List Of Courses')
@section('content')

<div class="row">
    <div class="col"style="margin-left: 2%;"> 
        <div class="row">
            <div class="col-9">
            </div>
            <div class="col">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Ajouter un cours</button>
            </div>
        </div>
        <table class="table table-striped table-hover" id="MyTable">
            <h1>List Of Courses </h1>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sigle</th>
                    <th scope="col">Libellé</th>
                    <th scope="col">Heures</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td class ="courses" id="{{$course->getId()}}">{{$course->getId()}}</td>
                    <td> {{$course->getTitle()}}</td>
                    <td> {{$course->getNbHours()}}</td>
                    <td><button type="button" id="{{$course->getId()}}test" value="{{$course->getId()}}" class="btn btn-danger del"> X</button> <button type="button" class="btn btn-secondary">✎</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div style="padding:2%;margin-right:5%;" >
    
        <div class="col collapse multi-collapse" id="multiCollapseExample2">
            <div class="row">
               <div class="col-10">
               </div>
               <div class="col">
                  <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">X</button>
                  </div>
            </div> 
            <h1>Inscription</h1>
            <p>Veuillez entrer les cordonnées du cours à ajouter dans le formulaire ci-joint.</p>
            
            <div class="form-group">
                <label for="id">Sigle</label>
                <input type="text"  id="id" class="form-control" placeholder="Sigle...">
            </div>
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text"  id="name"class="form-control" placeholder="Title...">
            </div>
            <div class="form-group">
                <label for="nbHours">Hours</label>
                <input type="number"  id="nbHours"class="form-control" placeholder="Hours...">
            </div>
            
            <button id="btn"type="submit" class="btn btn-primary">Add</button>

        </div>
    </div>
</div>

<script>
  $(document).ready(function() {
    $("#btn").click(function() {
      let id = $("#id").val();
      let name = $("#name").val();
      let nbHours = $("#nbHours").val();
      console.log("bonjour");

    console.log(nbHours);
      let url = "./courses/add/" + id + "/" + name+ "/" + nbHours;
      $.get(url, function(jsData, status) {});
      location.reload();
      $("#MyTable").load( "courses #MyTable" );
    });
            });       

    $(document).ready(function() {
        let sigle;
        $(".del").click(function() {
        sigle = $(this).val();
        let url ="./courses/delete/"+sigle;
        $.get(url, function(jsData, status) {});
        location.reload();
        $("#MyTable").load( "courses #MyTable" );


    });
        });    



</script>

 


@endsection
