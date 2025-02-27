<?php

use Rector\Config\RectorConfig;
use RectorLaravel\Set\LaravelLevelSetList;

return RectorConfig::configure()
    ->withAttributesSets(phpunit: true)
    ->withCache(__DIR__.'/storage/framework/cache/rector')
    ->withImportNames(removeUnusedImports: true)
    ->withPaths([__DIR__.'/app', __DIR__.'/tests'])
    ->withPreparedSets(deadCode: true, codeQuality: true)
    ->withRootFiles()
    ->withSets([LaravelLevelSetList::UP_TO_LARAVEL_110]);
