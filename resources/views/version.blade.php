@extends('template')
@section('title','Home')
@section('content')

<h1> Version du dernier commit.</h1>
<table border=1>
{{$version[0]}}
{{$version[2]}}
<tr>
    <th>Author</th>
    <th>Id commit </th>
    <th>Date</th>
</tr>
<tr>
    <td> {{$version[2]}}</td>
    <td> {{$version[1]}}</td>
    <td>{{$version[3]}}</td>
</tr>

</table>
<a href= https://git.esi-bru.be/PRJL-2019-2020/Projet-Attributions-Groupe-LesCerveaux/commit/{{$version[1]}}> Lien vers dernier commit </a>
@endsection
