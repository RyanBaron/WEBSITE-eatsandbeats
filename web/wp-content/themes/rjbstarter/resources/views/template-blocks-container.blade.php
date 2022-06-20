{{--
  Template Name: Blocks: Container
--}}

@extends('layouts.app-container')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
