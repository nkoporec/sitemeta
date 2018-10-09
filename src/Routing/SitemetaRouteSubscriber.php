<?php

namespace Drupal\sitemeta\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class SitemetaRouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('entity.sitemeta.collection')) {
      $route->setDefault('_title', 'Sitemeta');
      $route->setDefault('_title_callback', '');
    }

    if ($route = $collection->get('entity.sitemeta.add_form')) {
      $route->setDefault('_title', 'Add sitemeta');
      $route->setDefault('_title_callback', '');
    }
  }

}
