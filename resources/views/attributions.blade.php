@extends('template')
@section('title','Courses')
@section('content')
<div class="row">
    <div class="col emp-profile"style="margin: 2%;"> 
        <h1>Attributions</h1>
        <button id= "btn_cours_to_groups" class="btn btn-primary" type="button"  data-toggle="collapse" data-target="#multi_cours_to_groups" aria-expanded="false" aria-controls="multi_cours_to_groups">Attributions course to groups</button>

        <button id= "btn_cours_groups_to_prof" class="btn btn-primary" type="button"  data-toggle="collapse" data-target="#multi_cours_groups_to_prof" aria-expanded="false" aria-controls="multi_cours_groups_to_prof">Attributions course / groups to teacher</button>
    
    
        <div class="col collapse multi-collapse" id="multi_cours_to_groups">
            <div style="padding:2%;margin-right:5%;" >
                <div class="row">
                <div class="col-10">
                </div>
                <div class="col">
                    <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#multi_cours_to_groups" aria-expanded="false" aria-controls="multi_cours_to_groups">X</button>
                    </div>
                </div> 
                <h1>Attributions course to groups</h1>
                <p>Selectionnez le cours et cochez les groupes dans le formulaire ci-joint.</p>
                
                <div class="form-group" id="answer"></div>
                <div class="form-group">
                    <label for="id">Course</label>
                    <select class="form-control" id="slctr_course">
                    
                    @foreach ($courses as $course)
                        <option value="{{$course->getId()}}">{{$course->getId()}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="groups">Groups</label>
                        @foreach ($groups as $group)
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$group->getId()}}" id="{{$group->getId()}}">
                            <label class="form-check-label" for="{{$group->getId()}}">
                                {{$group->getId()}}
                            </label>
                    </div>
                    
                    @endforeach
                </div>
                <div class="form-group">
                    

                </div>

                
                <button id="send_cours_to_groups"type="submit" class="btn btn-primary">Add</button>

            </div>
        </div>
        <div class="col collapse multi-collapse" id="multi_cours_groups_to_prof">
            <div style="padding:2%;margin-right:5%;" >
                <div class="row">
                <div class="col-10">
                </div>
                <div class="col">
                    <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#multi_cours_groups_to_prof" aria-expanded="false" aria-controls="multi_cours_groups_to_prof">X</button>
                    </div>
                </div> 
                <h1>Inscription</h1>
                <p>Veuillez entrer les cordonnées du cours à ajouter dans le formulaire ci-joint.</p>
                
                <div class="form-group" id="answer"></div>
                <div class="form-group">
                    <label for="id">Sigle</label>
                    <input type="text"  id="id" class="form-control" placeholder="Sigle...">
                </div>
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text"  id="name"class="form-control" placeholder="Title...">
                </div>
                <div class="form-group">
                    <label for="nbHours">Hours</label>
                    <input type="number"  id="nbHours"class="form-control" placeholder="Hours...">
                </div>
                <div class="form-group">
                    

                </div>

                
                <button id="bou"type="submit" class="btn btn-primary">Add</button>

            </div>
        </div>
        </br>
        </br>
            <nav class="nav nav-tabs">
            <a class="nav-item nav-link active" href="#coursesToGroupes" data-toggle="tab">Courses to groups</a>
            <a class="nav-item nav-link" href="#courses_groupesToProf" data-toggle="tab">Course / Groups to profs</a>
            </nav>
            <div class="tab-content">
            <div class="tab-pane active" id="coursesToGroupes">
                <table class="table table-striped table-hover" id="courses_To_Groupes">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Courses</th>
                            <th scope="col">Groups</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses_groups as $courseGroup)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class ="courses" id="{{$courseGroup->getCourse()}}">{{$courseGroup->getCourse()}}</td>
                            <td class ="courses" id="{{$courseGroup->getGroupe()}}"> {{$courseGroup->getGroupe()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="courses_groupesToProf">
            
                <table class="table table-striped table-hover" id="courses_groupes_To_Prof">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Courses / Groups</th>
                            <th scope="col">Teachers</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
</div>

<script>

$(document).ready(function(){
    $("#send_cours_to_groups").click(function() {
        /*
        let strCourse = slctr_course.options[slctr_course.selectedIndex].value;
         $.get("attributions/add?course="+strCourse+"&nbHours="+nbHours+"&strCat="+strCat, function (data, status) {
            if(data == "true"){
               let msg = "<div class='alert alert-success' role='alert'>The mission has been registered !</div>"
               $("#answer").html(msg);
               $("#title").val('');
               $("#nbHours").val('');
               location.reload();
            } else{
               let msg = "<div class='alert alert-danger' role='alert'>The mission has not been registered !</div>"
               $("#answer").html(msg);
            }
         });*/
    }

});
</script>

 


@endsection
