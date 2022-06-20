{{--
  Template Name: Blocks: Full Width
--}}

@extends('layouts.app-full-width')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
