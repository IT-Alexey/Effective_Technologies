<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/autoload.php';

// Создание фигур
$figures = TestActions::newRandomFigureArray(4);

// Запись во временный файл
$tmpname = tempnam('.', 't_');
$file = fopen($tmpname, 'w');
$str = serialize($figures);
fwrite($file, $str);
fclose($file);

// Чтение из временного файла
$figures = array();
$file = fopen($tmpname, 'r');
$str = fgets($file);
$figures = unserialize($str);
fclose($file);

// Удаление временного файла
unlink($tmpname);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Figures - Test</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>Figures</div>
    </div>
    <div>
        До сортировки по площади фигуры:
    </div>
    <table>
        <?php
        foreach ($figures as $figure):
            ?>
            <tr>
                <td><?php echo $figure; ?></td>
                <td style="text-align: right"><?php echo $figure->getArea(); ?></td>
            </tr>
            <?php
        endforeach;
        ?>
    </table>
    <?php
    // Сортировка по площади при помощи функции сравнения cmpFigures из класса TestActions
    usort($figures, ['\TestActions', 'cmpFigures']);
    ?>
    <div>
        После сортировки по площади фигуры:
    </div>
    <table>
        <?php
        foreach ($figures as $figure):
            ?>
            <tr>
                <td>
                    <?php echo $figure; ?>
                </td>
                <td style="text-align: right">
                    <?php echo $figure->getArea(); ?>
                </td>
            </tr>
            <?php
        endforeach;
        ?>
    </table>
</body>
</html>
