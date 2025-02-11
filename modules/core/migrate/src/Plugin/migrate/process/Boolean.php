<?php

declare(strict_types=1);

namespace Drupal\farm_migrate\Plugin\migrate\process;

use Drupal\migrate\Attribute\MigrateProcess;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * This plugin converts values to a boolean.
 *
 * @codingStandardsIgnoreStart
 *
 * Example usage:
 * @code
 * destination:
 *   plugin: 'entity:log'
 * process:
 *   is_movement:
 *     plugin: boolean
 *     source: is_movement
 * @endcode
 * @codingStandardsIgnoreEnd
 */
#[MigrateProcess(
  id: 'boolean',
)]
class Boolean extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {

    // If the value is NULL or an empty string, return NULL so that the field's
    // default value will be used.
    if (is_null($value) || trim($value) === '') {
      return NULL;
    }

    // Use PHP's filter_var() with FILTER_VALIDATE_BOOLEAN constant.
    return filter_var($value, FILTER_VALIDATE_BOOLEAN);
  }

}
