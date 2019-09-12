<?php

namespace TeamZac\LaraPie;

use Carbon\Carbon;

class Feed extends Resource
{
    protected $attributes = [];

    protected $items;

    public function __construct($simplepie)
    {
        $this->setAttributes($simplepie)
            ->setItems($simplepie);
    }

    public function items()
    {
        return $this->items;
    }

    protected function setAttributes($simplepie)
    {
        $this->attributes = [
            'title' => $simplepie->get_title(),
            'type' => $simplepie->get_type(),
            'links' => Links::make($simplepie),
        ];

        return $this;
    }

    protected function setItems($simplepie)
    {
        $this->items = collect($simplepie->get_items())->filter(function($item) {
            return $item->get_date();
        })->sortByDesc(function($item) {
            return new Carbon($item->get_date());
        })->map(function($item) {
            return new Item($item);
        })->values();

        return $this;
    }
}
