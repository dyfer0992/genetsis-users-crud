<?php

namespace Tests\Feature;

use App\Domain\Users\User;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /** @test */
    public function get_all_users()
    {
        factory(User::class)->times(5)->create();

        $this->json('GET', '/api/v1/usuarios')
            ->assertStatus(200)
            ->assertJsonCount(5, 'data');
    }
}
