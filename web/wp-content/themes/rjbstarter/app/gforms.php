<?php

namespace App;

/*
add_action( 'gform_after_submission', function( $entry, $form ) {
  //getting post
  $post = get_post( $entry['post_id'] );

  //changing post content
  $post->post_content = 'Blender Version:' . rgar( $entry, '7' ) . "<br/> <img src='" . rgar( $entry, '8' ) . "'> <br/> <br/> " . rgar( $entry, '13' ) . " <br/> <img src='" . rgar( $entry, '5' ) . "'>";

  //updating post
  wp_update_post( $post );
}, 10, 2 );
*/


/**
 * Gravity Forms Bootstrap Styles
 *
 * Applies bootstrap classes to various common field types.
 * Requires Bootstrap to be in use by the theme.
 *
 * Using this function allows use of Gravity Forms default CSS
 * in conjuction with Bootstrap (benefit for fields types such as Address).
 *
 * @see  gform_field_content
 * @link http://www.gravityhelp.com/documentation/page/Gform_field_content4
 *
 * @return string Modified field content
 */
 // https://gist.github.com/brianpurkiss/60767704bd61149f17a4363dae641818
 add_filter("gform_field_content", function($content, $field, $value, $lead_id, $form_id){

  // Currently only applies to most common field types, but could be expanded.

  if($field["type"] != 'hidden' && $field["type"] != 'list' && $field["type"] != 'multiselect' && $field["type"] != 'checkbox' && $field["type"] != 'fileupload' && $field["type"] != 'date' && $field["type"] != 'html' && $field["type"] != 'address') {
    $content = str_replace('class=\'medium', 'class=\'form-control medium', $content);
  }

  if($field["type"] == 'name' || $field["type"] == 'address') {
    $content = str_replace('<input ', '<input class=\'form-control\' ', $content);
  }

  if($field["type"] == 'textarea') {
    $content = str_replace('class=\'textarea', 'class=\'form-control textarea', $content);
  }

  if($field["type"] == 'checkbox') {
    $content = str_replace('li class=\'', 'li class=\'form-check ', $content);
    $content = str_replace('<input ', '<input style=\'margin-top:-2px\' ', $content);
    $content = str_replace('<label ', '<label class=\'form-check-label\' ', $content);
  }

  if($field["type"] == 'radio') {
    $content = str_replace('li class=\'', 'li class=\'radio ', $content);
    $content = str_replace('<input ', '<input style=\'margin-left:1px;\' ', $content);
  }

  return $content;

}, 10, 5);


add_filter("gform_submit_button", function($button, $form) {

  $btn_icon = "<i class='fal fa-arrow-right'></i>";
  switch($form['id']) {
    case "1":
      $btn_icon = "";
  }

  $btn_type = isset($form['button']['type']) ? $form['button']['type'] : '';
  // Return the original button if the button type selected is not of type 'text'.
  if( 'text' != $btn_type )
    return $button;

  $btn_text = isset($form['button']['text']) && ! empty( $form['button']['text'] ) ? $form['button']['text'] : 'Submit';

  return "<button class='button btn btn-primary' id='gform_submit_button_{$form["id"]}'><span>".$btn_text."</span>" . $btn_icon . "</button>";
}, 10, 2);


// Changes Gravity Forms Ajax Spinner (next, back, submit) to a transparent image
// this allows you to target the css and create a pure css spinner like the one used below in the style.css file of this gist.
add_filter( 'gform_ajax_spinner_url', function( $image_src, $form ) {
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
}, 10, 2);
