<?php

namespace Drupal\ocmc_mobile\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\ocmc_mobile\OCMCMobileAppLinkInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Defines the OCMC Mobile App Link entity.
 *
 * @ConfigEntityType(
 *   id = "ocmc_mobile_app_link",
 *   label = @Translation("OCMC Mobile App Link"),
 *   handlers = {
 *     "list_builder" = "Drupal\ocmc_mobile\OCMCMobileAppLinkListBuilder",
 *     "form" = {
 *       "add" = "Drupal\ocmc_mobile\Form\OCMCMobileAppLinkForm",
 *       "edit" = "Drupal\ocmc_mobile\Form\OCMCMobileAppLinkForm",
 *       "delete" = "Drupal\ocmc_mobile\Form\OCMCMobileAppLinkDeleteForm"
 *     }
 *   },
 *   config_prefix = "ocmc_mobile_app_link",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/ocmc_mobile_app_link/{ocmc_mobile_app_link}",
 *     "edit-form" = "/admin/structure/ocmc_mobile_app_link/{ocmc_mobile_app_link}/edit",
 *     "delete-form" = "/admin/structure/ocmc_mobile_app_link/{ocmc_mobile_app_link}/delete",
 *     "collection" = "/admin/structure/ocmc_mobile_app_link"
 *   }
 * )
 */
class OCMCMobileAppLink extends ConfigEntityBase implements OCMCMobileAppLinkInterface {

  /**
   * The OCMC Mobile App Link ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The OCMC Mobile App Link label.
   *
   * @var string
   */
  protected $label;

  /**
   * The OCMC Mobile App Link URL.
   *
   * @var string
   */
  protected $url;

  /**
   * {@inheritdoc}
   */
  public function access($operation, AccountInterface $account = NULL, $return_as_object = FALSE) {
    switch ($operation) {
      case 'create':
        $result = $this->entityTypeManager()
          ->getAccessControlHandler($this->entityTypeId)
          ->createAccess($this->bundle(), $account, [], $return_as_object);
        break;

      case 'view':
        $result = AccessResult::allowedIfHasPermission($account ?: \Drupal::currentUser(), 'view ocmc mobile app links');
        $result = $return_as_object ? $result : $result->isAllowed();
        break;

      default:
        $result = $this->entityTypeManager()
          ->getAccessControlHandler($this->entityTypeId)
          ->access($this, $operation, $account, $return_as_object);
        break;
    }
    return $result;
  }

  /**
   * {@inheritdoc}
   */
  public function getUrl() {
    return isset($this->url) ? $this->url : NULL;
  }

}
