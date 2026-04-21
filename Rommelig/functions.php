<?php
  date_default_timezone_set('Europe/Amsterdam');

   // helper: formatteer Y-m-d naar "Zo 19 okt"
  function formatDutchDate(?string $date): string {
    if (empty($date)) return '';
    $dt = DateTime::createFromFormat('Y-m-d', $date) ?: new DateTime($date);
    $weekdays = ['Zo','Ma','Di','Wo','Do','Vr','Za'];
    $months = [1=>'jan','feb','mrt','apr','mei','jun','jul','aug','sep','okt','nov','dec'];
    $weekday = $weekdays[(int)$dt->format('w')];
    $day = $dt->format('j');
    $month = $months[(int)$dt->format('n')];
    return $weekday . ' ' . $day . ' ' . $month;
  }

  function check_login($db, $redirect) {
    if(isset($_SESSION['user_id'])) {
      $id = $_SESSION['user_id'];

      $query = $db->prepare("SELECT * FROM users WHERE user_id = ? LIMIT 1");
      $query->execute([$id]);
      $result = $query->fetch(PDO::FETCH_ASSOC);

      if($result) {
        return $result;
      }
    }

    if($redirect) {
      //redirect to login
      header("Location: login.php");
      die;
    }
  }

  function random_num($length) {
    $text = "";
    if($length < 5) {
      $length = 5;
    }

    $len = rand(4, $length);

    for ($i=0; $i < $len; $i++) { 
      $text .= rand(0,9);
    }

    return $text;
  }
?>