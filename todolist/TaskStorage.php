<?php

class TaskStorage
{
    private array $tasks = [];
    private $file;

    public function __construct()
    {
        $this->file = fopen('tasks.csv', 'w+');
        $this->loadTasks();
    }

    public function loadTasks(): void
    {
        while (!feof($this->file)) {
            $taskInfo = (array)fgetcsv($this->file);

            if (!empty($personData[0])) {
                $this->tasks[] = (string)$taskInfo[0];
            }
        }
        fputcsv($this->file, $this->tasks);
    }

    public function delete($num): void
    {
        if (isset($_POST['num'])) {
            unset($this->tasks[$num]);
        }
    }

    public function add($task): void
    {
        if (isset($_POST['add'])) {
            $this->tasks[] = $task;
        }
    }

    public function getTasks(): array
    {
        return $this->tasks = [];
    }
}