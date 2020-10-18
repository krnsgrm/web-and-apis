<?php

class Photo
{
    private string $url;
    private int $likeCount;

    public function __construct(string $url, int $likeCount)
    {
        $this->url = $url;
        $this->likeCount = $likeCount;
    }

    public function getURL(): string
    {
        return $this->url;
    }

    public function getLikeCount(): int
    {
        return $this->likeCount;
    }

    public function like()
    {
        $this->likeCount++;
    }

    public function dislike()
    {
        $this->likeCount--;
    }
}