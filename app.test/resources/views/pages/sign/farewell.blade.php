@extends('layouts.default')

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
<link rel="stylesheet" href="/assets/css/sign/farewell.css" />
@endpush

@section('title', 'Farewell')
@section('description', 'description')
@section('keywords', 'keywords')

@section('primary')
<div class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Farewell</h1>

            <div class="entry-content">
                Hello, world!
            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</div><!-- .page -->
@endsection

@push('scripts')
<script src="/assets/js/sign/farewell.js"></script>
@endpush
