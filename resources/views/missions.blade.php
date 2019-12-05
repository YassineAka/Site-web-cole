@extends('template')
@section('title','Missions')
@section('content')

<div class="row">
   <div class="col emp-profile" style="margin: 2%;" id="listMissions">
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
                           <input type="text" class="form-control" name="missionForm" id="missionForm">
                        </div>
                        <div class="form-group">
                           <label for="heureForm" class="form-control-label">Heures</label>
                           <input type="number" class="form-control" name="heureForm" id="heureForm">
                        </div>
                        <div class="form-group">
                           <label for="name">Catégorie</label>
                           <select class="form-control mission id" id="selectorModifCat">
                              @foreach ($cat as $categorie)
                              <option value="{{$categorie->getCat()}}"> {{$categorie->getCat()}}</option>
                              @endforeach
                           </select>
                        </div>
                        <button id="bttnModify" class="btn btn-primary pull-right">Save</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <h1>Missions</h1>
      <div class="row">
         <div class="col-8">
         </div>
         <div class="col">
            <button onclick="collapse1()" id="btnAdd" class="btn btn-primary" type="button" data-toggle="collapse"
               data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2"
               style="margin-bottom:2em;">Add mission</button>
            <button onclick="collapse2()" id="btnAddCat" class="btn btn-primary" type="button" data-toggle="collapse"
               data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3"
               style="margin-bottom:2em;">Add category</button>
            <button onclick="collapse3()" id="btnDeleteCat" class="btn btn-danger" type="button" data-toggle="collapse"
               data-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample4"
               style="margin-bottom:2em;">Delete category</button>
         </div>
      </div>

      @foreach ($cat as $c)
      <table class="table table-striped table-hover ">
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
               <td>{{$mission->getId()}}</td>
               <td>{{$mission->getTitle()}}</td>
               <td> {{$mission->getNbHours()}}</td>
               <td><button type="button" id="{{$mission->getId()}}test" value="{{$mission->getId()}}"
                     class="btn btn-danger del">X</button> <button type="button" value="{{$mission->getId()}}"
                     class="btn btn-secondary btnModify selenium" data-toggle="modal"
                     data-target="#formulaire">✎</button></td>
            </tr>
            @endif
            @endforeach
         </tbody>
      </table>
      @endforeach

   </div>

   <div class="col collapse multi-collapse" id="multiCollapseExample2">
      <div style="padding:2%;margin-right:5%;">
         <div class="row">
            <div class="col-10">
            </div>
            <div class="col">
               <button id="closeAddMission" class="btn btn-danger" type="button" data-toggle="collapse"
                  data-target="#multiCollapseExample2" aria-expanded="false"
                  aria-controls="multiCollapseExample2">X</button>
            </div>
         </div>

         <h1>Ajouter une mission</h1>
         <p>Veuillez entrer les informations de la mission à ajouter dans le formulaire ci-joint.</p>

         <div class="form-group" id="answer"></div>

         <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" placeholder="Title...">
         </div>
         <div class="form-group">
            <label for="name">Hours</label>
            <input type="number" id="nbHours" class="form-control" placeholder="Hours..." max="500">
         </div>
         <div class="form-group">
            <label for="name">Catégorie</label>
            <select class="form-control mission" id="selector">
               @foreach ($cat as $categorie)
               <option value="{{$categorie->getCat()}}"> {{$categorie->getCat()}}</option>
               @endforeach
            </select>
         </div>
         <button id="button" type="submit" class="btn btn-primary">Add</button>
      </div>
   </div>

   <div class="col collapse multi-collapse" id="multiCollapseExample3">
      <div style="padding:2%;margin-right:5%;">
         <div class="row">
            <div class="col-10">
            </div>
            <div class="col">
               <button id="closeAddCat" class="btn btn-danger" type="button" data-toggle="collapse"
                  data-target="#multiCollapseExample3" aria-expanded="false"
                  aria-controls="multiCollapseExample3">X</button>
            </div>
         </div>

         <h1>Ajouter une catégorie</h1>
         <p>Veuillez entrer les informations de la categorie à ajouter dans le formulaire ci-joint.</p>

         <div class="form-group" id="answerCat"></div>

         <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="titleCat" class="form-control" placeholder="Title...">
         </div>
         <button id="buttonCat" type="submit" class="btn btn-primary">Add</button>
      </div>
   </div>
   <div class="col collapse multi-collapse" id="multiCollapseExample4">
      <div style="padding:2%;margin-right:5%;">
         <div class="row">
            <div class="col-10">
            </div>
            <div class="col">
               <button id="closeDeleteCat" class="btn btn-danger" type="button" data-toggle="collapse"
                  data-target="#multiCollapseExample4" aria-expanded="false"
                  aria-controls="multiCollapseExample4">X</button>
            </div>
         </div>

         <h1>Supprimer une catégorie</h1>
         <p>Veuillez choisir la catégorie à supprimer dans le formulaire ci-joint.</p>

         <div class="form-group" id="answerCat"></div>

         <div class="form-group">
            <label for="name">Catégorie</label>
            <select class="form-control mission" id="selectorDeleteCat">
               @foreach ($cat as $categorie)
               <option value="{{$categorie->getCat()}}"> {{$categorie->getCat()}}</option>
               @endforeach
            </select>
         </div>
         <button id="buttonDeleteCat" type="submit" class="btn btn-primary">Supprimer</button>
      </div>
   </div>



</div>



<script>
   $(document).ready(function () {
      $("#button").click(function () {
         let title = $("#title").val().charAt(0).toUpperCase() + $("#title").val().substr(1).toLowerCase();
         let nbHours = $("#nbHours").val();
         let selector = document.getElementById("selector");
         let strCat = selector.options[selector.selectedIndex].value;
         $.get("missions/add?title=" + title + "&nbHours=" + nbHours + "&strCat=" + strCat, function (data,
            status) {
            if (data == "true") {
               let msg =
                  "<div class='alert alert-success' role='alert'>The mission has been registered !</div>"
               $("#answer").html(msg);
               $("#title").val('');
               $("#nbHours").val('');
               location.reload();
            } else {
               let msg =
                  "<div class='alert alert-danger' role='alert'>The mission has not been registered !</div>"
               $("#answer").html(msg);
            }
         });
      });
      $("#buttonCat").click(function () {

         let title = $("#titleCat").val();
         $.get("category/add?titleCat=" + title, function (data, status) {
            if (data == "true") {
               let msg =
                  "<div class='alert alert-success' role='alert'>The category has been registered !</div>"
               $("#answerCat").html(msg);
               $("#titleCat").val('');
               location.reload();
            } else {
               let msg =
                  "<div class='alert alert-danger' role='alert'>The category has not been registered !</div>"
               $("#answer").html(msg);
            }
         });

      });
      $(".del").click(function() {
         let id = $(this).val();
         let url = "./mission/delete/" + id;
         $.get(url, function (jsData, status) {
            location.reload();
         });
      });
      $(".btnModify").click(function () {
         id_globale = $(this).val();
         let url = "./mission/getMissionJson/" + id_globale;
         $.get(url, function (data, status) {
            mission = JSON.parse(data);
            $('input[name="missionForm"]').val(mission['title']);
            $('input[name="heureForm"]').val(mission['nbHours']);
            $(".id").val(mission['cat']);
         });
      });
      $("#bttnModify").click(function () {
         let title = $("#missionForm").val();
         let heure = $("#heureForm").val();
         let cat = $(".id").val();
         let url = "./mission/modify/" + id_globale + "/" + title + "/" + heure + "/" + cat;
         $.get(url, function (data, status) {
            location.reload();
         });
      });

      $("#buttonDeleteCat").click(function () {
         let selector = document.getElementById("selectorDeleteCat");
         let id = selector.options[selector.selectedIndex].value;
         let url = "./mission/deleteCat/" + id;
         $.get(url, function (jsData, status) {
            location.reload();
         });
      });

      $("#closeAddCat").click(function () {
         var second = document.getElementById("multiCollapseExample3");
         second.style.display = "none";
      });
      $("#closeAddMission").click(function () {
         var second = document.getElementById("multiCollapseExample2");
         second.style.display = "none";
      });
      $("#closeDeleteCat").click(function () {
         var second = document.getElementById("multiCollapseExample4");
         second.style.display = "none";
      });

   });

   function collapse1() {
      var first = document.getElementById("multiCollapseExample2");
      var second = document.getElementById("multiCollapseExample3");
      var third = document.getElementById("multiCollapseExample4");
      if (first.style.display === "none") {
         first.style.display = "block";
      }
      second.style.display = "none";
      third.style.display = "none";

   }


   function collapse2() {
      var first = document.getElementById("multiCollapseExample2");
      var second = document.getElementById("multiCollapseExample3");
      var third = document.getElementById("multiCollapseExample4");


      if (second.style.display === "none") {
         second.style.display = "block";
      }
      first.style.display = "none";
      third.style.display = "none";
   }

   function collapse3() {

      var first = document.getElementById("multiCollapseExample4");
      var second = document.getElementById("multiCollapseExample3");
      var third = document.getElementById("multiCollapseExample2");
      if (first.style.display === "none") {
         first.style.display = "block";
      }
      second.style.display = "none";
      third.style.display = "none";
   }
</script>
@endsection