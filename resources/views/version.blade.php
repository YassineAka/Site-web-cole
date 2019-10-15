@extends('template')
@section('title','Home')
@section('content')

<h1> Version du dernier commit.</h1>
<table border=1 style="margin-left:15%">

<tr>
    <th>Author</th>
    <th>Id commit </th>
    <th>Date</th>
    <th>Commentaire</th>
    <th>Lien du commit</th>

</tr>
<tr>
    <td style="padding:1em"> {{$version[2]}}</td>
    <td style="padding:1em"> {{$version[1]}}</td>
    <td style="padding:1em">{{$version[3]}}</td>
    <td style="padding:1em">{{$version[4]}}</td>
    <td style="padding:1em"><a href= https://git.esi-bru.be/PRJL-2019-2020/Projet-Attributions-Groupe-LesCerveaux/commit/{{$version[1]}}> Lien vers dernier commit </a></td>

</tr>

</table>

@endsection
