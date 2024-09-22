<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if a task can be created.
     *
     * @return void
     */
    public function test_task_can_be_created()
    {
        $task = Task::create([
            'title' => 'Test Task',
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'is_completed' => false, // default value
        ]);
    }

    /**
     * Test if a task can be updated.
     *
     * @return void
     */
    public function test_task_can_be_updated()
    {
        $task = Task::create([
            'title' => 'Original Task',
        ]);

        $task->update([
            'title' => 'Updated Task',
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Updated Task',
        ]);
    }

    /**
     * Test if a task can be marked as completed.
     *
     * @return void
     */
    public function test_task_can_be_marked_as_completed()
    {
        $task = Task::create([
            'title' => 'Test Task',
        ]);

        $task->update([
            'is_completed' => true,
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'is_completed' => true,
        ]);
    }

    /**
     * Test if a task can be deleted.
     *
     * @return void
     */
    public function test_task_can_be_deleted()
    {
        $task = Task::create([
            'title' => 'Task to be deleted',
        ]);

        $task->delete();

        $this->assertDatabaseMissing('tasks', [
            'title' => 'Task to be deleted',
        ]);
    }
}
