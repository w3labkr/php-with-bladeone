@extends('layouts.default')

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
<link rel="stylesheet" href="/assets/css/sign/signout.css" />
@endpush

@section('title', 'Signout')
@section('description', 'description')
@section('keywords', 'keywords')

@section('primary')
<div class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Signout</h1>

            <div class="entry-content">

                You have been logged out successfully

                Didn't mean to sign out? <a href="signin">Sign in again.</a>

            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</div><!-- .page -->
@endsection

@push('scripts')
<script src="/assets/js/sign/signout.js"></script>
@endpush
