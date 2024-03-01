<?php

use function Pest\Laravel\{actingAs, get, post, delete};

test('example', function () {
    $response = get('/');

    $response->assertStatus(200);
});