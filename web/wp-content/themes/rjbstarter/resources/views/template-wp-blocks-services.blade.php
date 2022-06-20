{{--
  Template Name: Service: Container Narrow (wp blocks)
--}}

@extends('layouts.app-container-narrow-wp-blocks')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
