<?php

namespace TeamZac\LaraPie\Exceptions;

use Facade\IgnitionContracts\Solution;
use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;

class ParsingFailedException extends \RuntimeException implements ProvidesSolution 
{
    /** @return \Facade\IgnitionContracts\Solution[] */
    public function getSolution(): Solution
    {
        return BaseSolution::create('Check the URL for your RSS feed')
            ->setSolutionDescription('SimplePie was unable to parse the URL you provided. You might want to double check that it is a valid RSS/Atom feed.')
            ->setDocumentationLinks([
                'SimplePie Docs' => 'http://simplepie.org/api/source-class-SimplePie.html#691',
            ]);
    }
}
