{{--
  Template Name: Blocks: Container (wp blocks)
--}}

@extends('layouts.app-container-wp-blocks')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
