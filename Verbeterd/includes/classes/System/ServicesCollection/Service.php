<?php namespace System\ServicesCollection;

class Service
{
   public int $id;
   public string $date;
   public string $time;
   public string $speaker;
   public string $elder;
   public ?string $specialOccasion;

   public static function getComing(\PDO $db, int $limit = 4): array
   {
         $statement = $db->prepare('SELECT * FROM services WHERE DATE(date) >= :today ORDER BY date ASC LIMIT :limit');
         $statement->bindValue('today', date('Y-m-d'));
         $statement->bindValue('limit', max(1, $limit), \PDO::PARAM_INT);
         $statement->execute();

         return $statement->fetchAll(\PDO::FETCH_ASSOC);
   }
}