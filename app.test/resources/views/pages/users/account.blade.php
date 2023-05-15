@extends('layouts.users', [
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
{{-- <link rel="stylesheet" href="/assets/css/style.css" /> --}}
@endpush

@section('title', 'Account')
@section('description', '')
@section('keywords', '')

@section('primary')
<div class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Account</h1>

            <div class="entry-content">

                <form method="post" action="account">
                    <input type="hidden" name="account[_token]" value="{{ $csrf_token }}" />
                    <fieldset>
                        <legend>Change username</legend>
                        <label>
                            <span>Username</span><br>
                            <input type="text" name="account[username]" value="{{ $user['username'] }}" required />
                        </label>
                        <br>
                        <button type="submit">Change username</button>
                    </fieldset>
                </form>

                @isset($data['account'])
                <div>
                    @if($data['account']['status'] === 'success')
                        {{ $data['account']['message'] }}
                    @elseif($data['account']['status'] === 'fail')
                        @foreach ($data['account']['errors'] as $error)
                            {{ $error['message'] }}<br>
                        @endforeach
                    @endif
                </div>
                @endisset

                <br>

                <form method="post" action="withdrawal">
                    <input type="hidden" name="withdrawal[_token]" value="{{ $csrf_token }}" />
                    <fieldset>
                        <legend>Delete Account</legend>
                        <label>
                            <span>Your username</span><br>
                            <input type="text" name="withdrawal[username]" value="{{ $user['username'] }}" required />
                        </label>
                        <br>
                        <label>
                            <span>To verify, type <i>delete my account</i> below</span><br>
                            <input type="text" name="withdrawal[verify]" required />
                        </label>
                        <br>
                        <label>
                            <span>Confirm your password</span><br>
                            <input type="password" name="withdrawal[password]" required />
                        </label>
                        <br>
                        <button type="submit">Delete your account</button>
                    </fieldset>
                </form>

                @isset($data['withdrawal'])
                <div>
                    @if($data['withdrawal']['status'] === 'success')
                        {{ $data['withdrawal']['message'] }}
                    @elseif($data['withdrawal']['status'] === 'fail')
                        @foreach ($data['withdrawal']['errors'] as $error)
                            {{ $error['message'] }}<br>
                        @endforeach
                    @endif
                </div>
                @endisset

            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</div><!-- .page -->
@endsection

@push('scripts')
{{-- <script src="/assets/js/script.js"></script> --}}
@endpush
