<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
</head>
<body>
<div class="container">
    @include('layout.navbar')
</div>
<?php
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelectorConverter;
$converter = new CssSelectorConverter();
//var_dump($converter->toXPath('div.item > h4 > a'));
$link = 'http://oreno-erohon.com/?p=163353';

$html = file_get_contents($link);

// Create new instance for parser.
$crawler = new Crawler(null, $link);
$crawler->addHtmlContent($html, 'UTF-8');

foreach($crawler->filter('.entry-content img') as $img)
{
    $contents = file_get_contents($img->getAttribute('src'));
    $name = substr($img->getAttribute('src'), strrpos($img->getAttribute('src'), '/') + 1);
    \Illuminate\Support\Facades\Storage::disk('public')->put($name, $contents);
}
?>
@foreach($crawler->filter('img') as $img)
    <img src="{{$img->getAttribute('src')}}">
@endforeach
</body>
</html>
