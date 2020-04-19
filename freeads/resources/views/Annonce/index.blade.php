@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    
        <form class="form-inline my-2 my-lg-0" method="POST" action="{{route('Annonce.search')}}">
            @csrf
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchByName">
            {{-- <button class=" fa fa-search btn btn-outline-success my-2 my-sm-0" type="submit">Search~Name</button> --}}
            
            {{-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchByPrice"> --}}
            <select class="form-control mr-sm-2" name="searchByPrice">
                <option selected> Price </option>
                <option value="asc"> Croissant </option>
                <option value="desc"> Decroissant </option>
            </select>

            <select class="form-control mr-sm-2" name="searchByDate">
                <option selected> Date </option>
                <option value="desc"> Most Recent </option>
                <option value="asc"> Least Recent </option>
            </select>
            <button class=" fas fa-search-dollar btn btn-outline-success my-2 my-sm-0" type="submit">Search~price</button>
        </form>
    
    </div>


<div class="container">
    <h1>Les Annonces</h1>
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
            <div class="row">
                <div class="col-md-3">
                    <h3><a href="Annonce/{{$Annonce->id}}">{{$Annonce->title}}</a></h3>
                    <small>{{$Annonce->prix.' euros'}}</small>
                </div>

                <div class="col-md-3">
                    <h3><a href="Message/{{$Annonce->id}}"><button class="btn btn-primary">MESSAGE</button></a></h3>
                </div>
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