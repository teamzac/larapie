<?php

namespace TeamZac\LaraPie;

class Item extends Resource
{
    public function __construct($simplepie)
    {
        $this->setAttributes($simplepie);
    }

    protected function setAttributes($simplepie)
    {
        $this->attributes = [
            'id' => $simplepie->get_id(),
            'title' => $simplepie->get_title(),
            'description' => $simplepie->get_description(),
            // 'content' => $simplepie->get_content(),
            'categories' => Category::collection($simplepie->get_categories()),
            'authors' => Author::collection($simplepie->get_authors()),
            'dates' => Dates::make($simplepie),
            'links' => Links::make($simplepie),
        ];

        return $this;
    }
}