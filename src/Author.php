<?php

namespace TeamZac\LaraPie;

class Author extends Resource
{
    public static function collection($authors)
    {
        return collect($authors)->map(function($author) {
            return new static($author);
        });
    }

    public function __construct($simplepie)
    {
        $this->setAttributes($simplepie);
    }

    protected function setAttributes($simplepie)
    {
        $this->attributes = [
            'name' => $simplepie->get_name(),
            'email' => $simplepie->get_email(),
            'link' => $simplepie->get_link(),
        ];

        return $this;
    }
}
