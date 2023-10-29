<!DOCTYPE html>
<html>
<head>
    <title>PHP table</title>
    <link rel="stylesheet" href="Lr_3.css">
</head>
<body>
    <?php
        $file = fopen('oblinfo.txt', 'r');

        if ($file) {
            echo "<table>";
            echo "<tr>";
            echo "<th width = 50>№</th>";
            echo "<th width = 600>Область</th>";
            echo "<th width = 100>Населення, тис.</th>";
            echo "<th width = 100>Кількість ВНЗ</th>";
            echo "<th width = 50>Кількість ВНЗ на 100 тис. населення</th>";
            echo "</tr>";

            $count = 1;
            while (($line = fgets($file)) !== false) {
                $obl = rtrim($line); // rtrim - видалення зайвих пробілів та символів нового рядка
                $population = rtrim(fgets($file));
                $universities = rtrim(fgets($file));

                $mtd = round($universities * 100.0 / $population, 2);

                echo "<tr>";
                echo "<td>$count</td>";
                echo "<td>$obl</td>";
                echo "<td>$population</td>";
                echo "<td>$universities</td>";
                echo "<td>$mtd</td>";
                echo "</tr>";

                $count++;
            }

            echo "</table>";
            fclose($file); // Закриваємо файл
        } else {
            echo "Помилка відкриття файлу.";
        }
    ?>
</body>
</html>
