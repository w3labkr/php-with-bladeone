@if($breadcrumb)
<div id="breadcrumb" class="site-breadcrumb">
    <div class="container">
        @section('breadcrumb')
        <ol>
            <li>1</li>
            <li>2</li>
            <li>3</li>
        </ol>
        @endsection
        @yield('breadcrumb')
    </div>
</div>
@endif
