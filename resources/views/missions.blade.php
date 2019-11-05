@extends('template')
@section('title','List Of Missions')
@section('content')


   <div class="row">
   
    <div class="col"style="margin-left: 2%;"> 
        <div class="row">
            <div class="col-9">
            </div>
            <div class="col">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Ajouter une mission</button>
            </div>
        </div> 
   
      @foreach ($cat as $c)
         <table class="table table-striped table-hover" id="listMissions">
               <h1 id="{{$c->getCat()}}"> {{$c->getCat()}}</h1>
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
                        <th scope="row"></th>
                        <td >{{$mission->getTitle()}}</td>
                        <td> {{$mission->getNbHours()}}</td>
                        <td><button type="button" class="btn btn-danger"> X</button> <button type="button" class="btn btn-secondary">✎</button></td>
                     </tr>
                     
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

</div>


<script>
   $(document).ready(function () {
      $("#button").click(function () {
         let title = $("#title").val();
         let nbHours = $("#nbHours").val();
         let selector = document.getElementById("selector");
         let strCat = selector.options[selector.selectedIndex].value;
         let url = "./missions/add/" + title + "/" + nbHours + "/" + strCat;
         $.get(url, function (jsData, status) {});
         location.reload();
         $("#listMissions").load("missions #listMissions");
      });
   });
</script>

@endsection