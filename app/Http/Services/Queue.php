<?php

namespace App\Http\Services;

class Queue
{
    private $data = [];

    public function enqueue($value)
    {
        $this->data[] = $value;
    }

    public function dequeue()
    {
        return array_shift($this->data);
    }

    public function length()
    {
        return count($this->data);
    }
}
