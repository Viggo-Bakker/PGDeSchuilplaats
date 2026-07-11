<?php namespace System\SermonsCollection;

class Sermon
{
   public int $id;
   public string $date = '';
   public string $name = '';
   public string $title = '';
   public string $file;

   public static function getAll(\PDO $db, ?int $limit = null): array
   {
        $query = 'SELECT * FROM sermons ORDER BY date DESC';

          if ($limit !== null) {
               $query .= ' LIMIT :limit';
          }

          $statement = $db->prepare($query);

          if ($limit !== null) {
               $statement->bindValue('limit', max(1, $limit), \PDO::PARAM_INT);
          }

          $statement->execute();

          return $statement->fetchAll(\PDO::FETCH_ASSOC);
   }

   public function update(\PDO $db): bool
   {
        $query = "UPDATE sermons SET date = :date, name = :name, title = :title, file = :file WHERE id = :id";
        $statement = $db->prepare($query);
         return $statement->execute([
               'date' => $this->date,
               'name' => $this->name,
               'title' => $this->title,
               'file' => $this->file,
               'id' => $this->id
         ]);
   }

   public function delete(\PDO $db): bool
   {
        $query = "DELETE FROM sermons WHERE id = :id";
        $statement = $db->prepare($query);
        return $statement->execute(['id' => $this->id]);
   }

   public static function create(Sermon $sermon, \PDO $db): bool
   {
        $query = "INSERT INTO sermons (date, name, title, file) VALUES (:date, :name, :title, :file)";
        $statement = $db->prepare($query);
        return $statement->execute([
               'date' => $sermon->date,
               'name' => $sermon->name,
               'title' => $sermon->title,
               'file' => $sermon->file
         ]);
   }
}