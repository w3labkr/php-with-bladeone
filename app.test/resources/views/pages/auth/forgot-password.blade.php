@extends('layouts.default')

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
                Enter your Username below and we will send a message to reset your password.
            </p>

            <div class="entry-content">
                <form method="post" action="forgot-password">
                    <table>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="user[username]" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit">Reset my password</button>
                            </td>
                        </tr>
                    </table>
                </form>

                Already have an account? <a href="/login">Login</a>
            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</div><!-- .page -->
@endsection

@push('scripts')
{{-- <script src="/assets/js/sign/script.js"></script> --}}
@endpush
