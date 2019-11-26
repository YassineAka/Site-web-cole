





@extends('template')
@section('title','Teachers')
@section('content')


<div class="row ">
    <div class="col emp-profile"style="margin: 2%;"> 
            <h1>Teachers</h1>
        <div class="row">
            <div class="col-9">
            </div>
            <div class="col">
                <button id= "btnAdd"class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2" style="margin-bottom:2em;">Ajouter un prof</button>
            </div>
        </div>
        <table class="table table-striped table-hover" id="tableau" >
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
                 <tr class="akachar" id="{{$teacher->id}}" >
                    <th scope="row" value="{{ $loop->iteration }}">{{ $loop->iteration }}</th>
                    <td>  {{$teacher->id}} </td>
                    <td> {{$teacher->name}}</td>
                    <td> {{$teacher->firstName}}</td>
                    <td><button type="button" class="btn btn-danger del" id="{{$teacher->id}}test" value="{{$teacher->id}}">X</button> <button type="button" id="{{$teacher->id}}" class="btn btn-secondary" value="info">⇨</button></td>

               </tr>


               
                @endforeach
            </tbody>
        </table>
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
            $.get("teachers/add?id="+id+"&nom="+nom+"&prenom="+prenom, function(data, status){
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
        $(".del").click(function() {
         let id = $(this).val();
         let url ="./teachers/delete/"+id;
         $.get(url, function(jsData, status) {
            location.reload();
         });
      });
    }); 




    $(document).ready(function() {
        
        $(".btn").click(function() {
        let value = $(this).val();
        if(value=="info"){
            console.log("info");
            //let url = "./teacher/info/"+this.id;
            $.get("./teacher/info/"+this.id, function (data, status) {});
            $(location).attr('href', './teacher/info/'+this.id)

        }else if(value=="suppr"){
            console.log("suppr");
        }else{
            console.log("modif");
        }


    });
        });  
</script>
@endsection
