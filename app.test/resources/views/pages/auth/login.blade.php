@extends('layouts.default')

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
{{-- <link rel="stylesheet" href="/assets/css/style.css" /> --}}
@endpush

@section('title', 'Signin')
@section('description', '')
@section('keywords', '')

@section('primary')
<div class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Signin</h1>

            <div class="entry-content">
                <form method="post" action="login">
                    <table>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="user[username]" value="qjung" /></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="user[password]" value="123456" /></td>
                        </tr>
                        <tr>
                            <td><label><input type="checkbox" name="user[remember_me]" /> Remember Me</label></td>
                            <td><a href="forgot-password">Forgot your password?</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit">Login</button>
                            </td>
                        </tr>
                        @isset($errors)
                        <tr>
                            <td colspan="3">
                                @foreach ($errors as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </td>
                        </tr>
                        @endisset
                    </table>
                </form>

                Need an account? <a href="/register">Register</a>
            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</div><!-- .page -->
@endsection

@push('scripts')
{{-- <script src="/assets/js/script.js"></script> --}}
@endpush
