@extends('template')
@section('title','List Of Teachers')
@section('content')
<div class="row">
    <div class="col"> 
        <table class="vision" border="1" id="tableau">
            <h1>List Of Teachers</h1>
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
        <div style="border:1px solid #ccc;padding:2%;margin-right:5%;" >
            <h1>Inscription</h1>
            <p>Veuillez entrer les cordonnées du professeur a ajouté dans le formulaire ci-joint.</p>
            
            <div class="form-group" id="answer"></div>
            <div class="form-group">
                <label><b>Acronyme</b></label>
                <input type="text" placeholder="Entrez votre acronyme" class="form-control" name="id" id="id" required maxlength="3" size="3">
            </div>
            <div class="form-group">
                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrez votre nom" class="form-control" name="nom" id="nom" required>
            </div>
            <div class="form-group">
                <label><b>Prenom</b></label>
                <input type="text" placeholder="Entrez votre prénom"  class="form-control" name="prenom" id="prenom" required>
            </div>
            <button type="submit"class="inscription" id="inscription">Inscrire</button>
        </div>
    </div>
</div>
 <script>
  $(document).ready(function(){
       $("#inscription").click(function(){
            let id = $("#id").val();
            let nom = $("#nom").val();
            let prenom = $("#prenom").val();

            $.get("addTeacher?id="+id+"&nom="+nom+"&prenom="+prenom, function(data, status){
                if(data == "true"){
                    let msg = "<div class='alert alert-success' role='alert'>The teacher has been registered !</div>"
                    $("#answer").html(msg);
                    $("#id").val('');
                    $("#nom").val('');
                    $("#prenom").val('');
                    $("#tableau").load( "teachers #tableau" );
                } else{
                    let msg = "<div class='alert alert-danger' role='alert'>The teacher has not been registered !</div>"
                    $("#answer").html(msg);
                }
            }); 
        }); 
    }); 
</script>
@endsection
