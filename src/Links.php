<?php

namespace TeamZac\LaraPie;

use SimplePie;
use SimplePie_Item;

/**
  * @property-read string $base When created from a SimplePie feed only
  * @property-read string $permalink
  */
class Links extends Resource
{
    /**
     * @param SimplePie|SimplePie_Item $simplepie
     */
    public static function make($simplepie)
    {
        if ($simplepie instanceof SimplePie) {
            return static::fromFeed($simplepie);
        } else if ($simplepie instanceof SimplePie_Item) {
            return static::fromItem($simplepie);
        }
        return new static();
    }

    public function __construct(array $attributes) 
    {
        $this->attributes = $attributes;
    }

    /**
     * @param SimplePie
     */
    public static function fromFeed(SimplePie $simplepie)
    {
        return new static([
            'base' => $simplepie->get_base(),
            'permalink' => $simplepie->get_permalink(),
        ]);
    }

    /**
     * @param SimplePie_Item
     */
    public static function fromItem(SimplePie_Item $item)
    {
        return new static([
            'permalink' => $item->get_permalink(),
        ]);
    }
}
