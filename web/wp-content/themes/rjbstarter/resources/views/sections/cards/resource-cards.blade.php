@php
  $columns = get_field('section_columns') ?: array();
  $display = get_field('section_display') ?: '';
  $count   = count( $columns ) ?: 0;
  $hl_size = get_field('headline_size') ?: '';

  //$wrapper = !empty($display) ? '-' . $display : '';
  //$wrapper = $count < 1 ? '-empty' : $wrapper;
@endphp

@extends('sections.wrapper-resource-cards')

@section('resource_cards')
    <!-- start: cards column content -->
    @includeIf('partials.col.card-resource', array('context' => array('cards'), 'args' => array('headline' => array('tag' => 'h3'))))
    <!-- end: cards column content -->
@endsection
