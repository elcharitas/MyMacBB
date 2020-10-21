<?php
namespace App\Support\Twig\Extension;

use App\Support\BB;
use Twig\TwigFilter as Filter;
use Twig\TwigFunction as Method;
use App\Support\Twig\Loader\NanoLoader;
use App\Support\Twig\Util\TwigObject;
use Twig\Extension\AbstractExtension;
use App\Support\Twig\TokenParser\ReturnTokenParser;

class NanoCore extends AbstractExtension
{
    public function getFunctions(){
        return [
            new Method('ark', 'arr'),
            new Method('array', 'array'),
            new Method('csrf', 'csrf_field'),
            new Method('stop', 'die'),
            new Method('str', 'str'),
            new Method('trim', 'gtrim'),
            new Method('obj', array(TwigObject::class, 'create'))
        ];
    }
    
    public function getFilters(){
        return [
            new Filter('after', function ($text, $after){
                return str($text)->after($after);
            }),
            new Filter('before', function ($text, $before){
                return str($text)->before($before);
            }),
            new Filter('end', function ($text, $finish){
                return str($text)->finish($finish);
            }),
            new Filter('mime', 'bb_mime'),
            new Filter('start', function ($text, $start){
                return str($text)->start($start);
            }),
            new Filter('to_object', function($val, $depth=null){
                return new TwigObject(is_int($depth) ? json_decode($val, true, $depth): json_decode($val, true));
            }),
            new Filter('to_array', 'toArray'),
            new Filter('url', 'url')
        ];
    }
    
    public function getTokenParsers(){
        return [
            new ReturnTokenParser
        ];
    }
}