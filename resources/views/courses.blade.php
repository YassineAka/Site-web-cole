@extends('template')
@section('title','List Of Courses')
@section('littletitle','List Of Courses')
@section('content')

<table id="MyTable" border=1>
        <tr>
        <th>Sigle</th>
        <th>Libellé</th>
        </tr>
        @foreach ($courses as $course)
            <tr>
            <td class ="courses" id="{{$course->getId()}}">{{$course->getId()}}</td>
            <td>{{$course->getTitle()}}</td>
            </tr>
        @endforeach
</table>
 


@endsection
