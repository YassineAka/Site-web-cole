@extends('template')
@section('title','Home')
@section('content')

<h1> Version du dernier commitageeee.</h1>

{{$version[0]}}
<\br>
{{$version[1]}}
<\br>
{{$version[2]}}
<\br>
{{$version[3]}}
<\br>
{{$version[4]}}
<\br>
<a href= https://git.esi-bru.be/PRJL-2019-2020/Projet-Attributions-Groupe-LesCerveaux/commit/{{$version[1]}}> Lien vers dernier commit </a>
@endsection
