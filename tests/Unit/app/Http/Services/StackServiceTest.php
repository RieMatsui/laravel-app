<?php

namespace Tests\Unit\App\Http\Services;

use App\Http\Services\StackService;
use Tests\TestCase;

class StackServiceTest extends TestCase
{

    public function testStack()
    {

        $stack = new StackService();
        $stack->push('Panda');
        $stack->push('Tiger');
        $stack->push('Bird');

        while ($value = $stack->pop()) {
            echo "[$value]\n";
        }
        $this->assertEquals(0, $stack->length());
    }
}
