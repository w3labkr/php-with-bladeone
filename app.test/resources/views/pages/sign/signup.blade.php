@extends('layouts.default')

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
<link rel="stylesheet" href="/assets/css/sign/signup.css" />
@endpush

@section('title', 'Signup')
@section('description', 'description')
@section('keywords', 'keywords')

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

                <form method="POST" action="signup">
                    <table>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email" value="<?php echo htmlentities($faker->unique()->safeEmail()); ?>" /></td>
                            <td><button type="button">Check</button></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" value="123456" /></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Confirm Password:</td>
                            <td><input type="password" value="" /></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="reset">Reset</button>
                                <button type="submit">Submit</button>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                Already have an account? <a href="signin">Sign in</a>
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
<script src="/assets/js/sign/signup.js"></script>
@endpush
