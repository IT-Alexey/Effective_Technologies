<?php



class TestActions {

    /**
     * Размер "центрального квадрата" (1/3 от реальной ширины и высоты области
     * "рисования")
     */
    const AREASIZE = 100.0;
    // <editor-fold defaultstate="collapsed" desc="Константы - Идентификаторы форм">

    const CIRCLE_FORM = 0;
    const RECTANGLE_FORM = 1;
    const TRIANGLE_FORM = 2;
    const MIN_FORM = self::CIRCLE_FORM;
    const MAX_FORM = self::TRIANGLE_FORM;

    // </editor-fold>

    /**
     * 
     * @return \TTT\Task2\Figure
     */
    static public function newRandomFigure()
    {
        $x = self::randomfloat();
        $y = self::randomfloat();
        $form = rand(self::MIN_FORM, self::MAX_FORM);
        switch ($form):
            case self::CIRCLE_FORM:
                $radius = self::randomfloat();
                return new Circle([$x, $y], $radius);
            case self::RECTANGLE_FORM:
                $w = self::randomfloat();
                $h = self::randomfloat();
                $vertices = array(
                    array($x - $w, $y - $h),
                    array($x - $x, $y + $h),
                    array($x + $w, $y + $h),
                    array($x + $w, $y - $h)
                );
                return new Rectangle($vertices);
            case self::TRIANGLE_FORM:
                $p0 = array(self::randomfloat(), self::randomfloat());
                $p1 = array(self::randomfloat(), self::randomfloat());
                $p2 = array(self::randomfloat(), self::randomfloat());
                return new Triangle(array($p0, $p1, $p2));
            default:
                return null;
        endswitch;
    }

    /**
     * 
     * @param int $count
     * @return array
     */
    public static function newRandomFigureArray($count)
    {
        $result = [];
        for ($i = 0; $i < $count; $i++):
            $result[] = self::newRandomFigure();
        endfor;
        return $result;
    }

    /**
     * 
     * @param Figure $fig1
     * @param Figure $fig2
     * @return int
     */
    public static function cmpFigures($fig1, $fig2)
    {
        $area1 = $fig1->getArea();
        $area2 = $fig2->getArea();
        if ($area1 < $area2):
            return -1;
        elseif ($area1 > $area2):
            return 1;
        else:
            return 0;
        endif;
    }

    /**
     * 
     * @return float
     */
    private static function randomfloat()
    {
        return ((float) rand() / (float) getrandmax()) * self::AREASIZE;
    }

}
