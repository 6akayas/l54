<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function index()
    {
        $links = Link::all();
        return view('links', ['links' => $links]);
    }

    public function create()
    {
        return view('submit');
    }

    public function store(Request $request)
    {
        $link = new Link;
        $link->title = $request->title;
        $link->url = $request->url;
        $link->description = $request->description;
        $link->save();

        return redirect('links');
    }

    public function show($id)
    {
        $link = Link::findOrFail($id);
        return view('links.show', ['link' => $link ]);
    }

    public function edit($id)
    {
        $link = Link::findOrFail($id);
        return view('links.edit', ['link' => $link ]);
    }

    public function update($id)
    {
        $link = Link::findOrFail($id);
        $input = Request::all();
        $link->update($input);

        return view('links.show', ['link' => $link ]);
    }

    public function destroy($id)
    {
        $link = Link::findOrFail($id);
        $link->delete();

        return view('links');
    }



}
