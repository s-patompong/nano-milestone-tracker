<?php

return [
    // Milestone URL to craw
    'milestone_url' => env('MILESTONE_URL'),

    // Selector for version dom like V22.0
    'version_dom_selector' => env('VERSION_DOM_SELECTOR', "#repo-content-pjax-container > div:nth-child(1) > div > h2"),

    // Selector for percent like 96%
    'percent_dom_selector' => env('PERCENT_DOM_SELECTOR', '.progress-percent'),
];
