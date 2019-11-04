@extends('template')
@section('title','List Of Missions')
@section('content')


<div class="row">
<div class="col"style="margin-left: 2%;"> 
<div id="listMissions">
@foreach ($cat as $c)
<h2>{{$c->getCat()}}</h2>
  @foreach ($missions as $mission)
     @if ($c->getCat()==$mission->getCat())        
              - {{$mission->getTitle()}} , {{$mission->getNbHours()}} heures
              <br/>
        @endif
    @endforeach

 @endforeach
</div>
</div>

<div style="padding:2%;margin-right:5%;" >
            <h1>Inscription</h1>
            <p>Veuillez entrer les cordonnées de la mission à ajouter dans le formulaire ci-joint.</p>
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"  id="title" class="form-control" placeholder="Title...">
            </div>
            <div class="form-group">
                <label for="nbHours">Hours</label>
                <input type="number"  id="nbHours"class="form-control" placeholder="Hours...">
            </div>
            <div class="form-group">
            <label for="cat">Catégorie</label><br/>
               <SELECT class="mission" name= "selector" id="selector" size="1">
                  @foreach ($cat as $categorie)
                     <OPTION value="{{$categorie->getCat()}}" > {{$categorie->getCat()}}
                  @endforeach
               </SELECT>
            </div>
            
            <button id="btn"type="submit" class="btn btn-primary">Add</button>
</div>
</div>
<script>
  $(document).ready(function() {
    $("#btn").click(function() {
      let title = $("#title").val();
      let nbHours = $("#nbHours").val();
      let selector = document.getElementById("selector");
      let strCat = selector.options[selector.selectedIndex].value;
      let url = "./missions/add/" + title + "/" + nbHours + "/" + strCat;
      $.get(url, function(jsData, status) {});
      location.reload();
      $("#listMissions").load( "missions #listMissions" );
    });
            });
            
</script>

@endsection