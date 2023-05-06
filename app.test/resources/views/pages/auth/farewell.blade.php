@extends('layouts.default', [
    'branding' => true,
    'navigation' => true,
    'hero' => true,
    'breadcrumb' => false,
    'copyright' => true,
])

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
{{-- <link rel="stylesheet" href="/assets/css/style.css" /> --}}
@endpush

@section('title', 'Farewell')
@section('description', '')
@section('keywords', '')

@section('primary')
<div class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Farewell</h1>

            <div class="entry-content">
                <p>
                    Your are one of the best people.<br>
                    I will never forget you!<br>
                    Until we meet again!
                </p>

                <a href="/">Home</a>

            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</div><!-- .page -->
@endsection

@push('scripts')
{{-- <script src="/assets/js/script.js"></script> --}}
@endpush
