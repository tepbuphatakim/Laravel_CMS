<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleListResource;

class ArticleController extends Controller
{
    public function articleLists()
    {
        $articles = DB::table('articles')->get();
        $response = ArticleListResource::collection($articles);
        return $response;
    }
}
