<?php

namespace TeamZac\LaraPie;

use SimplePie_Author;

class Author extends Resource
{
    public static function collection(?array $authors)
    {
        return collect($authors)->map(function($author) {
            return new static($author);
        });
    }

    public function __construct(SimplePie_Author $simplepie)
    {
        $this->setAttributes($simplepie);
    }

    protected function setAttributes(SimplePie_Author $simplepie)
    {
        $this->attributes = [
            'name' => $simplepie->get_name(),
            'email' => $simplepie->get_email(),
            'link' => $simplepie->get_link(),
        ];

        return $this;
    }
}
