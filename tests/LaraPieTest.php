<?php

namespace TeamZac\LaraPie\Tests;

use Carbon\Carbon;
use TeamZac\LaraPie\Feed;
use TeamZac\LaraPie\Item;
use TeamZac\LaraPie\LaraPie;
use TeamZac\LaraPie\Exceptions\ParsingFailedException;

class LaraPieTest extends TestCase
{
    /** @test */
    function it_reads_and_parses_a_feed()
    {
        $feed = LaraPie::file(__DIR__.'/sample-feed.xml')->get();

        $this->assertInstanceOf(Feed::class, $feed);
        $this->assertCount(25, $feed->items());
        $feed->items()->each(function($item) {
            $this->assertInstanceOf(Item::class, $item);
        });

        tap($feed->items()->first(), function($item) {
            $this->assertEquals("Watch Tesla's record-breaking Laguna Seca lap", $item->title);
            $this->assertEquals('https://www.engadget.com/2019/09/11/model-s-plaid-laguna-seca/', $item->links->permalink);
            $this->assertTrue(Carbon::parse('12 September 2019, 1:58 am')->eq($item->dates->date));
            $this->assertCount(14, $item->categories);
        });
    }

    /** @test */
    function it_fetches_a_remote_feed()
    {
        try {
            $feed = LaraPie::feed('https://www.engadget.com/rss.xml')->get();
        } catch (\Exception $e) {
            $this->fail('It failed to parse a remote feed');
            return;
        }

        $this->assertInstanceOf(Feed::class, $feed);
    }

    /** @test */
    function it_throws_an_exception_if_the_feed_could_not_be_parsed()
    {
        try {
            $feed = LaraPie::feed('https://www.no-feed-exists.blah/feed.xml')->get();
        } catch (ParsingFailedException $e) {
            $this->assertNotNull($e->getSolution());
            return;
        }
        
        $this->fail('An exception should have been thrown due to a failed parsing attempt');
    }
}
