<?php
require_once 'Figura.php';

$resultado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo_figura'];
    $color = htmlspecialchars($_POST['color']);
    
    switch ($tipo) {
        case 'rectangulo':
            $base = floatval($_POST['base']);
            $altura = floatval($_POST['altura']);
            $figura = new Rectangulo($base, $altura, $color);
            $resultado = '<div class="resultado exito">';
            $resultado .= '<h3>Rectangulo Creado</h3>';
            $resultado .= '<p>' . $figura->obtenerInformacion() . '</p>';
            $resultado .= '<p><strong>Base:</strong> ' . $figura->getBase() . '</p>';
            $resultado .= '<p><strong>Altura:</strong> ' . $figura->getAltura() . '</p>';
            $resultado .= '</div>';
            break;
            
        case 'triangulo':
            $lado1 = floatval($_POST['lado1']);
            $lado2 = floatval($_POST['lado2']);
            $lado3 = floatval($_POST['lado3']);
            $base = floatval($_POST['base_tri']);
            $altura = floatval($_POST['altura_tri']);
            $figura = new Triangulo($lado1, $lado2, $lado3, $base, $altura, $color);
            $resultado = '<div class="resultado exito">';
            $resultado .= '<h3>Triangulo Creado</h3>';
            $resultado .= '<p>' . $figura->obtenerInformacion() . '</p>';
            $resultado .= '</div>';
            break;
            
        case 'circulo':
            $radio = floatval($_POST['radio']);
            $figura = new Circulo($radio, $color);
            $resultado = '<div class="resultado exito">';
            $resultado .= '<h3>Circulo Creado</h3>';
            $resultado .= '<p>' . $figura->obtenerInformacion() . '</p>';
            $resultado .= '<p><strong>Radio:</strong> ' . $figura->getRadio() . '</p>';
            $resultado .= '<p><strong>Diametro:</strong> ' . number_format($figura->calcularDiametro(), 2) . '</p>';
            $resultado .= '</div>';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figuras Geometricas - POO</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        input[type="number"],
        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }
        
        .resultado {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            border-left: 5px solid #667eea;
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
        
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .figura-select {
            display: none;
        }
        
        .figura-select.active {
            display: block;
        }
        
        .nav-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #f5f5f5;
            color: #667eea;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        
        .nav-link:hover {
            background: #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Problema 1: Figuras Geometricas</h1>
            <p>Sistema de Gestion de Figuras con POO</p>
        </div>
        
        <div class="content">
            <h2>Crear Figura Geometrica</h2>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label>Selecciona el tipo de figura:</label>
                    <select name="tipo_figura" id="tipo_figura" onchange="mostrarCamposFigura()" required>
                        <option value="">-- Selecciona una figura --</option>
                        <option value="rectangulo">Rectangulo</option>
                        <option value="triangulo">Triangulo</option>
                        <option value="circulo">Circulo</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Color:</label>
                    <input type="text" name="color" value="azul" required>
                </div>
                
                <div id="campos_rectangulo" class="figura-select">
                    <div class="grid">
                        <div class="form-group">
                            <label>Base:</label>
                            <input type="number" name="base" step="0.01" min="0.01">
                        </div>
                        <div class="form-group">
                            <label>Altura:</label>
                            <input type="number" name="altura" step="0.01" min="0.01">
                        </div>
                    </div>
                </div>
                
                <div id="campos_triangulo" class="figura-select">
                    <div class="grid">
                        <div class="form-group">
                            <label>Lado 1:</label>
                            <input type="number" name="lado1" step="0.01" min="0.01">
                        </div>
                        <div class="form-group">
                            <label>Lado 2:</label>
                            <input type="number" name="lado2" step="0.01" min="0.01">
                        </div>
                        <div class="form-group">
                            <label>Lado 3:</label>
                            <input type="number" name="lado3" step="0.01" min="0.01">
                        </div>
                    </div>
                    <div class="grid">
                        <div class="form-group">
                            <label>Base:</label>
                            <input type="number" name="base_tri" step="0.01" min="0.01">
                        </div>
                        <div class="form-group">
                            <label>Altura:</label>
                            <input type="number" name="altura_tri" step="0.01" min="0.01">
                        </div>
                    </div>
                </div>
                
                <div id="campos_circulo" class="figura-select">
                    <div class="form-group">
                        <label>Radio:</label>
                        <input type="number" name="radio" step="0.01" min="0.01">
                    </div>
                </div>
                
                <button type="submit" class="btn">Crear Figura</button>
            </form>
            
            <?php if ($resultado) echo $resultado; ?>
            
            <a href="SistemaSaludos.php" class="nav-link">Ir al Problema 2: Saludos</a>
        </div>
    </div>
    
    <script>
        function mostrarCamposFigura() {
            var tipo = document.getElementById('tipo_figura').value;
            var campos = document.getElementsByClassName('figura-select');
            
            for (var i = 0; i < campos.length; i++) {
                campos[i].classList.remove('active');
            }
            
            if (tipo) {
                document.getElementById('campos_' + tipo).classList.add('active');
            }
        }
    </script>
</body>
</html>
