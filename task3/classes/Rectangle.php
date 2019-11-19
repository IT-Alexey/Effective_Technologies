<?php



/**
 * Description of Rectangle
 *
 * @author Rie
 */
class Rectangle extends Polygon
{
    
    // <editor-fold defaultstate="collapsed" desc="Свойства (общедоступные)">

    /**
     * 
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }
    
    /**
     * 
     * @return float
     */
    public function getHeight()
    {
        return $this->heigth;
    }

    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Реализация класса Figure">

    public function getArea()
    {
        return $this->getWidth() * $this->getHeight();
    }
    
    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="Магические методы">
    
    /**
     * 
     * @param array $vertices Массив координат вершин прямоугольника, каждая
     * из которых задаётся массивом из двух чисел.
     */
    public function __construct($vertices)
    {
        if(count($vertices) != 4):
            throw new Exception('У прямоугольника должно быть 4 вершины!');
        endif;
        parent::__construct($vertices);
        $this->width = $this->vertices[0]->distanceTo($this->vertices[1]);
        $this->heigth = $this->vertices[0]->distanceTo($this->vertices[3]);
    }
    
    public function __toString()
    {
        return 'Rectangle: ' . $this->verticesAsString();
    }

    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="Поля (защищенные)">

    /**
     *
     * @var float 
     */
    protected $width;
    
    /**
     *
     * @var float 
     */
    protected $heigth;
    
    // </editor-fold>

}
