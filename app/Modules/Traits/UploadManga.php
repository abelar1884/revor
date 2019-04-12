<?php
/**
 * Created by PhpStorm.
 * User: Эдуард
 * Date: 04.04.2019
 * Time: 15:07
 */

namespace App\Modules\Traits;

use Illuminate\Http\Request;
use App\Models\Medias;
use App\Models\Taggable;
use App\Models\Manga;


trait UploadManga
{
    public static function upload(Request $request)
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

        $number_page = 1;

        foreach ($request->file('files') as $file)
        {
            Medias::create([
                'title' => $file->getClientOriginalName(),
                'file' => $file->storeAs('manga/'.$request->input('name'), 'page_'.$number_page.'.'.$file->extension(),'public'),
                'type' => 'manga_page',
                'model_id' => $manga->id,
                'page' => $number_page
            ]);

            $number_page++;
        }

        foreach ($request->input('tags') as $tag)
        {
            Taggable::create([
                'tag_id' => $tag,
                'taggable_id' => $manga->id,
                'taggable_type' => Manga::class
            ]);
        }
    }
}