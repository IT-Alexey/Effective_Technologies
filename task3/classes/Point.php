<?php



/**
 * Description of Point
 *
 * @author Rie
 */
class Point
{

    const EPSILON = 1E-9;

    // <editor-fold defaultstate="collapsed" desc="Магические методы">

    /**
     * 
     * @param float $x
     * @param float $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    
    public function __toString()
    {
        return '[' . $this->x . '; ' . $this->y . ']';
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Свойства (общедоступные)">

    /**
     * 
     * @return float
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * 
     * @param float $value
     * @return \TTT\Task2\Point
     */
    public function setX($value)
    {
        $this->x = $value;
        return $this;
    }

    /**
     * 
     * @return float
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * 
     * @param float $value
     * @return \TTT\Task2\Point
     */
    public function setY($value)
    {
        $this->y = $value;
        return $this;
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Методы (общедоступные)">

    public function toArray()
    {
        return array($this->x, $this->y);
    }

    /**
     * 
     * @param Point $that
     * @return float
     */
    public function distanceTo($that)
    {
        $dx = $this->x - $that->x;
        $dy = $this->y - $that->y;
        return sqrt($dx * $dx + $dy * $dy);
    }

    /**
     * 
     * @param Point $b
     * @param Point $c
     * @return float
     */
    public function angleTo($b, $c)
    {
        $xb = $b->x - $this->x;
        $yb = $b->y - $this->y;
        $xc = $c->x - $this->x;
        $yc = $c->y - $this->y;
        $cos = ($xb * $yb + $xc * $yc) / ($this->distanceTo($b) * $this->distanceTo($c));
        return acos($cos);
    }

    /**
     * 
     * @param Point $b
     * @param Point $c
     * @return bool
     */
    public function isOrtho($b, $c)
    {
        $xb = $b->x - $this->x;
        $yb = $b->y - $this->y;
        $xc = $c->x - $this->x;
        $yc = $c->y - $this->y;
        return abs($xb * $yb + $xc * $yc) < self::EPSILON;
    }

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="Поля (защищенные)">

    /**
     *
     * @var float 
     */
    protected $x;

    /**
     *
     * @var float 
     */
    protected $y;

    // </editor-fold>
}
