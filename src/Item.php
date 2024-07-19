<?php

namespace TeamZac\LaraPie;

use SimplePie_Item;
use WeakReference;

/**
  * @property-read string $id
  * @property-read string $title
  * @property-read string $description
  * @property-read string $content
  * @property-read Illuminate\Support\Collection $categories
  * @property-read Illuminate\Support\Collection $authors
  * @property-read TeamZac\LaraPie\Dates $dates
  * @property-read TeamZac\LaraPie\Links $links
  */
class Item extends Resource
{
    protected WeakReference $simplepie;

    public function __construct(SimplePie_Item $simplepie)
    {
        $this->setAttributes($simplepie);
        $this->simplepie = WeakReference::create($simplepie);
    }

    public function getOriginal()
    {
        return $this->simplepie->get();
    }

    protected function setAttributes($simplepie)
    {
        $this->attributes = [
            'id' => $simplepie->get_id(),
            'title' => $simplepie->get_title(),
            'description' => $simplepie->get_description(),
            'content' => $simplepie->get_content(),
            'categories' => Category::collection($simplepie->get_categories()),
            'authors' => Author::collection($simplepie->get_authors()),
            'enclosures' => Enclosure::collection($simplepie->get_enclosures()),
            'dates' => Dates::make($simplepie),
            'links' => Links::make($simplepie),
        ];

        return $this;
    }
}