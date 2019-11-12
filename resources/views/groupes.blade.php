@extends('template')
@section('title','List Of Groups')
@section('content')


<div class="row">
    <div class="col"style="margin-left: 2%;"> 
        <table class="table table-striped table-hover" id="tableau" >
            <h1>List Of Groups</h1>
            <thead>
                <tr>
                    <th scope="col">Group</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($listGroups as $group)
                <tr>
                    <td> {{$group->getId()}} </td>
                    <td><button type="button" class="btn btn-danger"> X</button> <button type="button" class="btn btn-secondary">✎</button></td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
