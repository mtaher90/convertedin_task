<?php

namespace Tests\Unit;

use App\Models\Admin;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    /**
     * create task test example.
     *
     * @return void
     */
    public function test_create_task()
    {
        $user = User::factory()->create();

        $admin = Admin::factory()->create();

        $task = Tasks::create([
            'assigned_by_id'        => $admin->id,
            'assigned_to_id'        => $user->id,
            'title'                 => 'Test Title',
            'description'           => 'Test Description',
        ]);

        $this->assertTrue(true);
    }
}
