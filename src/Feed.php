<?php

namespace TeamZac\LaraPie;

use SimplePie;
use Carbon\Carbon;

/**
  * @property-read string $title
  * @property-read string $type
  * @property-read TeamZac\LaraPie\Feed $feed
  */
class Feed extends Resource
{
    /** @var Illuminate\Support\Collection */
    protected $items;

    /**
     * @param SimplePie $simplepie
     */
    public function __construct(SimplePie $simplepie)
    {
        $this->setAttributes($simplepie)
            ->setItems($simplepie);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
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
