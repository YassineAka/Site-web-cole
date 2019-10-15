@extends('template')
@section('title','Home')
@section('content')

<h1> Version du dernier commitageeee.</h1>

{{$version[0]}}

<a href= https://git.esi-bru.be/PRJL-2019-2020/Projet-Attributions-Groupe-LesCerveaux/commit/{{$version[1]}}> Lien vers dernier commit </a>
@endsection
