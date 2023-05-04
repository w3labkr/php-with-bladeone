@extends('layouts.default')

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
{{-- <link rel="stylesheet" href="/assets/css/style.css" /> --}}
@endpush

@section('title', 'Signup')
@section('description', '')
@section('keywords', '')

@section('primary')
<div class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Signup</h1>

            <div class="entry-content">
                @php
                $faker = Faker\Factory::create('ko_KR');
                $faker->seed(1234);
                @endphp

                <form method="post" action="register">
                    <table>
                        <tr>
                            <td>Username</td>
                            <td>
                                <input type="text" name="user[username]" value="<?php echo htmlentities($faker->userName()); ?>" />
                                {{ $errors['username']['message'] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" name="user[email]" value="<?php echo htmlentities($faker->unique()->safeEmail()); ?>" />
                                {{ $errors['email']['message'] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="user[password]" value="123456" /></td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td><input type="password" value="123456" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="reset">Reset</button>
                                <button type="submit">Submit</button>
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

                Already have an account? <a href="/login">Login</a>
            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</div><!-- .page -->
@endsection

@push('scripts')
{{-- <script src="/assets/js/script.js"></script> --}}
@endpush
