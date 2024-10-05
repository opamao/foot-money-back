<?php

namespace App\Http\Controllers;

use App\Models\Actualites;
use Illuminate\Http\Request;

class ApiActualitesControllers extends Controller
{
    public function getNews()
    {
        $news = Actualites::orderBy("created_at", "desc")->get();

        $news->transform(function ($item) {
            $item->photo_news = asset('actualites/' . $item->photo_news);
            return $item;
        });

        return response()->json($news, 200);
    }

    public function getAddNews(Request $request)
    {

        $cumulView = Actualites::where('id_news', $request->id)
            ->increment('view_news', 1);

        if ($cumulView) {
            return response()->json(true, 200);
        } else {
            return response()->json(false, 401);
        }
    }
}
