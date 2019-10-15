@extends('template')
@section('title','Home')
@section('content')

<h1> Version du dernier commit.</h1>

{{$version}}

<a href= "https://git.esi-bru.be/PRJL-2019-2020/Projet-Attributions-Groupe-LesCerveaux/commits/deploiment"> Lien vers dernier commit </a>
@endsection
