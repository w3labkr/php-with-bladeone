@extends('layouts.default')

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
<link rel="stylesheet" href="/assets/css/sign/welcome.css" />
@endpush

@section('title', 'Welcome')
@section('description', 'description')
@section('keywords', 'keywords')

@section('primary')
<article class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Welcome</h1>

            <div class="entry-content">
                Hello, world!
            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</article><!-- .page -->
@endsection

@push('scripts')
<script src="/assets/js/sign/welcome.js"></script>
@endpush