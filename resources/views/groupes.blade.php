@extends('template')
@section('title','List Of Groups')
@section('content')


<div class="row">
    <div class="col"style="margin-left: 2%;"> 
    <div class="row">
            <div class="col-9">
            </div>
            <div class="col">
                <button id= "btnAdd" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">add group</button>
            </div>
        </div> 
           <table class="table table-striped table-hover" id="MyTable" >
            <h1>List Of Groups</h1>
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
                    <td><button type="button" class="btn btn-danger"> X</button> <button type="button" class="btn btn-secondary">✎</button></td>

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
            <p>Veuillez entrer les cordonnées du groupe à ajouter dans le formulaire ci-joint.</p>
            
            <div class="form-group">
                <label for="id">Name of group</label>
                <input type="text"  id="id" class="form-control" placeholder="Name of Group...">
            </div>
            
            <button id="btn"type="submit" class="btn btn-primary">Add</button>

        </div>
    </div>
    </div>

    
<script>
  $(document).ready(function() {
    $("#btn").click(function() {
      let id = $("#id").val();
      let url = "./groupes/add/" + id ;
      $.get(url, function(jsData, status) {});
      location.reload();
      $("#MyTable").load( "group #MyTable" );
    });
});       
 
</script>
@endsection
