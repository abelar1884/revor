<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Medias;
use App\Models\Tag;
use App\Models\Taggable;
use App\Modules\Traits\UploadManga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MangaController extends Controller
{
    use UploadManga;

    public function addPage()
    {
        return view('manga.add', ['tags' => Tag::all()]);
    }

    public function showSinglePage(Manga $manga)
    {
        return view('manga.single', ['object' => $manga]);
    }


    public function addManga(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'files' => 'required',
            'tags' => 'required'
        ]);

        $manga = Manga::create([
            'title' => $request->input('name'),
            'count_page' => count($request->file('files'))
        ]);

        foreach ($request->file('files') as $file)
        {
            Medias::create([
                'title' => $file->getClientOriginalName(),
                'file' => $file->store('manga/'.$request->input('name'), 'public'),
                'type' => 'manga_page',
                'model_id' => $manga->id
            ]);
        }

        foreach ($request->input('tags') as $tag)
        {
            Taggable::create([
                'tag_id' => $tag,
                'taggable_id' => $manga->id,
                'taggable_type' => Manga::class
            ]);
        }

        return redirect()->back()->with('success', 'Манга добавлена');
    }

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
