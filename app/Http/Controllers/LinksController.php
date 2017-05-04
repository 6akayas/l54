<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use App\Link;
use Auth;
use View;


class LinksController extends Controller
{

    protected $rules =
        [
            'title' => 'required|min:2|max:32|regex:/^[a-z ,.\'-]+$/i',
            'url' => 'required'
        ];


    public function index()
    {
        $links = Link::all();
        return view('links', ['links' => $links]);
    }

    public function show($id)
    {
        $link = Link::findOrFail($id);
        return view('links.show', ['link' => $link ]);
    }

    public function create()
    {
        return view('submit');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

            $link = new Link;
            $link->title = $request->title;
            $link->url = $request->url;
            $link->description = $request->description;
            $link->save();
            return response()->json($link);
    }

    public function edit($id)
    {
        $link = Link::findOrFail($id);
        return view('links.edit', ['link' => $link ]);
    }

    public function update($id, Request $request)
    {
        $link = Link::findOrFail($id);
        $input = $request->only(['title', 'url', 'description']);
        $link->update($input);

        return view('links.show', ['link' => $link]);
    }

    public function destroy($id)
    {
        $link = Link::findOrFail($id);
        $link->delete();

        return view('links');
    }



}
