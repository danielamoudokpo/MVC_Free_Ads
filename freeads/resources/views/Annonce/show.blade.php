@extends('layouts.app')


@section('content')
<li class="nav-item ">
    <a class="fa fa-hand-o-left" style="font-size:36px" href="{{route('Annonce.index')}}">BACK</a> 
</li> 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label for="title">Title <span class="require">*</span></label>
                {{-- <input type="text" class="form-control" name="title" /> --}}
                <h1>{{$Annonce->title}}</h1>
            </div>
            <div class="form-group">
                {{-- <label for="description">Image</label> --}}
                <img style="width:40%" src="/storage/images/{{$Annonce->image1}}"/>

                @if(isset($Annonce->image2) && $Annonce->image2 !== "noImage.jpg")
    
                    <img style="width:50%" src="/storage/images/{{$Annonce->image2}}"/>
    
                @endif
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <h1>{{$Annonce->description}}</h1>
            </div>
            <div class="form-group">
                <label for="prix">Price <span class="require">*</span></label>
                <h1>{{$Annonce->prix.' '."$"}}</h1>
            </div>
        </div>
    </div>
    @if(!Auth::guest())
   <a href="/Annonce/{{$Annonce->id}}/edit"><button class="btn btn-primary ">edit</button><a>
    <div class="float-right">
        <form  method="POST" action="{{route('Annonce.destroy', $Annonce->id)}} " class="pull-right">
            @csrf
            <input type="hidden" name="_method"  value="DELETE">
            <button type="submit" class="btn btn-danger ">DELETE</button>
        </form>
    </div>
</div>
@endif
@stop