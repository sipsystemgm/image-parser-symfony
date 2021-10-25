<?php

namespace App\Message;

final class ParserQueueMessage
{
    private string $url;
    private int $deep;
    private int $maxDeep;
    private int $maxPages;

    public function __construct(string $url, int $deep, int $maxDeep, int $maxPages)
    {
        $this->url = $url;
        $this->deep = $deep;
        $this->maxDeep = $maxDeep;
        $this->maxPages = $maxPages;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getDeep(): int
    {
        return $this->deep;
    }

    public function getMaxDeep(): int
    {
        return $this->maxDeep;
    }

    public function getMaxPages(): int
    {
        return $this->maxPages;
    }
}

