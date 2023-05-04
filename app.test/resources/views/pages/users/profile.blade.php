@extends('layouts.default')

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
{{-- <link rel="stylesheet" href="/assets/css/style.css" /> --}}
@endpush

@section('title', 'Home')
@section('description', '')
@section('keywords', '')

@section('primary')
<div class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Profile</h1>

            <div class="entry-content">
                Hello, {{ $user['username'] }} !
                <br><br>

                <form method="post" action="profile">
                    <table>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="email" name="user[email]" value="{{ $user['email'] }}" />
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type="password" name="user[password]" />
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td><input type="password" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="reset">Reset</button>
                                <button type="submit">Save</button>
                            </td>
                        </tr>
                        @isset($errors)
                        <tr>
                            <td colspan="2">
                                @foreach ($errors as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </td>
                        </tr>
                        @endisset
                    </table>
                </form>

                <a href="javascript:window.history.back();">Back</a>

            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</div><!-- .page -->
@endsection

@push('scripts')
{{-- <script src="/assets/js/script.js"></script> --}}
@endpush
