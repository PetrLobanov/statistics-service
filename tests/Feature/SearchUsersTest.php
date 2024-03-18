<?php

namespace Tests\Feature;

use Tests\TestCase;

class SearchUsersTest extends TestCase
{
    public function testValidationFail(): void
    {
        $url = route('search_users.index', [
            'name' => '1',
            'ageMin' => 0,
            'ageMax' => 150,
        ]);

        $response = $this->get($url , [
            'accept' => 'application/json',
        ]);

        $response->assertJsonValidationErrors(['name', 'ageMin', 'ageMax']);
    }

    public function testValidateOk(): void
    {
        $url = route('search_users.index', [
            'name' => fake()->name,
            'ageMin' => 1,
            'ageMax' => 99,
        ]);

        $response = $this->get($url , [
            'accept' => 'application/json',
        ]);

        $response->assertValid(['name', 'ageMin', 'ageMax']);
    }

    public function testSearchUsers(): void
    {
        $url = route('search_users.index');

        $response = $this->get($url , [
            'accept' => 'application/json',
        ]);

        $response->assertJsonStructure([
            'data' => [
                'count',
                'averageAge',
                'popularNamesAndCount',
            ]
        ]);
    }
}
