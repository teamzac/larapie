<?php

namespace TeamZac\LaraPie;

class Links extends Resource
{
    public static function make($simplepie)
    {
        if ($simplepie instanceof \SimplePie) {
            return static::fromFeed($simplepie);
        } else if ($simplepie instanceof \SimplePie_Item) {
            return static::fromItem($simplepie);
        }
        return new static();
    }

    public function __construct($links)
    {
        $this->attributes = $links;
    }

    public static function fromFeed($simplepie)
    {
        return new static([
            'base' => $simplepie->get_base(),
            'permalink' => $simplepie->get_permalink(),
        ]);
    }

    public static function fromItem($simplepie)
    {
        return new static([
            'permalink' => $simplepie->get_permalink(),
        ]);
    }
}
