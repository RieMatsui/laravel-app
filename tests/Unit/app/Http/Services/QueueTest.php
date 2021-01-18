<?php

namespace Tests\Unit\App\Http\Services;

use App\Http\Services\Queue;
use Tests\TestCase;

class QueueTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test()
    {
        $q = new Queue;
        $q->enqueue('Panda');
        $q->enqueue('Tiger');
        $q->enqueue('Bird');

        $this->assertEquals(3, $q->length());

        while ($q->length() > 0) {
            $e = $q->dequeue();
            echo "[$e]\n";
        }
        $this->assertEquals(0, $q->length());
    }
}
