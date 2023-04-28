@extends('layouts.default')

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
<link rel="stylesheet" href="/assets/css/admin/dashboard.css" />
@endpush

@section('title', 'Admin')
@section('description', 'description')
@section('keywords', 'keywords')

@section('primary')
<article class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Admin</h1>

            <div class="entry-content">
                Hello, world!
            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</article><!-- .page -->
@endsection

@push('scripts')
<script src="/assets/js/admin/dashboard.js"></script>
@endpush