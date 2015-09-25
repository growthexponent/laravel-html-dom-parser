<?php namespace LaravelHtmlDomParser;
/**
 * CurlProxy.php
 *
 * @author      Jason Pascoe <jpascoe@growthexponent.com>
 * @date        01/10/14
 * @reference   https://github.com/paquettg/php-html-parser
 */

use PHPHtmlParser\Curl;

class CurlProxy extends Curl {

    /**
     * A simple curl implementation to get the content of the url via a proxy server.
     *
     * @param string $url
     * @param array $proxy // server[0] and port[1]
     * @return string
     * @throws CurlException
     */
    public function get($url, $proxy = null)
    {
        $referer = "http://example.com/";
        $agent = "My PHP Script";

        $aHTTP['http']['proxy']           = 'tcp://'.$proxy[0].':'.$proxy[1]; // The proxy ip and port number
        $aHTTP['http']['request_fulluri'] = true; // use the full URI in the Request. I.e. http://brugbart.com/Examples/ip.php
        $aHTTP['http']['method']          = 'GET';
        $aHTTP['http']['header']          = "User-Agent: ".$agent."\r\n";
        $aHTTP['http']['header']         .= "Referer: ".$referer."\r\n";

        $context = stream_context_create($aHTTP);
        $content = file_get_contents($url, false, $context);

        /*
         * // Couldn't get working using Curl in the short timeframe I had, may come back to it later
         *
        $ch = curl_init($url);
        if ($proxy != null) {
            curl_setopt($ch, CURLOPT_PROXY, $proxy[0]);
            curl_setopt($ch, CURLOPT_PROXYPORT, $proxy[1]);
        }
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        $content = curl_exec($ch);
        */
        if ($content === false)
        {
            // there was a problem
            //$error = curl_error($ch);
            //throw new CurlException('Error retrieving "'.$url.'" ('.$error.')');
            throw new CurlException('Error retrieving "'.$url.'"');
        }

        return $content;
    }
}