<?php
/**
 * Created by PhpStorm.
 * User: Эдуард
 * Date: 11.04.2019
 * Time: 18:49
 */

namespace App\Modules\Classes;

use Symfony\Component\DomCrawler\Crawler;

class Parser
{
    public static function getContent($link)
    {

        $html = new Crawler(null, $link);
    }
}