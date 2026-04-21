<?php namespace System\Databases;

class Database
{
    protected \PDO $connection;

    public function __construct(
        private readonly string $host,
        private readonly string $username,
        private readonly string $password,
        private readonly string $database
    ) {
        $this->connect();
    }

    private function connect(): void
    {
        try {
            $this->connection = new \PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
           throw new \Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection(): \PDO
    {
        return $this->connection;
    }

}