<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonce = Annonce::orderBy('title','asc')->get();
        // echo "test";
        
        return view('Annonce.index')->with('Annonce',$annonce);
    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){

        
        $titleValue = $request['searchByName'];
        $prixOrder = $request['searchByPrice'];
        $dateOrder = $request['searchByDate'];

    if ($prixOrder != 'Price' && $dateOrder != 'Date' ) {
        
        $annonce = Annonce::where('title', 'LIKE', "%".$titleValue."%")
                        ->orderBy('prix', $prixOrder)
                            ->orderBy('created_at', $dateOrder)
                                    ->get();

            return view('Annonce.search')->with('Annonce',$annonce);
    }
    else{
        echo 'non';
        $prixOrder ="asc";
        $dateOrder ="asc";
        $annonce = Annonce::where('title', 'LIKE', "%".$titleValue."%")
                        ->orderBy('prix', $prixOrder)
                            ->orderBy('created_at', $dateOrder)
                                ->get();

        return view('Annonce.search')->with('Annonce',$annonce);
    }
        
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $an = Annonce::find($request);
        // $annonce = 

        return view('Annonce.create');

        // return "sdf";
        
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $this->validate($request,[
            'title' => 'required',
            'description'=> 'required',
            'image1'=> 'required|image|max:1999',
            'image2'=> 'nullable|image|max:1999',
            'prix'=> 'required|integer',
        ]);

        // FILL HANDLER
       
        $filenameExt = $request->file('image1')->getClientOriginalName(); 
        $filename = pathinfo($filenameExt,PATHINFO_FILENAME);
        $extension = $request->file('image1')->getClientOriginalExtension();
        // FILLENAME TO STORE
        $fileNameToStore = $filename.'-'.time().'.'.$extension;
        $path =$request->file('image1')->storeAs('public/images',$fileNameToStore);

        if ($request->hasFile('image2')) {
            $filenameExt = $request->file('image2')->getClientOriginalName(); 
            $filename = pathinfo($filenameExt,PATHINFO_FILENAME);
            $extension = $request->file('image2')->getClientOriginalExtension();
            // FILLENAME TO STORE
            $fileNameToStore2 = $filename.'-'.time().'.'.$extension;
            $path =$request->file('image2')->storeAs('public/images',$fileNameToStore2);
        }else{
            $fileNameToStore2 = 'noImage.jpg';
        }
        
        $annonce = new Annonce;

        $annonce->title = $request['title'];
        $annonce->description = $request['description'];
        $annonce->image1 = $fileNameToStore;
        if ($request->hasFile('image2')) {
            $annonce->image2 = $fileNameToStore2;
        }else{
            $fileNameToStore2 = 'noImage.jpg';
        }
        $annonce->prix = $request['prix'];
        $annonce->user_id = Auth::user()->id;

        $annonce->save();

        return redirect()->back()->with('success','Add Created');

    //    if (isset($request['title']) && isset()) {
    //        # code...
    //    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annonce = Annonce::find($id);
        
        return view('Annonce.show')->with('Annonce',$annonce);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $annonce = Annonce::find($id);

        return view('Annonce.edit')->with('Annonce',$annonce);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $annonce = Annonce::find($id);

        if(Auth::user()->id !== $annonce->user_id){
            return redirect('/Annonce')->with('error','You\'r Not The Creator');

        }else if($request->hasFile('image')){
            $filenameExt = $request->file('image1')->getClientOriginalName(); 
            $filename = pathinfo($filenameExt,PATHINFO_FILENAME);
            $extension = $request->file('image1')->getClientOriginalExtension();
            // FILLENAME TO STORE
            $fileNameToStore = $filename.'-'.time().'.'.$extension;
            $path = $request->file('image1')->storeAs('public/images',$fileNameToStore);
        }
        $this->validate($request,[
            'title' => 'required',
            'description'=> 'required',
            'image1'=> 'nullable',
            'image1'=> 'nullable',
            'prix'=> 'required|integer',
        ]);
        
        $annonce = Annonce::find($id);

        $annonce->title = $request['title'];
        $annonce->description = $request['description'];
        if($request->hasFile('image1')){
            $annonce->image1 = $fileNameToStore;
        }
        if($request->hasFile('image2')){
            $annonce->image1 = $fileNameToStore2;
        }
        $annonce->prix = $request['prix'];

        $annonce->save();

        return redirect()->back()->with('success','Add Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $annonce = Annonce::find($id);
        
        // CHECK FOR THE RIGHT USER BEBORE DELETE

        if(Auth::user()->id !== $annonce->user_id){
            return redirect('/Annonce')->with('error','You Don\'t Have Acess');
        }

        if ($annonce->image2 !='noImage.jpg') {
            Storage::delete('public/images/'.$annonce->image2);
        }
        Storage::delete('public/images/'.$annonce->image1);
        $annonce->delete();

        return redirect('/Annonce')->with('success','Add Deleted');
    }
}

