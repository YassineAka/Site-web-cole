@extends('template')
@section('title','Home')
@section('content')


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<div class="row">
    <div class="col emp-profile"style="margin: 2%;"> 
        <section class="services py-5 bg-light1 text-center">
            <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="{{ url('teachers') }}" class="text-body">
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <img  src="/resources/Images/ic_teacher.png" width="100" height="100"></br></br>
                                <small class="text-secondary"></small>
                                <h5>Teachers</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="{{ url('courses') }}" class="text-body">
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <img  src="resources/Images/ic_courses.png" width="100" height="100"></br></br>
                                <small class="text-secondary"></small>
                                <h5>Courses</h5>
                            </div>
                        </div>
                    </a>
                    
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <a href="{{ url('missions') }}" class="text-body">
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                <img  src="../../resources/Images/ic_missions.png" width="100" height="100"></br></br>
                                    <small class="text-secondary"></small>
                                    <h5>Missions</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <a href="{{ url('groupes') }}" class="text-body">
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                <img  src="./resources/Images/ic_groups.png" width="100" height="100"></br></br>
                                    <small class="text-secondary"></small>
                                    <h5>Groups</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <a href="{{ url('version') }}" class="text-body">
                                <div class="card bg-light mb-3">
                                    <div class="card-body">
                                        <img  src="../resources/Images/ic_versions.png" width="100" height="100"></br></br>
                                        <small class="text-secondary"></small>
                                        <h5>Version</h5>
                                    </div>
                                </div>
                            </a>
                    </div>
                </div>
            </section>
        </div>
</div>

@endsection
