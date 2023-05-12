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

            <h1 class="entry-title">Forgot your password?</h1>

            <p class="entry-summary">
                Enter your username below and we'll email you a password reset code.
            </p>

            <div class="entry-content">
                <form method="post" action="forgot-password">
                    <input type="hidden" name="user[_token]" value="{{ csrf_token() }}" />
                    <fieldset>
                        <legend>Forgot password</legend>
                        <label>
                            <span>Username</span><br>
                            <input type="text" name="user[username]"  required/>
                        </label>
                        <br>
                        <button type="submit">Reset my password</button>
                    </fieldset>
                </form>

                @if(isset($data) && $data['status'] === 'fail')
                    <br>
                    <div>
                        @foreach ($data['errors'] as $error)
                            {{ $error['message'] }}<br>
                        @endforeach
                    </div>
                @endif

                <br>

                ㆍ<a href="/login">Already have an account?</a><br>
                ㆍ<a href="/forgot-username">Forgot your username?</a><br>

            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</div><!-- .page -->
@endsection

@push('scripts')
{{-- <script src="/assets/js/sign/script.js"></script> --}}
@endpush
