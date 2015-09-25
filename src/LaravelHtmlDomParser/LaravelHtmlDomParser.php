<?php namespace LaravelHtmlDomParser;
/**
 * LaravelHtmlDomParser.php
 *
 * @author      Jason Pascoe <jpascoe@growthexponent.com>
 * @date        01/10/14
 * @reference   https://github.com/paquettg/php-html-parser
 */

use PHPHtmlParser\Dom;
use GrowthExponent\LaravelHtmlDomParser\CurlProxy;

class LaravelHtmlDomParser extends Dom {

    /**
     * Use a curl interface implementation to attempt to load
     * the content from a url.
     *
     * @param string $url
     * @param array $option
     * @param CurlInterface $curl
     * @param array $proxy // server[0] and port[1]
     * @chainable
     */
    public function loadFromUrlByProxy($url, $options = [], CurlInterface $curl = null, $proxy = null)
    {
        //$proxy = "120.195.203.43:80";
        //$proxy = explode(':', $proxy);

        if (is_null($curl))
        {
            // use the default curl interface
            $curl = new CurlProxy;
        }
        $content = $curl->get($url, $proxy);

        return $this->loadStr($content, $options);
    }
}