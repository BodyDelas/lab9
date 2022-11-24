<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Стриженок Богдан Юрьевич 211-362 Лабораторная работа №9 Вариант №18</title>
  <link rel = "icon" href = "https://cdn-icons-png.flaticon.com/512/43/43146.png" />
</head>

<body>
  <header class="header">
    <div class="header-content container">
      <img class="logo" src="https://profkommospolytech.ru/wp-content/uploads/2022/01/0b6dd8bb96f9fc0544405b04019e34b7.png" alt="logo">
      <p class="header-text">Стриженок Богдан Юрьевич 211-362 Лабораторная работа №9 Вариант №18</p>
    </div>
  </header>

  <?php
  $type = 'E';// тип верстки
  ?>

  <main class="str">
    <div class="main-content container" <?php if($type=='E') echo 'style="height: 3400px;"'?>>
    <?php
      $min = PHP_INT_MAX;
      $max = PHP_INT_MIN;
      $avg;
      $sum = 0;

      $min_value = -2000000;
      $max_value = 2000000;

      $x = -10;	// начальное значение аргумента
      $encounting = 10000;	// количество вычисляемых значений
      $step = 2;	// шаг изменения аргумента

      switch ($type) {
        case 'B':
          echo '<ul>';
          break;
        case 'C': 
          echo '<ol>';
          break;
        case 'D': 
          echo '<table><tr><th>Номер строки </th><th>Значение аргумента</th><th>Значение функции</th>';
          break;
      }

      for($i = 0; $i < $encounting; $i++) {
        $x += $step;
        if ($x <= 10)	$f = 7 * $x + 18;
        else if ($x < 20 && $x != 16) $f = ($x - 17) / (8 - $x * 0.5);	
        else if ($x >= 20) $f = ($x + 4) * ($x - 7);
        else {
          if($type == 'A'){
            echo '<p class="function">error</p>';
          }
          elseif ($type == 'B' || $type == 'C') {
            echo '<li class="function">error</li>';
          }
          elseif($type == 'D'){
            echo '<tr><td>'.$i.'.</td><td>error</td><td>error</td></tr>';
          }
          else{
             echo '<div class="function-div">error</div>';
          }

          continue;
        };

        $f = round($f, 3);// округление функции до  3 знаков после запятой
        
        $sum += $f;//сумаа
        $avg = $sum / ($i + 1);//среднее арифметическое(сумму делим на количество шагов)

        if ($f < $min) $min = $f;
        if ($f > $max) $max = $f; 

        switch ($type) {
          case 'A': 
            echo '<p class="function">f('.$x.') = '.$f.'</p>';
            break;
          case 'B':		
            echo '<li class="function">f('. $x.') = '.$f.'</li>';
            break;
          case 'C':
            echo '<li class="function">f('. $x.') = '.$f.'</li>';
            break;
          case 'D': 
            echo '<tr><td>'.$i.'.</td><td>'.$x.'</td><td>'.$f.'</td></tr>';
            break;
          case 'E':
            echo '<div class="function-div">f('. $x.') = '.$f.'</div>';
            break;
        }

        if ($f >= $max_value || $f < $min_value)	break;
      }

      
      switch ($type) {
        case 'B':
          echo '</ul>';
          break;
        case 'C': 
          echo '</ol>';
          break;
        case 'D': 
         echo '</table>';
         break;
}
    ?>
    </div>
  </main>
  <footer class="footer">
    <div class="footer__content container">
      <p class="footer__type">Тип верстки: 
      <?php 
        if($type == 'A'){
          echo '"A". Верстка текстом';
        }
        elseif ($type == 'B') {
          echo '"B". Маркированный список';
        }
        elseif ($type == 'C') {
          echo '"C". Нумерованный список';
        }
        elseif ($type == 'D') {
          echo '"D". Табличная верстка';
        }
        elseif ($type == 'E') {
          echo '"E". Блочная верстка';
        }
        
      ?>
      </p>
      <div class="out">
    <?php
    echo 'Минимальное: '.$min.'</br>';
      echo 'Максимальное: '.$max.'</br>';
      echo 'Сумма: '.round($sum, 3).'</br>';
      echo 'Среднее арифметическое: '.round($avg, 3);
      ?>
      </div>
    </div>
  </footer>
</body>

</html>