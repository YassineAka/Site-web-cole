@extends('template')
@section('title','List Of a teacher')
@section('content')

<!---
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="../../../resources/Images/photoprofil.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"> </h5>
    <p class="card-text"></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$teacher->id}}</li>
    <li class="list-group-item">{{$teacher->name}}</li>
    <li class="list-group-item">{{$teacher->firstName}}</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div> -->

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
    <div class="col-md-6">
      <div class="profile-head">
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
    <div class="col-md-2">
      <button id= "btnEdit"class="profile-edit-btn" type="button" >Edit Teacher</button>
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
                        <p>{{$teacher->id}}</p>
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
</div>


@endsection