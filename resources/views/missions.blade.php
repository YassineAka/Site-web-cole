@extends('template')
@section('title','List Of Missions')
@section('littletitle','List Of Missions')
@section('content')

<table id="MyTable" border=1>
        <tr>
        <th>Title</th>
        <th>NbHours</th>
        <th>Categorie</th>

        </tr>
        @foreach ($missions as $mission)
            <tr>
            <td class ="missions" id="{{$mission->getTitle()}}">{{$mission->getTitle()}}</td>
            <td>{{$mission->getNbHours()}}</td>
            <td>{{$mission->getCat()}}</td>

            </tr>
        @endforeach
</table>
 


@endsection
