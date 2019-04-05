<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Medias;
use App\Modules\Traits\UploadManga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MangaController extends Controller
{
    use UploadManga;

    public function addPage()
    {
        return view('manga.add');
    }

    public function addManga(Request $request)
    {
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

        return redirect()->back()->with('success', 'Манга добавлена');
    }
}
