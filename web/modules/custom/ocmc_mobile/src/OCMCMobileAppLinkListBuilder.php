<?php

namespace Drupal\ocmc_mobile;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of OCMC mobile app link entities.
 */
class OCMCMobileAppLinkListBuilder extends ConfigEntityListBuilder {
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Link Label');
    $header['id'] = $this->t('Machine Name');
    $header['url'] = $this->t('Link URL');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['label'] = $entity->label();
    $row['id'] = $entity->id();
    $row['url'] = $entity->getUrl();
    return $row + parent::buildRow($entity);
  }

}
