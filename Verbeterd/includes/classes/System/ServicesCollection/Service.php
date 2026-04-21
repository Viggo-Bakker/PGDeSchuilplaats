<?php namespace System\ServicesCollection;

class Service
{
   public int $id;
   public string $date;
   public string $time;
   public string $speaker;
   public string $elder;
   public ?string $specialOccasion;

   public static function getComing(\PDO $db): array
   {
        return $db->query("SELECT * FROM services WHERE DATE(date) >= '" . date("Y-m-d") . "' ORDER BY date ASC LIMIT 4")->fetchAll(\PDO::FETCH_ASSOC);
   }
}