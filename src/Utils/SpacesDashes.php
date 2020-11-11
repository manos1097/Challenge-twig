<?php


namespace App\Utils;
use App\Interfaces\ITransform;

class SpacesDashes implements ITransform
{
    public function transform(string $str) {
        return str_replace(" ", "-", $str);
    }
}