<?php



require_once $_SERVER['DOCUMENT_ROOT'] . '/autoload.php';

// Создание фигур
$figures = TestActions::newRandomFigureArray(8);

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

echo 'Figures' . '\n';

echo 'До сортировки по площади фигуры:' . '\n';
foreach ($figures as $figure):
    echo $figure . '\t S = ' . $figure->getArea();
endforeach;

// Сортировка по площади при помощи функции сравнения cmpFigures из класса TestActions
usort($figures, ['\TestActions', 'cmpFigures']);

echo 'После сортировки по площади фигуры: ' . '\n';
foreach ($figures as $figure):
    echo $figure . '\t S = ' . $figure->getArea();
endforeach;
