@extends('layouts.app')

@section('content')
 </div>
 <div class="container">
     <div class="row">
         
         <div class="col-md-8 col-md-offset-2">
             
             <h1>Create post</h1>
             
         <form  method="post" action="{{route('Annonce.store')}}"  enctype="multipart/form-data" >
            @csrf
                 <div class="form-group">
                     <label for="title">Title <span class="require">*</span></label>
                     <input type="text" class="form-control" name="title" />
                 </div>
                 
                 <div class="form-group">
                     <label for="description">Description</label>
                     <textarea rows="5" class="form-control" name="description" ></textarea>
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
                    <input type="text" class="form-control" name="prix" />
                </div>
                 
                 <div class="form-group">
                     <p><span class="require">*</span> - required fields</p>
                 </div>
                 
                 <div class="form-group"> 
                    <button class="btn btn-primary">
                         Create
                     </button>
                     {{-- <button class="btn btn-default">
                         Cancel
                     </button> --}}
                 </div>
                 
             </form>
         </div>
        </div>
    </div>
</div>
@stop