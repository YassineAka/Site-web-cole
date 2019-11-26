@extends('template')
@section('title','Groups')
@section('content')


<div class="row">
    <div class="col emp-profile"style="margin: 2%;"> 
        <h1>Groups</h1>
        <div class="row">
                <div class="col-9">
                </div>
                <div class="col">
                    <button id= "btnAdd" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2" style="margin-bottom:2em;">add group</button>
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
                        <td><button type="button" id="{{$group->getId()}}test" value="{{$group->getId()}}" class="del btn btn-danger "> X</button> <button type="button" class="btn btn-secondary">✎</button></td>
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
        let id = $("#id").val();
        $.get("groupes/add?id="+id, function(data, status) {
            if(data == "true"){
                let msg = "<div class='alert alert-success' role='alert'>The groupe has been registered !</div>"
                $("#answer").html(msg);
                $("#id").val('');
                $("#MyTable").load( "groupes #MyTable" );
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
});       
 
</script>
@endsection
