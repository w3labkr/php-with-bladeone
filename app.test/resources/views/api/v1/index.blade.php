@include('inc.header', ['title' => 'API'])

<h1>API</h1>

state: {{ $state }}
message: {{ $message }}

data:
<?php foreach ($data as $database): ?>
    | <?= $database[0]; ?>
<?php endforeach; ?>

@include('inc.footer')