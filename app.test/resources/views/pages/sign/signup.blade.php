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
<article class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Signup</h1>

            <div class="entry-content">
                @php
                $faker = Faker\Factory::create();
                $faker->seed(1234);
                @endphp

                <form method="POST" action="/sign/signup">
                    <table>
                        <tr>
                            <td>Username:</td>
                            <td><input type="text" name="username" value="<?= htmlspecialchars($faker->name()); ?>" placeholder="Username" /></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email" value="<?= htmlspecialchars($faker->unique()->safeEmail()); ?>" placeholder="Email" /></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" value="<?= htmlspecialchars($faker->password(6,20)); ?>" placeholder="Password" /></td>
                        </tr>
                        <tr>
                            <td>Confirm Password:</td>
                            <td><input type="password" value="" placeholder="Confirm Password"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="reset">Reset</button>
                                <button type="submit">Submit</button>
                            </td>
                        </tr>
                    </table>
                </form>

                {{-- 
                @if (count($data) > 0)
                    {{ $data }}
                @else
                    Is empty.
                @endif
                --}}

            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</article><!-- .page -->
@endsection

@push('scripts')
<script src="/assets/js/sign/signup.js"></script>
@endpush