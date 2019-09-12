<?php

namespace TeamZac\LaraPie;

use Carbon\Carbon;
use SimplePie_Item;

/**
  * @property-read Carbon\Carbon $date
  * @property-read Carbon\Carbon $updated_at
  * @property-read Carbon\Carbon $local
  * @property-read array $gmt
  */
class Dates extends Resource
{
    public static function make(SimplePie_Item $item)
    {
        return new static([
            'date' => new Carbon($item->get_date()),
            'updated_at' => new Carbon($item->get_updated_date()),
            'local' => new Carbon($item->get_local_date()),
            'gmt' => [
                'date' => new Carbon($item->get_gmdate()),
                'updated_at' => new Carbon($item->get_updated_gmdate()),
            ],
        ]);
    }

    public function __construct(array $attributes) 
    {
        $this->attributes = $attributes;
    }
}
