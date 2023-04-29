@extends('layouts.default')

@push('metas')
{{-- <meta /> --}}
@endpush

@push('styles')
<link rel="stylesheet" href="/assets/css/openapi/v1.css" />
@endpush

@section('title', 'OpenAPI')
@section('description', 'description')
@section('keywords', 'keywords')

@section('primary')
<article class="page hentry">
    <div class="container">
        <div class="wrap">

            <h1 class="entry-title">OpenAPI</h1>

            <div class="entry-content">
                State: {{ $state }}<br />
                Message: {{ $message }}<br />
                Data:<br />
                @if(count($data) > 1)
                    @foreach ($data as $d)
                        <?php echo $d[0]; ?>,
                    @endforeach
                @else
                    No data.
                @endif
            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .container -->
</article><!-- .page -->
@endsection

@push('scripts')
<script src="/assets/js/openapi/v1.js"></script>
@endpush