<?php

namespace App\NanoMilestoneTracker;

use DOMDocument;
use PHPHtmlParser\Dom;

final class Crawler
{
    /**
     * @throws \PHPHtmlParser\Exceptions\ChildNotFoundException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \PHPHtmlParser\Exceptions\CircularException
     * @throws \PHPHtmlParser\Exceptions\ContentLengthException
     * @throws \PHPHtmlParser\Exceptions\StrictException
     * @throws \PHPHtmlParser\Exceptions\LogicalException
     * @throws \PHPHtmlParser\Exceptions\NotLoadedException
     */
    public function get(): TrackerData
    {
        $dom = new Dom;

        $dom->loadFromUrl(config('nano.milestone_url'));
        $versionDom = $dom->find(config('nano.version_dom_selector'));
        $percentDom = $dom->find(config('nano.percent_dom_selector'));

        $version = 'Unknown version';
        if ($versionDom->count() > 0) {
            $version = $versionDom[0]->text;
        }

        $percent = 'Unknown percent';
        if ($percentDom->count() > 0) {
            $percent = $percentDom[0]->text;
        }

        $trackerData = new TrackerData();
        $trackerData->version = $version;
        $trackerData->percent = $percent;

        return $trackerData;
    }
}
