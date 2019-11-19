<?php



/**
 * Вспомогательный базовый класс для многоугольников.
 *
 * @author Rie
 */
abstract class Polygon extends Figure {

    /**
     * 
     * @param array $vertices массив координат вершин многоугольника; каждая
     * вершина задаётся массивом из двух чисел (float) - абсциссы и ординаты
     * вершины
     */
    public function __construct($vertices) {
        parent::__construct($this->calculateCenter($vertices));
        $this->calculateVertices($vertices);
    }

    // <editor-fold defaultstate="collapsed" desc="Поля (защищенные)">

    /**
     *
     * @var array 
     */
    protected $vertices;

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Методы (защищенные)">

    /**
     * Преобразует координаты вершин в точки и сохраняет как поле объекта.
     * @param array $source Массив исходных координат вершин многоугольника
     */
    protected function calculateVertices($source) {
        $this->vertices = array_map(function($coords) {
            return new Point($coords[0], $coords[1]);
        }, $source);
    }


    /**
     * 
     * @param float $dx
     * @param float $dy
     */
    protected function moveExtended($dx, $dy) {
        foreach ($this->vertices as $vertex):
            $vertex->setX($vertex->getX() + $dx);
            $vertex->setY($vertex->getY() + $dy);
        endforeach;
    }

    /**
     * 
     * @return string
     */
    protected function verticesAsString() {
        return implode('; ', $this->vertices);
    }

    // </editor-fold>
}
