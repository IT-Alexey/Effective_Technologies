
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Задание №1</title>
    </head>
    <body>
        <?php

        function fibonacci($n) {
            $number = [0, 1];
            for ($i = 1; $i < $n; $i++) {
                $number[] = $number[$i] + $number[$i - 1];
            }
            return $number;
        }

        echo "<pre>";
        print_r(fibonacci(63));
        echo "</pre>";
        ?>
    </body>
</html>