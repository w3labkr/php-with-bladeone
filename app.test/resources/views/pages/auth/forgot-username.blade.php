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
{{-- <link rel="stylesheet" href="/assets/css/sign/style.css" /> --}}
@endpush

@section('title', 'Forgot your password?')
@section('description', '')
@section('keywords', '')

@section('primary')
<div class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Forgot your username?</h1>

            <p class="entry-summary">
                Enter your email below and we will message you with your username.
            </p>

            <div class="entry-content">
                <form method="post" action="forgot-password">
                    <fieldset>
                        <legend>Forgot username</legend>
                        <label>
                            <span>Email</span><br>
                            <input type="text" name="user[email]"  required/>
                        </label>
                        <br>
                        <button type="submit">Find my username</button>
                    </fieldset>
                </form>

                <br>

                ㆍ<a href="/register">Need an account?</a><br>
                ㆍ<a href="/forgot-password">Forgot your password?</a>
            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</div><!-- .page -->
@endsection

@push('scripts')
{{-- <script src="/assets/js/sign/script.js"></script> --}}
@endpush
