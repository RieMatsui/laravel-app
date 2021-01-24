<?php

namespace App\Http\Services;

class StackService
{

    private $stack = [];

    public function push($value)
    {
        $this->stask[] = $value;
    }

    public function pop()
    {
        return array_pop($this->stack);
    }

    public function length()
    {
        return count($this->stack);
    }
}
