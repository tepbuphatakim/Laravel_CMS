<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('tag', [ 'tags' => $tags ]);
    }
    public function create()
    {
        return view('tag-create');
    }
    public function store(Request $request)
    {
        $tag = $request->only('title',);

        Tag::create($tag);
        return redirect()->route('tag.index');
    }
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag-show', [ 'tag' => $tag ]);
    }
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag-edit', [ 'tag' => $tag ]);
    }
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $data = $request->only('title');

        $tag->update($data);
        return redirect()->route('tag.index'); 
    }
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
