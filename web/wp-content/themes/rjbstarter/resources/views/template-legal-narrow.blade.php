{{--
  Template Name: Blocks: Legal Sidebar (wp blocks)
--}}

@extends('layouts.app-container-legal-wp-blocks')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
