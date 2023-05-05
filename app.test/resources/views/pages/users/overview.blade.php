@extends('layouts.sidebar-content', [
    'header' => true,
    'branding' => true,
    'navigation' => true,
    'hero' => true,
    'breadcrumb' => false,
    'footer' => true,
    'copyright' => true,
])

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
{{-- <link rel="stylesheet" href="/assets/css/style.css" /> --}}
@endpush

@section('title', 'Profile')
@section('description', '')
@section('keywords', '')

@section('primary')
<div class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Overview</h1>

            <div class="entry-content">
                Hello, {{ $user['username'] }} !!
            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</div><!-- .page -->
@endsection

@push('scripts')
{{-- <script src="/assets/js/script.js"></script> --}}
@endpush
