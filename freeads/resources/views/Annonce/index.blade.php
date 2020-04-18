@extends('layouts.app')

@section('content')



<div class="container">
    <h1>Les Annonces</h1>
    <div class="row">
        
        <div class="col-md-8 col-md-offset-2">
@if(isset($Annonce))
    @foreach($Annonce as $Annonce)
        <div class="well">
            <div>
                <img style="width:50%" src="/storage/images/{{$Annonce->image1}}"/>

            @if($Annonce->image2 !== "noImage.jpg")

                <img style="width:50%" src="/storage/images/{{$Annonce->image2}}"/>

            @endif
            {{-- @if($Annonce->image2 === "noImage.jpg")
                <img style="width:50%" src="/storage/images/{{$Annonce->image2}}"/>
            @endif --}}
            </div>
            
            <div>
                <h3><a href="Annonce/{{$Annonce->id}}">{{$Annonce->title}}</a></h3>
                <small>{{$Annonce->prix.' euros'}}</small>
            </div>
        </div>
    @endforeach
    @else
        <h1>No Annonce Avalaible</h1>
    @endif
        </div>
    </div>
</div>
@stop