<?php
/**
 * Rewrite website opt in/out paths to match callback path patterns for quantserve opt in/out.
 */
add_action( 'parse_request', function ( $wp ) {
  if (
    'opt-out/no-cookie' === $wp->request
    || 'status/1/1' === $wp->request
    || 'status/1/1-0' === $wp->request
  ) {
    //status_header( 200 );
    require_once 'opt-out/no-cookie.php';
    exit;
  }
  elseif ( 'opt-out/active-cookie' === $wp->request
    || 'status/1/2' === $wp->request
    || 'status/1/2-0' === $wp->request
  ) {
    require_once 'opt-out/active-cookie.php';
    exit;
  }
  elseif ( 'opt-out/opted-out' === $wp->request
    || 'status/1/3' === $wp->request
    || 'status/1/3-0' === $wp->request
  ) {
    require_once 'opt-out/opted-out.php';
    exit;
  }
  elseif ( 'opt-out/success' === $wp->request
    || 'finish/1/4/1' === $wp->request
    || 'finish/1/4/1-0' === $wp->request
  ) {
    require_once 'opt-out/success.php';
    exit;
  }
  elseif ( 'opt-out/failure' === $wp->request
    || 'finish/1/4/2' === $wp->request
    || 'finish/1/4/2-0' === $wp->request
  ) {
    require_once 'opt-out/failure.php';
    exit;
  }
} );
