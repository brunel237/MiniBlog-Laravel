<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Models\Publication;
use App\Models\User;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  \Illuminate\Http\Response
     */
    public function index()
    {
        return view('publication.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publication.form');
    }

    public function store(StorePublicationRequest $request)
    {
        $p = new Publication([
            'user_id'=>auth()->user()->id,
            'comment'=>$request->input('comment')
        ]);
        $p->save();

        return redirect()->route('dashboard');
    }


    public function show($publication_id)
    {
        // $publication = Publication::where('publication_id', $publication_id)->first();
        // $user = User::getUser($publication->user_id);
       //dd($user->user_id);
        return view('publication.show', ['publication_id'=>$publication_id] );
    }

    public function edit($publication_id)
    {
        return view('publication.edit', ['id'=>$publication_id]);
    }

    /*
     */
    public function update(UpdatePublicationRequest $request, $publication_id)
    {
        Publication::find($publication_id)->update([
            'comment'=>$request->input('comment')
        ]);

        return redirect()->route('publication.show', $publication_id);
    }

    public function destroy($publication_id)
    {
        Publication::find($publication_id)->delete();
        return redirect()->route('dashboard');
    }
}
