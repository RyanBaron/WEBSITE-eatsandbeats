<?php
/**
 * Rewrite some path to deliver limited content with reduced/no tracking.
 */
add_action( 'parse_request', function ( $wp ) {
  if ( 'apex-optout' === $wp->request ) {
    //status_header( 200 );
    require_once 'legal/apex-optout.php';
    exit;
  }
} );

add_action( 'wp_footer', function () {
  $modal_html = '<div id="contact_modal" class="modal fade">';
  $modal_html .= '<div class="modal-dialog modal-lg" role="document">';
  $modal_html .= '<div class="modal-content">';
  $modal_html .= '<div class="modal-header">';
  $modal_html .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
  $modal_html .= '<span aria-hidden="true">&times;</span>';
  $modal_html .= '</button>';
  $modal_html .= '</div>';
  $modal_html .= '<div class="modal-body">';
  $modal_html .= '</div>';
  $modal_html .= '</div>';
  $modal_html .= '</div>';
  $modal_html .= '</div>';
  echo $modal_html;
}, 10 );
