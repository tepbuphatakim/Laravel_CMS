<?php

namespace App\Http\Controllers\AdminAPI;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Http\Resources\APIPaginateCollection;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->limit ? $request->limit : 10;
            $currentPage = $request->page ? $request->page : 1;
            $data = Tag::paginate($perPage, ['*'], 'page', $currentPage);
            $response = new APIPaginateCollection($data, TagResource::class, 'data');
            return response()->json($response);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        try {
            Tag::create($request->only('title'));
            return response()->json([ 'success' => true ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = Tag::findOrFail($id);
            $response = new TagResource($data);
            return response()->json([ 'data' => $response ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        try {
            $tag = Tag::findOrFail($id);
            $tag->update($request->only('title', 'content'));
            return response()->json([ 'success' => true ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tag = Tag::findOrFail($id);
            $tag->delete();
            return response()->json([ 'success' => true ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
