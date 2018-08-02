<?php

class Task {
    public $description;

    public $completed;

    /**
     * Cheks if task is completed
     * @return mixed
     */
    public function isCompleted()
    {
        return $this->completed;
    }

    /**
     * Complete the task
     */
    public function complete() {
        $this->completed = true;
    }

    //TODO: Create a method for save

}