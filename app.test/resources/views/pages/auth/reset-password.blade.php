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

@section('title', 'Reset password')
@section('description', '')
@section('keywords', '')

@section('primary')
<div class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Reset password</h1>

            <p class="entry-summary">
                We have sent a password reset code by email to a***@g***. Enter it below to reset your password.
            </p>

            <div class="entry-content">
                <form method="post" action="reset-password">
                    <fieldset>
                        <legend>Reset password</legend>
                        <label>
                            <span>Code</span><br>
                            <input type="text" name="user[reset_password_code]" required />
                        </label>
                        <br>
                        <label>
                            <span>New password</span><br>
                            <input type="password" name="user[new_password]" required />
                        </label>
                        <br>
                        <label>
                            <span>Enter new password again</span><br>
                            <input type="password" name="user[confirm_new_password]" required />
                        </label>
                        <br>
                        <button type="submit">Change password</button>
                    </fieldset>
                </form>

                <br>

                ㆍ<a href="/login">Already have an account?</a><br>
            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</div><!-- .page -->
@endsection

@push('scripts')
{{-- <script src="/assets/js/sign/script.js"></script> --}}
@endpush
