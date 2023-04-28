@extends('layouts.default')

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
<link rel="stylesheet" href="/assets/css/main.css" />
@endpush

@section('title', 'Home')
@section('description', 'description')
@section('keywords', 'keywords')

@section('primary')
<article class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Home</h1>

            <div class="entry-content">
                Hello, world!
            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</article><!-- .page -->
@endsection

@push('scripts')
<script src="/assets/js/main.js"></script>
@endpush