# Sistema de Programación Orientada a Objetos en PHP

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

Sistema completo de prácticas de Programación Orientada a Objetos desarrollado en PHP puro, que demuestra los principios fundamentales de POO: Encapsulamiento, Herencia, Polimorfismo, Abstracción y Patrones de Diseño.

## 📋 Descripción

Este proyecto implementa dos problemas prácticos de POO:

1. **Sistema de Figuras Geométricas**: Cálculo de áreas y perímetros de diferentes figuras
2. **Sistema de Saludos Multiidioma**: Generación de saludos personalizados en diferentes idiomas

## ✨ Características

- ✅ Implementación completa de principios POO
- ✅ Interfaces y clases abstractas
- ✅ Herencia multinivel
- ✅ Polimorfismo en métodos
- ✅ Encapsulamiento con getters y setters
- ✅ Patrón de diseño Factory
- ✅ Interfaz gráfica interactiva
- ✅ Validación de datos
- ✅ Código limpio y documentado

## 🚀 Principios POO Implementados

### 1. Encapsulamiento
- Propiedades `private` y `protected`
- Métodos getter y setter para acceso controlado
- Validación en setters (valores mayores a 0)

### 2. Herencia
- Clases abstractas como base (`FiguraGeometrica`, `Saludo`)
- Herencia de comportamiento común
- Extensión de funcionalidad en clases hijas

### 3. Polimorfismo
- Mismo método, diferentes implementaciones
- `calcularArea()` y `calcularPerimetro()` específicos por figura
- `saludar()` y `despedirse()` según idioma

### 4. Abstracción
- Interfaces (`IFigura`, `ISaludo`)
- Clases abstractas con métodos abstractos
- Ocultamiento de detalles de implementación

### 5. Patrón Factory
- `SaludoFactory` para creación de objetos
- Centralización de lógica de instanciación
- Facilita mantenimiento y escalabilidad

## 📁 Estructura del Proyecto

```
sistema-poo-php/
│
├── FigurasGeometricas.php    # Clases del Problema 1
├── figuras_gui.php            # Interfaz Problema 1
├── SistemasSaludos.php        # Clases del Problema 2
├── saludos_gui.php            # Interfaz Problema 2
└── README.md                  # Documentación
```

## 🛠️ Requisitos

- PHP 7.0 o superior
- Servidor web (Apache, Nginx, o servidor integrado de PHP)
- Navegador web moderno

## 📦 Instalación

1. **Clonar el repositorio**
```bash
git clone https://github.com/tu-usuario/sistema-poo-php.git
cd sistema-poo-php
```

2. **Configurar servidor local**

**Opción A: Usando el servidor integrado de PHP**
```bash
php -S localhost:8000
```

**Opción B: Usando XAMPP/WAMP**
- Copiar los archivos a la carpeta `htdocs` o `www`
- Acceder a `http://localhost/sistema-poo-php/`

**Opción C: Usando Docker**
```bash
docker run -d -p 8080:80 -v $(pwd):/var/www/html php:apache
```

3. **Acceder a la aplicación**
- Problema 1: `http://localhost:8000/figuras_gui.php`
- Problema 2: `http://localhost:8000/saludos_gui.php`

## 💻 Uso

### Problema 1: Figuras Geométricas

1. Selecciona el tipo de figura (Rectángulo, Triángulo, Círculo)
2. Ingresa las medidas correspondientes
3. Define un color
4. Haz clic en "Crear Figura"
5. Visualiza el área y perímetro calculados

**Ejemplo:**
```php
$rectangulo = new Rectangulo(5, 10, "azul");
echo $rectangulo->calcularArea();      // 50
echo $rectangulo->calcularPerimetro(); // 30
```

### Problema 2: Sistema de Saludos

1. Ingresa tu nombre
2. Selecciona el idioma (Español o Inglés)
3. Haz clic en "Generar Saludo"
4. Visualiza los saludos personalizados

**Ejemplo:**
```php
$saludo = SaludoFactory::crearSaludo('espanol', 'Juan');
echo $saludo->saludar();     // "Hola Juan, bienvenido!"
echo $saludo->despedirse();  // "Adios Juan, hasta pronto!"
```

## 📚 Documentación de Clases

### Problema 1: Figuras Geométricas

#### Interface `IFigura`
```php
interface IFigura {
    public function calcularArea();
    public function calcularPerimetro();
    public function obtenerInformacion();
}
```

#### Clase Abstracta `FiguraGeometrica`
Clase base para todas las figuras geométricas.
- **Propiedades**: `$nombre`, `$color`
- **Métodos**: `getNombre()`, `setNombre()`, `getColor()`, `setColor()`

#### Clase `Rectangulo`
- **Constructor**: `__construct($base, $altura, $color)`
- **Métodos**: `calcularArea()`, `calcularPerimetro()`, `getBase()`, `setBase()`, `getAltura()`, `setAltura()`

#### Clase `Triangulo`
- **Constructor**: `__construct($lado1, $lado2, $lado3, $base, $altura, $color)`
- **Métodos**: `calcularArea()`, `calcularPerimetro()`, getters y setters

#### Clase `Circulo`
- **Constructor**: `__construct($radio, $color)`
- **Métodos**: `calcularArea()`, `calcularPerimetro()`, `calcularDiametro()`, `getRadio()`, `setRadio()`

### Problema 2: Sistema de Saludos

#### Interface `ISaludo`
```php
interface ISaludo {
    public function saludar();
    public function despedirse();
}
```

#### Clase Abstracta `Saludo`
Clase base para todos los tipos de saludo.
- **Propiedades**: `$idioma`, `$nombreUsuario`
- **Métodos**: `getNombreUsuario()`, `setNombreUsuario()`, `getIdioma()`

#### Clase `SaludoEspanol`
- **Métodos**: `saludar()`, `despedirse()`, `saludoFormal()`

#### Clase `SaludoIngles`
- **Métodos**: `saludar()`, `despedirse()`, `saludoFormal()`

#### Clase `SaludoFactory`
Patrón Factory para crear saludos.
- **Método estático**: `crearSaludo($idioma, $nombreUsuario)`

## 🎨 Capturas de Pantalla

### Problema 1: Figuras Geométricas
![Figuras](https://via.placeholder.com/800x400/667eea/ffffff?text=Sistema+de+Figuras+Geometricas)

### Problema 2: Sistema de Saludos
![Saludos](https://via.placeholder.com/800x400/f093fb/ffffff?text=Sistema+de+Saludos)

## 🧪 Pruebas

### Ejecutar ejemplos de prueba

Crea un archivo `test.php`:

```php
<?php
require_once 'FigurasGeometricas.php';
require_once 'SistemasSaludos.php';

// Prueba de figuras
$rectangulo = new Rectangulo(5, 10, "azul");
$circulo = new Circulo(7, "rojo");

echo $rectangulo->obtenerInformacion() . "\n";
echo $circulo->obtenerInformacion() . "\n";

// Prueba de saludos
$saludoES = SaludoFactory::crearSaludo('espanol', 'Maria');
$saludoEN = SaludoFactory::crearSaludo('ingles', 'John');

echo $saludoES->saludar() . "\n";
echo $saludoEN->saludar() . "\n";
?>
```

Ejecutar:
```bash
php test.php
```

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Para contribuir:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/NuevaCaracteristica`)
3. Commit tus cambios (`git commit -m 'Agregar nueva característica'`)
4. Push a la rama (`git push origin feature/NuevaCaracteristica`)
5. Abre un Pull Request

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 👨‍💻 Autor

**Tu Nombre**
- GitHub: [@tu-usuario](https://github.com/tu-usuario)
- Email: tu-email@ejemplo.com

## 🙏 Agradecimientos

- ING. IRINA FONG - Por las prácticas de POO
- Comunidad PHP - Por la documentación y recursos
- Contribuidores del proyecto

## 📞 Soporte

Si tienes alguna pregunta o problema:
- Abre un [Issue](https://github.com/tu-usuario/sistema-poo-php/issues)
- Envía un email a tu-email@ejemplo.com

---

⭐ Si este proyecto te fue útil, considera darle una estrella en GitHub

**Desarrollado con ❤️ usando PHP**
