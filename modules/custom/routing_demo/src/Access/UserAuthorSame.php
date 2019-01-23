<?php

namespace Drupal\routing_demo\Access;

use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\user\UserInterface;
use Drupal\node\NodeInterface;


class UserAuthorSame implements AccessInterface {
  public function access(NodeInterface $node, AccountInterface $account) {
    return AccessResult::allowedIf($node->getOwnerId() === $account->id());
  }
}