<?php
namespace Http\Services\Queue;

class Queue {
    private list = [];

    public function enqueue($value)
    {
        $this->list[] = $value;
    }

    public function dequeue()
    {
        return array_shift($this->list);
    }

    public function length()
    {
        return count($this->list);
    }
}
