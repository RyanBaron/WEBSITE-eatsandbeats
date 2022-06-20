@php
  $sections = get_field('sections') ?: array();
  $display  = get_field('section_display') ?: '';
  //$context  = get_field('section_context') ?: 'section';
  $analytics_context  = get_field('analytics_context') ?: 'section';
  $wrapper  = ! empty($display) ? '-' . $display : '';
  $gated_disable_column = get_field('col_gated_disable_column') ?: false;
@endphp

@extends('sections.wrapper' . $wrapper)

@section('content_cols')

  @if (in_array('image-one', $sections ))
    <!-- start: image column content -->
    @includeIf('sections.cols.image-col', array('context' => array('image'), 'analytics_context' => $analytics_context, 'args' => array('multi_sec' => '_one')))
    <!-- end: image column content -->
  @endif

  @if (in_array('copy-one', $sections ))
    <!-- start: text column content -->
    @includeIf('sections.cols.copy-col', array('context' => array('copy'), 'analytics_context' => $analytics_context, 'args' => array('multi_sec' => '_one', 'headline' => array())))
    <!-- end: text column content -->
  @endif

  @if (in_array('cards', $sections ))
    <!-- start: cards column content -->
    @includeIf('sections.cols.cards-col', array('context' => array('cards'), 'analytics_context' => $analytics_context, 'args' => array()))
    <!-- end: cards column content -->
  @endif

  @if (in_array('accordion', $sections ))
    <!-- start: accordion column content -->
    @includeIf('sections.cols.accordion-col', array('context' => array('accordion'), 'analytics_context' => $analytics_context, 'args' => array()))
    <!-- end: accordion column content -->
  @endif

  @if (in_array('form', $sections ))
    <!-- start: form column content -->
    @includeIf('sections.cols.form-col', array('context' => array('form'), 'analytics_context' => $analytics_context, 'args' => array()))
    <!-- end: form column content -->
  @endif

  @if (in_array('gated', $sections ) && ! $gated_disable_column)
    <!-- start: gated column content -->
    @includeIf('sections.cols.gated-col', array('context' => array('gated'), 'analytics_context' => $analytics_context, 'args' => array()))
    <!-- end: gated column content -->
  @endif

@overwrite
