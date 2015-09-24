<?php

namespace spec\GrowthExponent\LaravelHtmlDomParser;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LaravelHtmlDomParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('GrowthExponent\LaravelHtmlDomParser\LaravelHtmlDomParser');
    }
}
