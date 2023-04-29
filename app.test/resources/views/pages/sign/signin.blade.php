@extends('layouts.default')

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
<link rel="stylesheet" href="/assets/css/sign/signin.css" />
@endpush

@section('title', 'Signin')
@section('description', 'description')
@section('keywords', 'keywords')

@section('primary')
<div class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Signin</h1>

            <div class="entry-content">
                <form method="POST" action="signin">
                    <table>
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" name="username" /></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" /></td>
                        </tr>
                        <tr>
                            <td><label><input type="checkbox" /> Remember Me</label></td>
                            <td><a href="forgot-password">Forgot your password?</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit">Sign in</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Need an account? <a href="signup">Sign up</a>
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
<script src="/assets/js/sign/signin.js"></script>
@endpush
