@extends('template')
@section('title','List Of Teachers')
@section('content')

<table class="vision" border="1">
<h1>List Of Teachers</h1>
    <thead>
        <tr>
            <th>Acro</th>
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
<p><a href="{{ url('') }}">Return to home</a></p>

@endsection
