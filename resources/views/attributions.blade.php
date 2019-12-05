@extends('template')
@section('title','Attributions')
@section('content')

<div class="row">
    <div class="col emp-profile"style="margin: 2%;"> 
        <h1>Attributions</h1>
        
      <div class="row">
         <div class="col-6">
         </div>
         <div class="col">
            <button id= "btn_cours_to_groups" class="btn btn-primary" type="button"  data-toggle="collapse" data-target="#multi_cours_to_groups" aria-expanded="false" aria-controls="multi_cours_to_groups">Attributions course to groups</button>
            <button id= "btn_cours_groups_to_prof" class="btn btn-primary" type="button"  data-toggle="collapse" data-target="#multi_cours_groups_to_prof" aria-expanded="false" aria-controls="multi_cours_groups_to_prof">Attributions course / group to teachers</button>
         </div>
      </div>
    
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
                <p>Select the course and check the groups in the attached form.</p>
                
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
                            <input class="form-check-input" type="checkbox" name="groups" value="{{$group->getId()}}" id="{{$group->getId()}}">
                            <label class="form-check-label" for="{{$group->getId()}}">
                                {{$group->getId()}}
                            </label>
                    </div>
                    
                    @endforeach
                </div>
                <div class="form-group" id="answer"></div>
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
                <h1>Attributions course / group to teachers</h1>
                <p>Select the course / groups and check the teachers in the attached form.</p>
                 
                <div class="form-group">
                    <label for="slctr_course_group">Course / Group</label>
                    <select class="form-control" id="slctr_course_group">
                    
                    @foreach ($courses_groups as $courseGroup)
                        <option value="{{$courseGroup->getCourse()}}_{{$courseGroup->getGroupe()}}">{{$courseGroup->getCourse()}} / {{$courseGroup->getGroupe()}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="teachers">Teachers</label>
                        @foreach ($teachers as $teacher)
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="teachers" value="{{$teacher->id}}" id="{{$teacher->id}}">
                            <label class="form-check-label" for="{{$teacher->id}}">
                            {{$teacher->id}}
                            </label>
                    </div>
                    
                    @endforeach
                </div>
                <div class="form-group" id="answer"></div>
                <button id="send_cours_groups_to_teachers"type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
        </br>
        </br>
            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" href="#coursesToGroupes" data-toggle="tab">Courses to groups</a>
                <a class="nav-item nav-link" href="#courses_groupesToProf" data-toggle="tab">Course / Group attributed</a>
                <a class="nav-item nav-link" href="#cours_groups_notAttributed" data-toggle="tab">Course / Group not attributed</a>
            </nav>
            </br>
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
                            <td class ="courses_groups" id="{{$courseGroup->getCourse()}}">{{$courseGroup->getCourse()}}</td>
                            <td class ="courses_groups" id="{{$courseGroup->getGroupe()}}"> {{$courseGroup->getGroupe()}}</td>
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
                        @foreach ($courses_groups_teachers as $courseGroupTeacher)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class ="courses_groups_teachers" id="{{$courseGroupTeacher->getCourse()}} / {{$courseGroupTeacher->getGroupe()}}">{{$courseGroupTeacher->getCourse()}} / {{$courseGroupTeacher->getGroupe()}}</td>
                            <td class ="courses_groups_teachers" id="{{$courseGroupTeacher->getTeacher()}}"> {{$courseGroupTeacher->getTeacher()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="cours_groups_notAttributed">
            
                <table class="table table-striped table-hover" id="cours_groups_not_attributed">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Courses</th>
                            <th scope="col">Groups</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cours_groups_not_attributed as $courseGroupNotAttributed)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class ="courses_groups" id="{{$courseGroupNotAttributed->getCourse()}}">{{$courseGroupNotAttributed->getCourse()}}</td>
                            <td class ="courses_groups" id="{{$courseGroupNotAttributed->getGroupe()}}"> {{$courseGroupNotAttributed->getGroupe()}}</td>
                        </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
</div>

<script>

$(document).ready(function(){
    
$('#courses_To_Groupes').DataTable();
$('#courses_groupes_To_Prof').DataTable();
$('#cours_groups_not_attributed').DataTable();
$('.dataTables_length').addClass('bs-select');
    $("#send_cours_to_groups").click(function() {
        let course = $("#slctr_course").val();
        let groups ="";
        $.each($("input[name='groups']:checked"), function(){
            groups = groups  +"_"+ $(this).val() ;
        });
        let goodGroups = groups.substring(1);
        $.get("attributions/course_to_groups/add?course="+course+"&groups="+goodGroups, function(data, status) {
        if(data == "false"){
            let msg = "<div class='alert alert-danger' role='alert'>The course has not been attributed !</div>"
            $("#answer").html(msg);
        } else{
            let msg = "<div class='alert alert-success' role='alert'>The course has been attributed !</div>"
            location.reload();
        }
      });
    });
    $("#send_cours_groups_to_teachers").click(function() {
        let course_group = $("#slctr_course_group").val();
        let teachers ="";
        $.each($("input[name='teachers']:checked"), function(){
            teachers = teachers  +"_"+ $(this).val() ;
        });
        let goodTeachers = teachers.substring(1);
        $.get("attributions/cours_groups_to_teachers/add?course_group="+course_group+"&teachers="+goodTeachers, function(data, status) {
        if(data == "false"){
            let msg = "<div class='alert alert-danger' role='alert'>The course / groupe has not been attributed to the teachers!</div>"
            $("#answer").html(msg);
        } else{
            let msg = "<div class='alert alert-success' role='alert'>The course / groupe has been attributed !</div>"
            location.reload();
        }
      });
    });

});
</script>

 


@endsection
