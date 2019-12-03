<?php

namespace Tests\Feature;

use App\Http\Requests\CreateTask;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    // each
    use RefreshDatabase;

    /**
     * First run before each test.
     *
     */
    public function setUp(): void
    {
        parent::setUp();

        // create folder data befor exec test case.
        $this->seed('FoldersTableSeeder');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_due_date_should_be_date()
    {
        $response = $this->post('/folders/1/tasks/create', [
            'title' => 'Sample task',
            'due_date' => 123, // Invalid data
        ]);

        $response->assertSessionHasErrors([
            'due_date' => '期限日 には日付を入力してください。'
        ]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function test_due_date_should_not_be_past()
    {
        $response = $this->post('/folders/1/tasks/create', [
            'title' => 'Sample task',
            'due_date' => Carbon::yesterday()->format('Y/m/d'),
        ]);

        $response->assertSessionHasErrors([
            'due_date' => '期限日 には今日以降の日付を入力してください。',
        ]);
    }
}
