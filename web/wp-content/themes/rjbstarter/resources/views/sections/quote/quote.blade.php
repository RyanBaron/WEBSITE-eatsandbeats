@php
  $display = get_field('section_display') ?: '';
  $hl_size = get_field('headline_size') ?: '';

  $col_class       = get_field('col_class') ?: array('col-11', 'col-md-10', 'col-xl-8');
  $class           = array_unique($col_class);
  $context         = isset($context) && ! empty($context) ? $context : array();
  $context_col     = array_merge($context, array('quote'));
@endphp

@extends('sections.wrapper-quote')

@section('quote_cols')
  <div class="{!! App::context_class('col', $context_col) !!} {!! App::sanatize_attrs($class) !!}">
    <div class="{!! App::context_class('col-inside', $context_col) !!} w-100">
      @includeIf('sections.partial.quote-item', array('context' => array('quote'), 'args' => array('headline' => array('size' => $hl_size))))
    </div>
  </div>
@endsection
