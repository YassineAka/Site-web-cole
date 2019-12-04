@extends('template')
@section('title','Missions')
@section('content')

   <div class="row">
    <div class="col emp-profile"style="margin: 2%;"id="listMissions">
    <div class="container">
    <div class="modal fade" id="formulaire">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Modifier mission</h4>              
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body row">
            <form id='formModify' class="col">
              <div class="form-group">
                <label for="missionForm" class="form-control-label">Mission</label>
                <input type="text" class="form-control" name ="missionForm" id="missionForm" >
              </div>
              <div class="form-group">
                <label for="heureForm" class="form-control-label">Heures</label>
                <input type="number" class="form-control" name="heureForm" id="heureForm" >
              </div>
              <div class="form-group">
               <label for="name">Catégorie</label>
               <select  class="form-control mission id" id="selector">
                  @foreach ($cat as $categorie)
                     <option value="{{$categorie->getCat()}}"> {{$categorie->getCat()}}</option>
                  @endforeach
               </select>
            </div>
              <button  id="bttnModify"  class="btn btn-primary pull-right">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
   </div>
         <h1>Missions</h1>
        <div class="row">
            <div class="col-9">
            </div>
            <div class="col">
                <button id= "btnAdd" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2" style="margin-bottom:2em;">Ajouter une mission</button>
            </div>
        </div> 
   
      @foreach ($cat as $c)
         <table class="table table-striped table-hover " >
            <h2 id="{{$c->getCat()}}"> {{$c->getCat()}}</h2>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Heures</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
               @foreach ($missions as $mission)
                  @if ($c->getCat()==$mission->getCat())
                     <tr>
                        <td >{{$mission->getId()}}</td>
                        <td >{{$mission->getTitle()}}</td>
                        <td> {{$mission->getNbHours()}}</td>
                        <td><button type="button" id="{{$mission->getId()}}test" value="{{$mission->getId()}}" class="btn btn-danger del">X</button> <button type="button" value="{{$mission->getId()}}" class="btn btn-secondary btnModify selenium" data-toggle="modal" data-target="#formulaire">✎</button></td> </tr>
                  @endif
               @endforeach
            </tbody>
         </table>
      @endforeach
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
            <p>Veuillez entrer les cordonnées de la mission à ajouter dans le formulaire ci-joint.</p>
            
            <div class="form-group" id="answer"></div>
            
            <div class="form-group">
               <label for="title">Title</label>
               <input type="text" id="title" class="form-control" placeholder="Title...">
            </div>
            <div class="form-group">
               <label for="name">Hours</label>
               <input type="number" id="nbHours" class="form-control" placeholder="Hours...">
            </div>
            <div class="form-group">
               <label for="name">Catégorie</label>
               <select  class="form-control mission" id="selector">
                  @foreach ($cat as $categorie)
                     <option value="{{$categorie->getCat()}}"> {{$categorie->getCat()}}</option>
                  @endforeach
               </select>
            </div>
            <button id="button" type="submit" class="btn btn-primary">Add</button>
      </div>
   </div>






<script>
   $(document).ready(function () {
      $('.container')
      $("#button").click(function () {
         let title = $("#title").val().charAt(0).toUpperCase()+ $("#title").val().substr(1).toLowerCase();
         let selector = document.getElementById("selector");
         let strCat = selector.options[selector.selectedIndex].value;
         $.get("missions/add?title="+title+"&nbHours="+nbHours+"&strCat="+strCat, function (data, status) {
            if(data == "true"){
               let msg = "<div class='alert alert-success' role='alert'>The mission has been registered !</div>"
               $("#answer").html(msg);
               $("#title").val('');
               $("#nbHours").val('');
               $("#listMissions").load("missions #listMissions");
            } else{
               let msg = "<div class='alert alert-danger' role='alert'>The mission has not been registered !</div>"
               $("#answer").html(msg);
            }
         });
      });
      $(".del").click(function() {
         let id = $(this).val();
         let url ="./mission/delete/"+id;
         $.get(url, function(jsData, status) {
            location.reload();
         });
      });
      $(".btnModify").click(function() {
         id_globale = $(this).val();
         let url ="./mission/getMissionJson/"+id_globale;
         $.get(url, function(data, status) {
            mission = JSON.parse(data);
            $('input[name="missionForm"]').val(mission['title']);
            $('input[name="heureForm"]').val(mission['nbHours']);
            $(".id").val(mission['cat']);
            console.log(mission['cat']);
         });  
      });
      $("#bttnModify").click(function(){
         console.log("ntm");
           let title = $("#missionForm").val();
           let heure = $("#heureForm").val();
           let cat = $(".id").val();
           let url = "./mission/modify/"+ id_globale +"/"+ title + "/"+ heure + "/" + cat;
           $.get(url, function(data, status){
              
           });
           location.reload();
      });
   }); 
</script>
@endsection