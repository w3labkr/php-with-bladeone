@include('inc.header', ['title' => 'OpenAPI'])

<h1>OpenAPI</h1>

state: {{ $state }}
message: {{ $message }}

data:
<?php foreach ($data as $database): ?>
    | <?= $database[0]; ?>
<?php endforeach; ?>

@include('inc.footer')