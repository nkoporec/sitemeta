<?php

namespace Drupal\sitemeta;

use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Class SitemetaGenerator.
 */
class SitemetaGenerator {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new SitemetaGenerator object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * Returns sitemeta data for current page.
   *
   * @param string $path
   *   Internal path.
   * @param string $langcode
   *   Language of the page.
   *
   * @return object|false
   *   Returns Sitemeta entity if exists else false.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function getSiteMeta($path, $langcode) {
    $sitemeta = $this->entityTypeManager->getStorage('sitemeta')->loadByProperties(['path' => $path, 'langcode' => $langcode]);
    // There will always be one entry if there is multiple
    // something went terribly wrong.
    if ($sitemeta) {
      return end($sitemeta);
    }
    else {
      return FALSE;
    }
  }

}
