<?php

namespace TeamZac\LaraPie;

use Carbon\Carbon;

class Dates extends Resource
{
    public static function make(\SimplePie_Item $simplepie)
    {
        return new static([
            'date' => new Carbon($simplepie->get_date()),
            'updated_at' => new Carbon($simplepie->get_updated_date()),
            'local' => new Carbon($simplepie->get_local_date()),
            'gmt' => [
                'date' => new Carbon($simplepie->get_gmdate()),
                'updated_at' => new Carbon($simplepie->get_updated_gmdate()),
            ],
        ]);
    }

    public function __construct($dates) 
    {
        $this->attributes = $dates;
    }
}
