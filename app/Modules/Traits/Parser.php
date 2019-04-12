<?php

namespace App\Modules\Traits;

use App\Models\Manga;
use App\Models\Medias;
use App\Models\Taggable;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelectorConverter;
use Illuminate\Support\Facades\Storage;

trait Parser
{
    public static function getContent(Request $request)
    {
        $html = file_get_contents($request->input('link'));
        $crawler = new Crawler(null, $request->input('link'));
        $crawler->addHtmlContent($html, 'UTF-8');

        $manga = Manga::create([
            'title' => $request->input('name'),
            'count_page' => count($crawler->filter($request->input('site')))
        ]);

        $number_page = 1;
        $path = '/manga/manga_'.date('U');

        foreach($crawler->filter($request->input('site')) as $img)
        {
            $contents = file_get_contents($img->getAttribute('src'));
            $name = substr($img->getAttribute('src'), strrpos($img->getAttribute('src'), '/') + 1);
            $fileInfo = pathinfo($img->getAttribute('src'));
            Storage::disk('public')->put($path.'/page_'.$number_page.'.'.$fileInfo['extension'], $contents);

            Medias::create([
                'title' => $name,
                'file' => $path.'/page_'.$number_page.'.'.$fileInfo['extension'],
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