<?php

class MessageStorage
{
    private array $messages;
    private $chat;

    public function __construct()
    {
        $this->chat = fopen('messageData.csv', 'rw+');
        $this->loadCSV();
    }

    public function dataToCsv(): void
    {
        foreach ($this->messages as $message) {
            fputcsv($this->chat, [$message->getId(), $message->getMessage()]);
        }
    }

    public function loadCSV(): void
    {
        while (!feof($this->chat)) {
            $messageData = (array)fgetcsv($this->chat);

            if (count($messageData) > 1) {
                $this->messages[] = new Message((string)$messageData[0], (int)$messageData[1]);
            }
        }
    }

    public function addMessage(Message $message): void
    {
        $this->messages[] = $message;
        $this->dataToCsv();
    }
}