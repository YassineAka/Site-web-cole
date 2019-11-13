@extends('template')
@section('title','Home')
@section('content')


<div class="row">
    <div class="col emp-profile"style="margin: 2%;"> 
        <table class="table table-striped table-hover" id="MyTable">
            <h1>Version du dernier commit</h1>
            <thead>
                <tr>
                    <th scope="col">Author</th>
                    <th scope="col">Id commit </th>
                    <th scope="col">Date</th>
                    <th scope="col">Commentaire</th>
                    <th scope="col">Lien du commit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding:1em"> {{$version[2]}}</td>
                    <td style="padding:1em"> {{$version[1]}}</td>
                    <td style="padding:1em">{{$version[3]}}</td>
                    <td style="padding:1em">{{$version[4]}} </td>
                    <td style="padding:1em"><a href= https://git.esi-bru.be/PRJL-2019-2020/Projet-Attributions-Groupe-LesCerveaux/commit/{{$version[1]}}> Lien vers dernier commit </a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
