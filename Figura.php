<?php

// PROBLEMA 1: FIGURAS GEOMETRICAS

// Interfaz que define el contrato para todas las figuras
interface IFigura {
    public function calcularArea();
    public function calcularPerimetro();
    public function obtenerInformacion();
}

// Clase abstracta base para las figuras geometricas
abstract class FiguraGeometrica implements IFigura {
    protected $nombre;
    protected $color;
    
    public function __construct($nombre, $color = "sin color") {
        $this->nombre = $nombre;
        $this->color = $color;
    }
    
    // Metodo concreto compartido por todas las figuras
    public function obtenerInformacion() {
        return "Figura: {$this->nombre}, Color: {$this->color}, Area: {$this->calcularArea()}, Perimetro: {$this->calcularPerimetro()}";
    }
    
    // Getters y Setters (Encapsulamiento)
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getColor() {
        return $this->color;
    }
    
    public function setColor($color) {
        $this->color = $color;
    }
    
    // Metodos abstractos que deben implementar las clases hijas
    abstract public function calcularArea();
    abstract public function calcularPerimetro();
}

// Clase Rectangulo (Herencia de FiguraGeometrica)
class Rectangulo extends FiguraGeometrica {
    private $base;
    private $altura;
    
    public function __construct($base, $altura, $color = "sin color") {
        parent::__construct("Rectangulo", $color);
        $this->base = $base;
        $this->altura = $altura;
    }
    
    // Polimorfismo: implementacion especifica del calculo de area
    public function calcularArea() {
        return $this->base * $this->altura;
    }
    
    // Polimorfismo: implementacion especifica del calculo de perimetro
    public function calcularPerimetro() {
        return 2 * ($this->base + $this->altura);
    }
    
    // Encapsulamiento: getters y setters
    public function getBase() {
        return $this->base;
    }
    
    public function setBase($base) {
        if ($base > 0) {
            $this->base = $base;
        }
    }
    
    public function getAltura() {
        return $this->altura;
    }
    
    public function setAltura($altura) {
        if ($altura > 0) {
            $this->altura = $altura;
        }
    }
}

// Clase Triangulo (Herencia de FiguraGeometrica)
class Triangulo extends FiguraGeometrica {
    private $lado1;
    private $lado2;
    private $lado3;
    private $base;
    private $altura;
    
    public function __construct($lado1, $lado2, $lado3, $base, $altura, $color = "sin color") {
        parent::__construct("Triangulo", $color);
        $this->lado1 = $lado1;
        $this->lado2 = $lado2;
        $this->lado3 = $lado3;
        $this->base = $base;
        $this->altura = $altura;
    }
    
    // Polimorfismo: implementacion especifica del calculo de area
    public function calcularArea() {
        return ($this->base * $this->altura) / 2;
    }
    
    // Polimorfismo: implementacion especifica del calculo de perimetro
    public function calcularPerimetro() {
        return $this->lado1 + $this->lado2 + $this->lado3;
    }
    
    // Encapsulamiento: getters y setters
    public function getLado1() {
        return $this->lado1;
    }
    
    public function setLado1($lado1) {
        if ($lado1 > 0) {
            $this->lado1 = $lado1;
        }
    }
    
    public function getLado2() {
        return $this->lado2;
    }
    
    public function setLado2($lado2) {
        if ($lado2 > 0) {
            $this->lado2 = $lado2;
        }
    }
    
    public function getLado3() {
        return $this->lado3;
    }
    
    public function setLado3($lado3) {
        if ($lado3 > 0) {
            $this->lado3 = $lado3;
        }
    }
}

// Clase Circulo (Herencia de FiguraGeometrica)
class Circulo extends FiguraGeometrica {
    private $radio;
    
    public function __construct($radio, $color = "sin color") {
        parent::__construct("Circulo", $color);
        $this->radio = $radio;
    }
    
    // Polimorfismo: implementacion especifica del calculo de area
    public function calcularArea() {
        return pi() * pow($this->radio, 2);
    }
    
    // Polimorfismo: implementacion especifica del calculo de perimetro
    public function calcularPerimetro() {
        return 2 * pi() * $this->radio;
    }
    
    // Encapsulamiento: getters y setters
    public function getRadio() {
        return $this->radio;
    }
    
    public function setRadio($radio) {
        if ($radio > 0) {
            $this->radio = $radio;
        }
    }
    
    // Metodo adicional especifico del circulo
    public function calcularDiametro() {
        return 2 * $this->radio;
    }
}

?>