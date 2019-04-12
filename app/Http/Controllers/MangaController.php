<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Modules\Traits\Parser;
use App\Modules\Traits\UploadManga;

class MangaController extends Controller
{
    use Parser;
    use UploadManga;


    /**************************************************************************************************
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * Pages
     *************************************************************************************************/

    public function addPage()
    {
        return view('manga.add', ['tags' => Tag::all()]);
    }

    public function showSinglePage(Manga $manga)
    {
        return view('manga.single', ['object' => $manga]);
    }

    /*************************************************************************************************
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Functions
     *************************************************************************************************/

    public function addManga(Request $request)
    {
        UploadManga::upload($request);

        return redirect()->back()->with('success', 'Манга добавлена');
    }

    public function parsing(Request $request)
    {
        Parser::getContent($request);

        return redirect()->back()->with('success', 'Parsing success');
    }

    /**************************************************************************************************
     * @return \Illuminate\Http\JsonResponse
     *
     * API
     *************************************************************************************************/
    public function mangaAll()
    {
        $manga = Manga::find(1);
        $response = [
            'id' => $manga->id,
            'title' => $manga->title,
            'indexImg' => '/storage/'.$manga->pages->first()->file
        ];
        return response()->json($response);
    }
}
