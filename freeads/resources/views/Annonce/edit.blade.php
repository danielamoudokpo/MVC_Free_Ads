@extends('layouts.app')

@section('content')
 </div>
 <div class="container">
     <div class="row">
         
         <div class="col-md-8 col-md-offset-2">
             
             <h1>Edit Ad</h1>
             
         <form  method="POST" action="{{route('Annonce.update', $Annonce->id)}}" enctype="multipart/form-data">
        {{-- {!! Form::open(['action'=>['AnnonceController@update',$Annonce->id], 'method'=> 'POST']) !!} --}}
            @csrf
                 <div class="form-group">
                     <label for="title">Title <span class="require">*</span></label>
                 <input type="text" class="form-control" value="{{$Annonce->title}}" name="title" />
                 </div>
                 
                 <div class="form-group">
                     <label for="description">Description</label>
                     <input rows="5" class="form-control" value="{{$Annonce->description}}"name="description" />
                 </div>

                 <div>
                    <label for="image1">image1 <span class="require">*</span> <small>(This field use in url path.)</small></label>
                    <input id="image1" type="file" class="form-control @error('image1') is-invalid @enderror" name="image1" value="{{ old('image1') }}" autocomplete="image1">
                 </div>

                 <div>
                    <label for="image2">image2 <span class="require"></label>
                    <input id="image2" type="file" class="form-control @error('image1') is-invalid @enderror" name="image2" value="{{ old('image2') }}" autocomplete="image2">
                 </div>

                <div class="form-group">
                    <label for="prix">Price <span class="require">*</span></label>
                    <input type="text" class="form-control" value="{{$Annonce->prix}}" name="prix" />
                </div>
                 
                 <div class="form-group">
                     <p><span class="require">*</span> - required fields</p>
                 </div>
                 
                 <div class="form-group"> 
                     {{-- {{ Form::hidden('_method','PUT')}} --}}
                     <input type="hidden" name="_method" value ="PUT">
                    <button type='submit'class="btn btn-primary">Edit </button>
                 </div>

            {{-- {!! Form::close() !!}  --}}
             </form>
         </div>
        </div>
    </div>
</div>
@stop