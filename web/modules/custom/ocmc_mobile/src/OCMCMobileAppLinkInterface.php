<?php

namespace Drupal\ocmc_mobile;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface for defining OCMC mobile app link entities.
 */
interface OCMCMobileAppLinkInterface extends ConfigEntityInterface {

  /**
   * Returns text from the url field.
   *
   * @return
   *   A URL string.
   */
  public function getUrl();

}
