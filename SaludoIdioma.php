<?php

// PROBLEMA 2: SALUDOS EN DIFERENTES IDIOMAS

// Interfaz para el sistema de saludos
interface ISaludo {
    public function saludar();
    public function despedirse();
}

// Clase abstracta base para saludos
abstract class Saludo implements ISaludo {
    protected $idioma;
    protected $nombreUsuario;
    
    public function __construct($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }
    
    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }
    
    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }
    
    public function getIdioma() {
        return $this->idioma;
    }
    
    abstract public function saludar();
    abstract public function despedirse();
}

// Clase para saludos en Espanol (Herencia y Polimorfismo)
class SaludoEspanol extends Saludo {
    
    public function __construct($nombreUsuario) {
        parent::__construct($nombreUsuario);
        $this->idioma = "Espanol";
    }
    
    public function saludar() {
        return "Hola {$this->nombreUsuario}, bienvenido!";
    }
    
    public function despedirse() {
        return "Adios {$this->nombreUsuario}, hasta pronto!";
    }
    
    public function saludoFormal() {
        return "Buenos dias senor/senora {$this->nombreUsuario}";
    }
}

// Clase para saludos en Ingles (Herencia y Polimorfismo)
class SaludoIngles extends Saludo {
    
    public function __construct($nombreUsuario) {
        parent::__construct($nombreUsuario);
        $this->idioma = "Ingles";
    }
    
    public function saludar() {
        return "Hello {$this->nombreUsuario}, welcome!";
    }
    
    public function despedirse() {
        return "Goodbye {$this->nombreUsuario}, see you soon!";
    }
    
    public function saludoFormal() {
        return "Good morning Mr./Mrs. {$this->nombreUsuario}";
    }
}

// Clase Factory para crear saludos segun el idioma (Patron de Diseno)
class SaludoFactory {
    public static function crearSaludo($idioma, $nombreUsuario) {
        switch (strtolower($idioma)) {
            case 'espanol':
            case 'es':
                return new SaludoEspanol($nombreUsuario);
            case 'ingles':
            case 'en':
                return new SaludoIngles($nombreUsuario);
            default:
                return new SaludoEspanol($nombreUsuario);
        }
    }
}

?>
