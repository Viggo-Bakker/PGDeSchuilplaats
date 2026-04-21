<?php namespace System\SermonsCollection;

class Sermon
{
   public int $id;
   public string $date;
   public string $name;
   public string $title;
   public string $file;

   public static function getAll(\PDO $db): array
   {
        return $db->query("SELECT * FROM sermons ORDER BY date DESC")->fetchAll(\PDO::FETCH_ASSOC);
   }
}