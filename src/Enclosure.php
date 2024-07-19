<?php

namespace TeamZac\LaraPie;

class Enclosure extends Resource
{
    public static function collection($enclosures)
    {
        return collect($enclosures)->map(function($enclosure) {
            return $enclosure->get_link();
        });
    }
}
