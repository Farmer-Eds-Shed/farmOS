<?php

/**
 * @file
 * Rector configuration for farmOS.
 */

declare(strict_types=1);

use DrupalFinder\DrupalFinderComposerRuntime;
use DrupalRector\Set\Drupal10SetList;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {

  // Check against the Drupal 10 set list.
  $rectorConfig->sets([
    Drupal10SetList::DRUPAL_10,
  ]);

  $drupalFinder = new DrupalFinderComposerRuntime();
  $drupalRoot = $drupalFinder->getDrupalRoot();
  $rectorConfig->autoloadPaths([
    $drupalRoot . '/core',
    $drupalRoot . '/modules',
    $drupalRoot . '/profiles',
    $drupalRoot . '/themes',
  ]);

  $rectorConfig->fileExtensions(['php', 'module', 'theme', 'install', 'profile', 'inc', 'engine']);
  $rectorConfig->importNames(TRUE, FALSE);
  $rectorConfig->importShortClasses(FALSE);
};
