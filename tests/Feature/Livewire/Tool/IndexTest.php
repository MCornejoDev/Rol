<?php

namespace Tests\Feature\Livewire\Tool;

use App\Livewire\Tool\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Index::class)
            ->assertStatus(200);
    }
}
