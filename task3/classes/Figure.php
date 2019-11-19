<?php



/**
 * Description of Figure
 *
 * @author Rie
 */
abstract class Figure
{

    // <editor-fold defaultstate="collapsed" desc="Свойства (общедоступные)">

    public function getCenter()
    {
        return $this->center;
    }

    public function setCenter()
    {
        return $this->moveTo($newCenter);
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Абстрактные свойства (общедоступные)">

    /**
     * Возвращает площадь фигуры.
     */
    abstract public function getArea();

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Методы (общедоступные)">

    /**
     * Перемещает фигуру на новое место.
     * @param mixed $newCenter массив новых координат (условного центра) фигуры
     * или точка (Point) нового условного центра фигуры.
     * @return \TTT\Task2\Figure сама перемещённая на новое место фигура
     * (для последующих действий с ней)
     */
    public function moveTo(mixed $newCenter)
    {
        if (is_array($newCenter)):
            $newX = $newCenter[0];
            $newY = $newCenter[1];
        else: // Point newCenter
            $newX = $newCenter->getX();
            $newY = $newCenter->getY();
        endif;
        $dx = $newX - $this->center->getX();
        $dy = $newY - $this->center->getY();
        $this->center->setX($newX);
        $this->center->setY($newY);
        $this->moveExtended($dx, $dy);
        return $this;
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Магические методы">

    /**
     * 
     * @param array|Point $coord числовой (float) массив из 2 чисел (абсциссы
     * и ординаты точки) или точка (Point) центра фигуры.
     */
    public function __construct($coord)
    {
        if (is_array($coord)):
            $this->center = new Point($coord[0], $coord[1]);
        elseif ($coord instanceof Point):
            $this->center = $coord;
        else:
            throw new ErrorException('Центр фигуры должен быть точкой или массивом координат точки');
        endif;
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Вспомогательные методы (защищенные)">

    /**
     * Рассчитывает условный центр фигуры.
     * @param array $vertices
     * @return \TTT\Task2\Point
     */
    protected function calculateCenter($vertices)
    {
        $vcount = count($vertices);
        $x = 0.0;
        $y = 0.0;
        for ($i = 0; $i < $vcount; $i++) {
            $x += $vertices[$i][0];
            $y += $vertices[$i][1];
        }
        return new Point($x / $vcount, $y / $vcount);
    }

    /**
     * ПЕРЕОПРЕДЕЛЯЕТСЯ В ПРОИЗВОДНЫХ КЛАССАХ
     * @param float $dx абсцисса смещения нового центра относительно прежнего
     * @param float $dy ордината смещения нового центра относительно прежнего
     */
    protected function moveExtended($dx, $dy) {
        
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Поля (защищенные)">

    /**
     * Условный геометрический центр фигуры
     * @var Point 
     */
    protected $center;

    // </editor-fold>
}
