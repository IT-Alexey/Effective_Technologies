<?php


/**
 * Description of Circle
 *
 * @author Rie
 */
class Circle extends Figure
{

    // <editor-fold defaultstate="collapsed" desc="Свойства (общедоступные)">

    /**
     * 
     * @return float
     */
    public function getRadius()
    {
        return $this->Radius;
    }
    
    /**
     * 
     * @param float $value
     * @return \TTT\Task2\Circle
     */
    public function setRadius($value)
    {
        $this->Radius = $value;
        return $this;
    }

    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Реализация класса Figure">

    public function getArea()
    {
        return M_PI * $this->Radius * $this->Radius;
    }
    
    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Магические методы">

    public function __construct($coord, $radius)
    {
        parent::__construct($coord);
        $this->Radius = $radius;
    }
    
    public function __toString()
    {
        return 'Circle: ' . $this->getCenter() . ' R = ' . $this->getRadius();
    }

    // </editor-fold>
            
    // <editor-fold defaultstate="collapsed" desc="Поля (защищенные)">

    /**
     * Радиус круга
     * @var float 
     */
    protected $Radius;

    // </editor-fold>
}
