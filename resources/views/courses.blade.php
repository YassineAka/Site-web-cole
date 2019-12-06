@extends('template')
@section('title','Courses')
@section('content')
<div class="row">
    <div class="col emp-profile"style="margin: 2%;"> 
        <div class="container">
            <div class="modal fade" id="formulaire">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modify course </h4>
                            <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">
                            <form id='formModify' class="col">
                                <div class="form-group">
                                    <label for="courseForm" class="form-control-label">Sigle</label>
                                    <input type="text" class="form-control" name="courseForm" id="courseForm">
                                </div>
                                <div class="form-group">
                                    <label for="titleForm" class="form-control-label">Title</label>
                                    <input type="text" class="form-control" name="titleForm" id="titleForm">
                                </div>
                                <div class="form-group">
                                    <label for="heureForm" class="form-control-label">Heures</label>
                                    <input type="number" class="form-control" name="heureForm" id="heureForm">
                                </div>
                                <button id="bttnSaveModify" class="btn btn-primary pull-right">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1>Courses</h1>
        <div class="row">
            <div class="col-9">
            </div>
            <div class="col">
                <button id= "btnAdd" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2" style="margin-bottom:2em;">Add course</button>
            </div>
        </div>
        <table class="table table-striped table-hover" id="MyTable">
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
                    <td><button type="button" id="{{$course->getId()}}test" value="{{$course->getId()}}" class="del btn btn-danger "> X</button> 
                        <button type="button" value="{{$course->getId()}}" class="btn btn-secondary btnModify selenium" data-toggle="modal" data-target="#formulaire">✎</button>
                    </td>
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
            <div class="form-group">
                

            </div>

            
            <button id="bou"type="submit" class="btn btn-primary">Add</button>

        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#bou").click(function() {
      let id = $("#id").val().toUpperCase();
      let name = $("#name").val().charAt(0).toUpperCase()+ $("#name").val().substr(1).toLowerCase();
      let nbHours = $("#nbHours").val();
      $.get("courses/add?id="+id+"&name="+name+"&nbHours="+nbHours, function(data, status) {
        if(data == "true"){
            let msg = "<div class='alert alert-success' role='alert'>The course has been registered !</div>"
            $("#answer").html(msg);
            $("#id").val('');
            $("#name").val('');
            $("#nbHours").val('');
            location.reload();
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
    
    $(".btnModify").click(function () {
         id_globale = $(this).val();
         let url = "./courses/getCourseJson/" + id_globale;
         $.get(url, function (data, status) {
            course = JSON.parse(data);
            $('input[name="courseForm"]').val(course['id']);
            $('input[name="titleForm"]').val(course['title']);
            $('input[name="heureForm"]').val(course['nbHours']);
         });
      });
      $("#bttnSaveModify").click(function () {
        let id = id_globale;
        let id2 = $("#courseForm").val().toUpperCase();
        let title = $("#titleForm").val();
        let heure = $("#heureForm").val();
        let url = "./courses/modify?id="+id+"&id2="+id2+"&name="+title+"&nbHours="+heure;
        $.get(url, function (data, status) {
            location.reload();
        });
      });
    
});
</script>

 


@endsection
