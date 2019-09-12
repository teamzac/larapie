<?php

namespace TeamZac\LaraPie;

use SimplePie;
use Illuminate\Support\Facades\Cache;

class FeedFactory
{
    protected $simplepie;

    protected $url;

    public function __construct(SimplePie $simplepie)
    {
        $simplepie->enable_cache(false);
        $this->simplepie = $simplepie;
    }

    public function feed($url)
    {
        $this->simplepie->set_feed_url($this->url = $url);
        return $this;
    }

    public function file($file) 
    {
        $this->simplepie->set_raw_data(file_get_contents($file));
        return $this;
    }

    public function get()
    {
        if (!$this->simplepie->init()) {
            throw new Exceptions\ParsingFailedException('Failed to parse ' . $this->url);
        }
        return new Feed($this->simplepie);
    }
}
