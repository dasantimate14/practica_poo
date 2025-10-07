<?php
require_once 'SaludoIdioma.php';

$resultado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idioma = $_POST['idioma'];
    $nombre = htmlspecialchars($_POST['nombre_usuario']);
    
    $saludo = SaludoFactory::crearSaludo($idioma, $nombre);
    
    $resultado = '<div class="resultado exito">';
    $resultado .= '<h3>Saludo Generado</h3>';
    $resultado .= '<p><strong>Idioma:</strong> ' . $saludo->getIdioma() . '</p>';
    $resultado .= '<p><strong>Usuario:</strong> ' . $saludo->getNombreUsuario() . '</p>';
    $resultado .= '<div class="mensaje">' . $saludo->saludar() . '</div>';
    $resultado .= '<div class="mensaje">' . $saludo->despedirse() . '</div>';
    if (method_exists($saludo, 'saludoFormal')) {
        $resultado .= '<div class="mensaje formal">' . $saludo->saludoFormal() . '</div>';
    }
    $resultado .= '</div>';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Saludos - POO</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        
        .content {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        
        input[type="text"],
        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        input[type="text"]:focus,
        select:focus {
            outline: none;
            border-color: #f093fb;
        }
        
        .btn {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s;
            width: 100%;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(240, 147, 251, 0.4);
        }
        
        .resultado {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            background: #fff3e0;
            border-left: 5px solid #ff9800;
        }
        
        .resultado.exito {
            background: #e8f5e9;
            border-left-color: #4caf50;
        }
        
        .resultado h3 {
            color: #2e7d32;
            margin-bottom: 15px;
        }
        
        .resultado p {
            margin: 10px 0;
            font-size: 16px;
            line-height: 1.6;
        }
        
        .mensaje {
            background: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            border-left: 3px solid #f093fb;
            font-size: 18px;
            font-weight: 500;
        }
        
        .mensaje.formal {
            background: #f3e5f5;
            border-left-color: #9c27b0;
        }
        
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .nav-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #f5f5f5;
            color: #f5576c;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        
        .nav-link:hover {
            background: #e0e0e0;
        }
        
        .info-box {
            background: #e3f2fd;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            border-left: 4px solid #2196f3;
        }
        
        .info-box h3 {
            color: #1565c0;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Problema 2: Sistema de Saludos</h1>
            <p>Saludos Multiidioma con POO</p>
        </div>
        
        <div class="content">
            <h2>Generar Saludo Personalizado</h2>
            
            <form method="POST" action="">
                <div class="grid">
                    <div class="form-group">
                        <label>Tu nombre:</label>
                        <input type="text" name="nombre_usuario" placeholder="Ingresa tu nombre" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Selecciona el idioma:</label>
                        <select name="idioma" required>
                            <option value="espanol">Espanol</option>
                            <option value="ingles">Ingles</option>
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn">Generar Saludo</button>
            </form>
            
            <?php if ($resultado) echo $resultado; ?>
            
            <div class="info-box">
                <h3>Caracteristicas del Sistema</h3>
                <p><strong>Patron Factory:</strong> Crea saludos automaticamente segun el idioma</p>
                <p><strong>Polimorfismo:</strong> Cada idioma implementa sus propios saludos</p>
                <p><strong>Encapsulamiento:</strong> Datos protegidos con getters y setters</p>
            </div>
            
            <a href="index.php" class="nav-link">Volver al Problema 1: Figuras</a>
        </div>
    </div>
</body>
</html>