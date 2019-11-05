@extends('template')
@section('title','List Of Teachers')
@section('content')
<div class="row">
    <div class="col"style="margin-left: 2%;"> 
        <table class="table table-striped table-hover" id="tableau" >
            <h1>List Of Teachers</h1>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Acronyme</th>
                    <th scope="col">Name</th>
                    <th scope="col">Fisrt Name</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($listTeachers as $teacher)
                <div class="akachar">
                <div id="{{$teacher->id}}">
                <tr>
                    <th scope="row" value="{{ $loop->iteration }}">{{ $loop->iteration }}</th>
                    <td class="info" value="{{$teacher->id}}"> {{$teacher->id}} </td>
                    <td class="info" value="{{$teacher->id}}"> {{$teacher->name}}</td>
                    <td class="info" value="{{$teacher->id}}"> {{$teacher->firstName}}</td>
                    <td><button type="button" class="btn btn-danger"> 🗑</button> <button type="button" class="btn btn-secondary">✎</button> <button type="button" class="btn btn-secondary">⇨</button></td> 

                </tr>
                </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col">
        <div style="padding:2%;margin-right:5%;" >
            <h1>Inscription</h1>
            <p>Veuillez entrer les cordonnées du professeur à ajouter dans le formulaire ci-joint.</p>
            
            <div class="form-group" id="answer"></div>
            <div class="form-group">
                <label><b>Acronyme</b></label>
                <input type="text" placeholder="Entrez votre acronyme..." class="form-control" name="id" id="id" required maxlength="3" size="3">
            </div>
            <div class="form-group">
                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrez votre nom..." class="form-control" name="nom" id="nom" required>
            </div>
            <div class="form-group">
                <label><b>Prenom</b></label>
                <input type="text" placeholder="Entrez votre prénom..."  class="form-control" name="prenom" id="prenom" required>
            </div>
            <button id="inscription"type="submit" class="btn btn-primary">Inscrire</button>
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




    $(document).ready(function() {
        
        $(".akachar").click(function() {
        let row = $(this.id);
        console.log("bonjour");
        console.log(row);
        
        /*let url ="./courses/delete/"+sigle;
        $.get(url, function(jsData, status) {});
        location.reload();
        $("#MyTable").load( "courses #MyTable" );
*/

    });
        });  
</script>
@endsection
