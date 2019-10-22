@extends('template')
@section('title','List Of Missions')
@section('content')


@foreach ($cat as $c)
<h2>{{$c->getCat()}}</h2>
  @foreach ($missions as $mission)
     @if ($c->getCat()==$mission->getCat())        
              - {{$mission->getTitle()}} , {{$mission->getNbHours()}} heures
              <br/>
        @endif
    @endforeach

 @endforeach

@endsection
