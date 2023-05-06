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

@section('title', 'Profile')
@section('description', '')
@section('keywords', '')

@section('primary')
<div class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Profile</h1>

            <div class="entry-content">

                <form method="post" action="profile">
                    <fieldset>
                        <legend>Public profile</legend>
                        <label>
                            <span>Name</span><br>
                            <input type="text" name="user[nickname]" value="{{ $user['nickname'] }}" />
                        </label>
                        <br>

                        <label>
                            <span>Public email</span><br>
                            <input type="email" name="user[email]" value="{{ $user['email'] }}" />
                        </label>
                        <br>

                        <button type="submit">Update profile</button>
                    </fieldset>
                </form>

                @isset($data)
                <div>
                    @if($data['status'] === 'success')
                        {{ $data['message'] }}
                    @elseif($data['status'] === 'fail')
                        @foreach ($data['errors'] as $error)
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
