@extends('template')
@section('title','Home')
@section('content')

<h1> Version du dernier commit.</h1>
<table border=1>

<tr>
    <th>Author</th>
    <th>Id commit </th>
    <th>Date</th>
    <th>Commentaire</th>
    <th>Lien du commit</th>

</tr>
<tr>
    <td> {{$version[2]}}</td>
    <td> {{$version[1]}}</td>
    <td>{{$version[3]}}</td>
    <td>{{$version[4]}}</td>
    <td><a href= https://git.esi-bru.be/PRJL-2019-2020/Projet-Attributions-Groupe-LesCerveaux/commit/{{$version[1]}}> Lien vers dernier commit </a></td>

</tr>

</table>

@endsection
