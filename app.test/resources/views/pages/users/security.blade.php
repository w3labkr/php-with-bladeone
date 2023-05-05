@extends('layouts.sidebar-content', [
    'header' => true,
    'branding' => true,
    'navigation' => true,
    'hero' => true,
    'breadcrumb' => false,
    'footer' => true,
    'copyright' => true,
])

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
{{-- <link rel="stylesheet" href="/assets/css/style.css" /> --}}
@endpush

@section('title', 'Security')
@section('description', '')
@section('keywords', '')

@section('primary')
<div class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">Security</h1>

            <div class="entry-content">

                <form method="post" action="security">
                    <fieldset>
                        <legend>Change password</legend>
                        <label>
                            <span>Old password</span><br>
                            <input type="password" name="user[password]" required />
                        </label>
                        <br>

                        <label>
                            <span>New password</span><br>
                            <input type="password" name="user[new_password]" required />
                        </label>
                        <br>

                        <label>
                            <span>Confirm new password</span><br>
                            <input type="password" name="user[confirm_new_password]" required />
                        </label>
                        <br>

                        <button type="submit">Update password</button>
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
