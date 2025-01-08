<?php

namespace Tests\Feature;

use App\Models\Letter;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LettersControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\DatabaseSeeder::class);
    }

public function testLinkLetterAndNumber(): void
{
    $number = "33453450";
    $response = $this->get(route('apilink', ['id' => $number]));

    $mod = (int)$number % 23;
    $expectedLetter = Letter::find($mod + 1)->letters;

    $response->assertStatus(200);
}

    public function testLinkLetterAndNumberWithInvalidNumber(): void
    {
        $number = "123";
        $response = $this->get(route('apilink', ['id' => $number]));

        $response->assertStatus(200);
        $response->assertSeeText("Valid number needs to be 8 digits");
    }
}
