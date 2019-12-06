@extends('template')
@section('title','Groups')
@section('content')


<div class="row">
    <div class="col emp-profile"style="margin: 2%;"> 
        <div class="container">
            <div class="modal fade" id="formulaire">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modify group </h4>
                            <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">
                            <form id='formModify' class="col">
                                <div class="form-group">
                                    <label for="groupForm" class="form-control-label">Group</label>
                                    <input type="text" class="form-control" name="groupForm" id="groupForm">
                                </div>
                                <button id="bttnSaveModify" class="btn btn-primary pull-right">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1>Groups</h1>
        <div class="row">
                <div class="col-9">
                </div>
                <div class="col">
                    <button id= "btnAdd" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2" style="margin-bottom:2em;">Add group</button>
                </div>
            </div> 
            <table class="table table-striped table-hover" id="MyTable" >
                <thead>
                    <tr>
                        <th scope="col">Group</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listGroups as $group)
                    <tr>
                        <td> {{$group->getId()}} </td>
                        <td>
                            <button type="button" id="{{$group->getId()}}test" value="{{$group->getId()}}" class="del btn btn-danger "> X</button> 
                            <button type="button" value="{{$group->getId()}}" class="btn btn-secondary btnModify selenium" data-toggle="modal" data-target="#formulaire">✎</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="col collapse multi-collapse" id="multiCollapseExample2">
            <div style="padding:2%;">
                <div class="row">
                <div class="col-10">
                </div>
                <div class="col">
                    <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">X</button>
                    </div>
                </div> 
                <h1>Inscription</h1>
                <p>Veuillez entrer les cordonnées du groupe à ajouter dans le formulaire ci-joint.</p>
                
                <div class="form-group" id="answer"></div>
                <div class="form-group">
                    <label for="id">Name of group</label>
                    <input type="text"  id="id" class="form-control" placeholder="Name of Group...">
                </div>
                
                <button id="inscription"type="submit" class="btn btn-primary">Add</button>

            </div>
        </div>
    </div>

    
<script>
  $(document).ready(function() {
    $("#inscription").click(function() {
        let id = $("#id").val().toUpperCase();
        $.get("groupes/add?id="+id, function(data, status) {
            if(data == "true"){
                let msg = "<div class='alert alert-success' role='alert'>The groupe has been registered !</div>"
                $("#answer").html(msg);
                $("#id").val('');
                location.reload();
            } else{
                let msg = "<div class='alert alert-danger' role='alert'>The groupe has not been registered !</div>"
                $("#answer").html(msg);
            }
        });
    });   
    $(".del").click(function() {
        let sigle = $(this).val();
        let url ="./groupes/delete/"+sigle;
        $.get(url, function(data, status) {
            location.reload();
        });
        
    });
    
    
    $(".btnModify").click(function () {
         id_globale = $(this).val();
         let url = "./groupes/getGroupJson/" + id_globale;
         $.get(url, function (data, status) {
            group = JSON.parse(data);
            $('input[name="groupForm"]').val(group['id']);
         });
      });
      $("#bttnSaveModify").click(function () {
        let id = id_globale;
        let id2 = $("#groupForm").val().toUpperCase();
        let url = "./groupes/modify?id="+id+"&id2="+id2;
        $.get(url, function (data, status) {
        });
      });
});       
 
</script>
@endsection
