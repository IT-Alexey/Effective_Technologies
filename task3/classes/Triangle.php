<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



/**
 * Description of Triangle
 *
 * @author Rie
 */
class Triangle extends Polygon
{

    // <editor-fold defaultstate="collapsed" desc="Свойства (общедоступные)">

    public function getVertexA()
    {
        return $this->vertices[0];
    }

    public function getVertexB()
    {
        return $this->vertices[1];
    }

    public function getVertexC()
    {
        return $this->vertices[2];
    }
    
    public function getSideA()
    {
        return $this->sideA;
    }

    public function getSideB()
    {
        return $this->sideB;
    }

    public function getSideC()
    {
        return $this->sideC;
    }
    
    public function getAngleA()
    {
        return $this->angleA;
    }
    
    public function getAngleB()
    {
        return $this->angleB;
    }
    
    public function getAngleC()
    {
        return $this->angleC;
    }
    
    // </editor-fold>
        
    // <editor-fold defaultstate="collapsed" desc="Реализация Figure">

    public function getArea()
    {
        // формула Герона
        $p = ($this->sideA + $this->sideB + $this->sideC) / 2;
        return sqrt($p * ($p - $this->sideA) * ($p - $this->sideB) * ($p - $this->sideC));
    }

    // </editor-fold>
    
    // <editor-fold defaultstate="collapsed" desc="Магические методы">
    
    /**
     * 
     * @param array $vertices
     */
    public function __construct($vertices)
    {
        parent::__construct($vertices);
        $this->sideA = $this->getVertexB()->distanceTo($this->getVertexC());
        $this->sideB = $this->getVertexC()->distanceTo($this->getVertexA());
        $this->sideC = $this->getVertexA()->distanceTo($this->getVertexB());
        $this->angleA = $this->getVertexA()->angleTo($this->getVertexB(), $this->getVertexC());
        $this->angleB = $this->getVertexB()->angleTo($this->getVertexC(), $this->getVertexA());
        $this->angleC = $this->getVertexC()->angleTo($this->getVertexA(), $this->getVertexB());
    }
    
    public function __toString()
    {
        return 'Triangle: ' . $this->verticesAsString();
    }

    // </editor-fold>
        
    // <editor-fold defaultstate="collapsed" desc="Поля (защищенные)">

    /**
     *
     * @var float 
     */
    protected $sideA;

    /**
     *
     * @var float 
     */
    protected $sideB;

    /**
     *
     * @var float 
     */
    protected $sideC;

    /**
     *
     * @var float 
     */
    protected $angleA;

    /**
     *
     * @var float 
     */
    protected $angleB;

    /**
     *
     * @var float 
     */
    protected $angleC;

    // </editor-fold>
}
