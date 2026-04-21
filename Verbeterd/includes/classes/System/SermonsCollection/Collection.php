<?php namespace System\SermonsCollection;

class Collection
{
    private array $sermons = [];

    public function get(): array
    {
        return $this->sermons;
    }

    public function set(array $sermons): void
    {
        $this->sermons = $sermons;
    }

    public function add(Sermon $sermon): void
    {
        $this->sermons[] = $sermon;
    }
}