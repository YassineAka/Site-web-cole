@extends('template')
@section('title','List Of Teachers')
@section('content')
<div class="row">
    <div class="col"> 
    <table class="vision" border="1">
<h1 value="test">List Of Teachers</h1>
    <thead>
        <tr>
            <th>Acronyme</th>
            <th>Name</th>
            <th>Fisrt Name</th>

        </tr>
    </thead>
    <tbody>
        @foreach($listTeachers as $teacher)
        <tr id="{{$teacher->id}}">
            <td> {{$teacher->id}} </td>
            <td> {{$teacher->name}}</td>
            <td> {{$teacher->firstName}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="col">

    <form style="border:1px solid #ccc;padding:2%;margin-right:5%;">
        <h1>Inscription</h1>
        <p>Veuillez entrer les cordonnées du professeur a ajouté dans le formulaire ci-joint.</p>
        <div class="form-group">
            <label><b>Acronyme</b></label>
            <input type="text" placeholder="Entrez votre acronyme" class="form-control" name="id" id="id" required>
        </div>
        <div class="form-group">
            <label><b>Nom</b></label>
            <input type="text" placeholder="Entrez votre nom" class="form-control" name="nom" id="nom" required>
        </div>
        <div class="form-group">
            <label><b>Prenom</b></label>
            <input type="text" placeholder="Entrez votre prénom"  class="form-control" name="prenom" id="prenom" required>
        </div>
        <button type="submit"class="inscription">Inscrire</button>
    </form>
</div>
</div>
<script>
    $(document).ready(function(){
            $(".inscription").click(function(){
                let id = document.getElementById('id').value;
                let nom = document.getElementById('nom').value;
                let prenom = document.getElementById('prenom').value;

                
                    
                    alert(" ,votre inscription a bien été enregistrée !");
               );
 
 
                }
                
            });
  
</script>
method="GET" action="{{action('Rest@inscription')}}" 


<div id="answer"></div> 
 <script>
  $(document).ready(function(){
       $("button").click(function(){ 
            $.get("addStudent?id=&nom=&prenom="+, function(data, status){ 
                $("#answer").html(data);
            }); 
        }); 
    }); */
                     </script>
@endsection
