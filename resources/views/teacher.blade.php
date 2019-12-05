@extends('template')
@section('title','List Of a teacher')
@section('content')


<style>
  .profile-img{
      text-align: center;
  }
  .profile-img img{
      width: 70%;
      height: 100%;
  }
  .profile-img .file {
      position: relative;
      overflow: hidden;
      margin-top: -20%;
      width: 70%;
      border: none;
      border-radius: 0;
      font-size: 15px;
      background: #212529b8;
  }
  
  .profile-img .file input {
      position: absolute;
      opacity: 0;
      right: 0;
      top: 0;
  }
  .profile-head h5{
      color: #333;
  }
  .profile-head h6{
      color: #0062cc;
  }
  .profile-edit-btn{
      border: none;
      border-radius: 1.5rem;
      width: 70%;
      padding: 2%;
      font-weight: 600;
      color: #6c757d;
      cursor: pointer;
  }
  .proile-rating{
      font-size: 12px;
      color: #818182;
      margin-top: 5%;
  }
  .proile-rating span{
      color: #495057;
      font-size: 15px;
      font-weight: 600;
  }
  .profile-head .nav-tabs{
      margin-bottom:5%;
  }
  .profile-head .nav-tabs .nav-link{
      font-weight:600;
      border: none;
  }
  .profile-head .nav-tabs .nav-link.active{
      border: none;
      border-bottom:2px solid #0062cc;
  }
  .profile-work{
      padding: 14%;
      margin-top: -15%;
  }
  .profile-work p{
      font-size: 12px;
      color: #818182;
      font-weight: 600;
      margin-top: 10%;
  }
  .profile-work a{
      text-decoration: none;
      color: #495057;
      font-weight: 600;
      font-size: 14px;
  }
  .profile-work ul{
      list-style: none;
  }
  .profile-tab label{
      font-weight: 600;
  }
  .profile-tab p{
      font-weight: 600;
      color: #0062cc;
  }
</style>


<div class="container emp-profile">
  <div class="row">
    <div class="col-md-4">
        <div class="profile-img">
            <img src="https://picsum.photos/200/200?random=1" alt=""/>
        </div>
    </div>
    <div class="col-md-4">
      <div class="profile-head" id="info_teacher">
        <h5>{{$teacher->name}} {{$teacher->firstName}}</h5>
        <h6>Teacher</h6>
        <p class="proile-rating"> </p>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-4" >
        <button id= "btnEdit"class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2" style="margin-bottom:2em;">Edit Teacher</button>
    </div>
  </div>
  <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-8">
          <div class="tab-content profile-tab" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-md-6">
                        <label>Teacher Id</label>
                    </div>
                    <div class="col-md-6">
                        <p id="teacher_id" >{{$teacher->id}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Name</label>
                    </div>
                    <div class="col-md-6">
                        <p>{{$teacher->name}} {{$teacher->firstName}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Email</label>
                    </div>
                    <div class="col-md-6">
                        <p><a href="mailto:{{strtolower($teacher->firstName[0])}}{{strtolower($teacher->name)}}@he2b.be">{{strtolower($teacher->firstName[0])}}{{strtolower($teacher->name)}}@he2b.be<a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Profession</label>
                    </div>
                    <div class="col-md-6">
                        <p>Teacher</p>
                    </div>
                </div>
              </div>
          </div>
      </div>
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
            <h1>Edit</h1>
            <p>Veuillez entrer les nouvelles cordonnées du professeur.</p>
            
            <div class="form-group" id="answer"></div>
            <div class="form-group">
                <label><b>Acronyme</b></label>
                <input type="text" value="{{$teacher->id}}" class="form-control" name="id" id="id" required maxlength="3" size="3">
            </div>
            <div class="form-group">
                <label><b>Nom</b></label>
                <input type="text" value="{{$teacher->name}}"  class="form-control" name="nom" id="nom" required>
            </div>
            <div class="form-group">
                <label><b>Prenom</b></label>
                <input type="text" value="{{$teacher->firstName}}"   class="form-control" name="prenom" id="prenom" required>
            </div>
            <button id="modif"type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>        
</div>

 <script>
    $(document).ready(function(){
       $("#modif").click(function(){
            let id = $("#teacher_id").text();
            let id2 = $("#id").val().toUpperCase();
            let nom = $("#nom").val().charAt(0).toUpperCase()+ $("#nom").val().substr(1).toLowerCase();
            let prenom = $("#prenom").val().charAt(0).toUpperCase()+ $("#prenom").val().substr(1).toLowerCase();
            $.get("modif?id="+id+"&id2="+id2+"&nom="+nom+"&prenom="+prenom, function(data, status){
                if(data == "true"){
                    let msg = "<div class='alert alert-success' role='alert'>The teacher has been modified !</div>"
                    $("#answer").html(msg);
                    $("#id").val('');
                    $("#nom").val('');
                    $("#prenom").val('');
                    window.location.replace("./"+id2);
                } else{
                    let msg = "<div class='alert alert-danger' role='alert'>The teacher has not been modified !</div>"
                    $("#answer").html(msg);
                }
            }); 
        });
    });  
</script>


@endsection