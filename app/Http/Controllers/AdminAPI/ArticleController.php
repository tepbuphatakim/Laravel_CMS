<?php

namespace App\Http\Controllers\AdminAPI;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\APIPaginateCollection;
use App\Http\Resources\ArticleDetailResource;

class ArticleController extends Controller
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
            $data = Article::paginate($perPage, ['*'], 'page', $currentPage);
            $response = new APIPaginateCollection($data, ArticleResource::class, 'data');
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
    public function store(ArticleRequest $request)
    {
        DB::beginTransaction();
        try {
            $article = Article::create($request->only('title', 'content', 'category_id'));
            $article->tags()->sync($request->input('tag_ids'));
            DB::commit();
            return response()->json([ 'success' => true ]);
        } catch (\Throwable $th) {
            DB::rollback();
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
            $data = Article::findOrFail($id);
            $response = new ArticleDetailResource($data);
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
    public function update(ArticleRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $article = Article::findOrFail($id);
            $article->update($request->only('title', 'content', 'category_id'));
            $article->tags()->sync($request->input('tag_ids'));
            DB::commit();
            return response()->json([ 'success' => true ]);
        } catch (\Throwable $th) {
            DB::rollback();
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
        DB::beginTransaction();
        try {
            $article = Article::findOrFail($id);
            $article->delete();
            DB::commit();
            return response()->json([ 'success' => true ]);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
