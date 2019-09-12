<?php

namespace TeamZac\LaraPie;

use SimplePie_Item;

class Author extends Resource
{
    public static function collection(?array $authors)
    {
        return collect($authors)->map(function($author) {
            return new static($author);
        });
    }

    public function __construct(SimplePie_Item $simplepie)
    {
        $this->setAttributes($simplepie);
    }

    protected function setAttributes(SimplePie_Item $simplepie)
    {
        $this->attributes = [
            'name' => $simplepie->get_name(),
            'email' => $simplepie->get_email(),
            'link' => $simplepie->get_link(),
        ];

        return $this;
    }
}
