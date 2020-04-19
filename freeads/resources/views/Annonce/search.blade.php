@extends('layouts.app')

@section('content')
<li class="nav-item ">
    <a  class="fa fa-hand-o-left" style="font-size:36px" href="{{route('Annonce.index')}}">BACK</a> 
</li> 
<div class="container">

    <h1>Searched Annonces</h1>
 
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
@if(isset($Annonce))
    @foreach($Annonce as $Annonce)
        <div class="well">
            <div>
                <img style="width:40%" src="/storage/images/{{$Annonce->image1}}"/>

            @if(isset($Annonce->image2) && $Annonce->image2 !== "noImage.jpg")

                <img style="width:50%" src="/storage/images/{{$Annonce->image2}}"/>

            @endif
            {{-- @if($Annonce->image2 === "noImage.jpg")
                <img style="width:50%" src="/storage/images/{{$Annonce->image2}}"/>
            @endif --}}
            </div>
            
            <div>
                <h3><a href="{{$Annonce->id}}">{{$Annonce->title}}</a></h3>
                <small>{{$Annonce->prix.' euros'}}</small>
            </div>
        </div>
    @endforeach
    @else
        <h1>No Annonce Found</h1>
    @endif
        </div>
    </div>
</div>
@stop