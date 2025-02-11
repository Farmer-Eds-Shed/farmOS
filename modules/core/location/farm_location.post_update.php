<?php

/**
 * @file
 * Post update hooks for the farm_location module.
 */

declare(strict_types=1);

use Drupal\system\Entity\Action;

/**
 * Uninstall system.action.asset_move_action.
 */
function farm_location_post_update_uninstall_asset_move_action(&$sandbox) {
  $config = Action::load('asset_move_action');
  if (!empty($config)) {
    $config->delete();
  }
}
