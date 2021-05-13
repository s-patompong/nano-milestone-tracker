<?php

use App\NanoMilestoneTracker\Crawler;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $crawler = new Crawler();

    $trackerData = $crawler->get();

    SEOMeta::setTitle("{$trackerData->version} - {$trackerData->percent}");
    SEOMeta::setDescription("NANO {$trackerData->version} is now {$trackerData->percent} completed.");

    OpenGraph::setDescription("NANO {$trackerData->version} is now {$trackerData->percent} completed.");
    OpenGraph::setTitle("{$trackerData->version}");
    OpenGraph::setUrl(url()->current());
    OpenGraph::addProperty('type', 'website');

    return view('tracker', [
        'trackerData' => $trackerData,
    ]);
});

Route::get('/refresh', function() {
    $crawler = new Crawler();

    return [
        'data' => $crawler->get(),
    ];
});
