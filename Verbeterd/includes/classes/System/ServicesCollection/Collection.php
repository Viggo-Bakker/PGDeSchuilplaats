<?php namespace System\ServicesCollection;

class Collection
{
    private array $services = [];

    public function get(): array
    {
        return $this->services;
    }

    public function set(array $services): void
    {
        $this->services = $services;
    }

    public function add(Service $service): void
    {
        $this->services[] = $service;
    }
}