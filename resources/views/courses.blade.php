@extends('template')
@section('title','List Of Courses')
@section('content')

<div class="row">
    <div class="col"style="margin-left: 2%;"> 
        <div class="row">
            <div class="col-9">
            </div>
            <div class="col">
                <button id= "btnAdd" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Ajouter un cours</button>
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
                    <td><button type="button" id="{{$course->getId()}}test" value="{{$course->getId()}}" class="del btn btn-danger "> X</button> <button type="button" class="btn btn-secondary">✎</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="col collapse multi-collapse" id="multiCollapseExample2">
        <div style="padding:2%;margin-right:5%;" >
            <div class="row">
               <div class="col-10">
               </div>
               <div class="col">
                  <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">X</button>
                  </div>
            </div> 
            <h1>Inscription</h1>
            <p>Veuillez entrer les cordonnées du cours à ajouter dans le formulaire ci-joint.</p>
            
            <div class="form-group" id="answer"></div>
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
            
            <button id="bou"type="submit" class="btn btn-primary">Add</button>

        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#bou").click(function() {
      let id = $("#id").val();
      let name = $("#name").val();
      let nbHours = $("#nbHours").val();
      $.get("courses/add?id="+id+"&name="+name+"&nbHours="+nbHours, function(data, status) {
        if(data == "true"){
            let msg = "<div class='alert alert-success' role='alert'>The course has been registered !</div>"
            $("#answer").html(msg);
            $("#id").val('');
            $("#name").val('');
            $("#nbHours").val('');
            $("#MyTable").load( "courses #MyTable" );
        } else{
            let msg = "<div class='alert alert-danger' role='alert'>The course has not been registered !</div>"
            $("#answer").html(msg);
        }
      });
    });   
    $(".del").click(function() {
        let sigle = $(this).val();
        let url ="./courses/delete/"+sigle;
        $.get(url, function(data, status) {
            location.reload();
        });
        
    });
});



</script>

 


@endsection
