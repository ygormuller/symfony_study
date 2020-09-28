<?php

namespace App\Api\Service;
use Symfony\Component\Routing\RouterInterface;

class PaginatorLinkFactory
{
  static public function mount(Pagerfanta $pagerFanta, $routeName, RouterInterface $router)
  {
    $links = [
      'self' => self::generateLink($routeName, [], $pagerFanta->getCurrentPage(), $router),
      'first' => self::generateLink($routeName, [], 1, $router),
      'last' => self::generateLink($routeName, [], $pagerFanta->getNbPages, $router),
    ];

    if($pagerFanta->hasPreviousPAge()) {
      $links['prev'] = self::generateLink($routeName, [], $pagerFanta->getPreviousPage(), $router);
    }

    if($pagerFanta->hasNextPage()) {
      $links['next'] = self::generateLink($routeName, [], $pagerFanta->getNextPage(), $router);
    }

    return $links;

  }

  static private function generateLink(string $routeName, array $routeParams = [], $page = 1, RouterInterface $router)
  {
    $fullLink = $router->generate($routeName, array_merge($routeParams, ['page' => $page]), RouterInterface::ABSOLUTE_URL);

    return $fullLink;
  }
}