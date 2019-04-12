<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Medias;
use App\Models\Site;
use App\Models\Tag;
use App\Models\Taggable;
use Illuminate\Http\Request;
use App\Modules\Traits\Parser;
use App\Modules\Traits\UploadManga;
use Illuminate\Support\Facades\Storage;

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
        return view('manga.add', [
            'title' => 'Add new Manga',
            'tags' => Tag::all()
        ]);
    }

    public function singlePage(Manga $manga)
    {
        return view('manga.single', [
            'title' => 'Manga | '.$manga->title,
            'object' => $manga
        ]);
    }

    public function parsingPage()
    {
        return view('manga.parsing', [
            'title' => 'Parsing Manga',
            'sites' => Site::all(),
            'tags' => Tag::all()
        ]);
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

    public function remove(Request $request)
    {
        if ($request->input('manga_id'))
        {
            $manga = Manga::find($request->input('manga_id'));
            $dir = explode('/', $manga->pages->first()->file);

            Taggable::where('taggable_id', $manga->id)->where('taggable_type', Manga::class)->delete();

            Storage::disk('public')->deleteDirectory('/manga/'.$dir[2]);

            Medias::where('model_id', $manga->id)->delete();

            $manga->delete();

            return redirect()->route('index')->with('success', 'Delete Success');
        }

        return redirect()->back();
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
