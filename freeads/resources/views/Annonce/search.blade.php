@extends('layouts.app')

@section('content')

<div class="container">

<form class="form-inline my-2 my-lg-0" method="POST" action="{{route('Annonce.search')}}">
    @csrf
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchByName">
    <button class=" fa fa-search btn btn-outline-success my-2 my-sm-0" type="submit">Search~Name</button>
  </form>

  <form class="form-inline my-2 my-lg-0" method="POST" action="{{route('Annonce.search')}}">
    @csrf
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchByPrice">
    <button class=" fas fa-search-dollar btn btn-outline-success my-2 my-sm-0" type="submit">Search~price</button>
    {{-- <i class="fas fa-search-dollar"></i> --}}

  </form>
    <h1>Searched Annonces</h1>
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
        <h1>No Annonce Found</h1>
    @endif
        </div>
    </div>
</div>
@stop