@extends('layouts.default')

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
                    <table>
                        <tr>
                            <td>Code</td>
                            <td><input type="text" name="user[reset_password_code]" /></td>
                        </tr>
                        <tr>
                            <td>New Password</td>
                            <td><input type="password" name="user[password]" /></td>
                        </tr>
                        <tr>
                            <td>Enter New Password Again</td>
                            <td><input type="password" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit">Change Password</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</div><!-- .page -->
@endsection

@push('scripts')
{{-- <script src="/assets/js/sign/script.js"></script> --}}
@endpush
