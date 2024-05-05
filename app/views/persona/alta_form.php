<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Persona</title>
</head>
<body>

<h2>Insertar Persona</h2>

<form action="index.php" method="post">
    <input type="hidden" name='action' value='agregarPersona'>
    <label for="ci">CI:</label>
    <input type="text" id="ci" name="ci" required><br><br>
    
    <label for="nombres">Nombres:</label>
    <input type="text" id="nombres" name="nombres" required><br><br>
    
    <label for="paterno">Apellido Paterno:</label>
    <input type="text" id="paterno" name="paterno" required><br><br>
    
    <label for="materno">Apellido Materno:</label>
    <input type="text" id="materno" name="materno" required><br><br>
    
    <label for="fecha_nac">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nac" name="fecha_nac" required><br><br>
    
    <label for="genero">Género:</label>
    <select id="genero" name="genero" required>
        <option value="1">Masculino</option>
        <option value="0">Femenino</option>
    </select><br><br>
    
    <label for="direccion_dom">Dirección Domiciliaria:</label>
    <input type="text" id="direccion_dom" name="direccion_dom" required><br><br>
    
    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono"><br><br>
    
    <label for="celular">Celular:</label>
    <input type="text" id="celular" name="celular"><br><br>
    
    <label for="correo">Correo Electrónico:</label>
    <input type="email" id="correo" name="correo"><br><br>
    
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password"><br><br>
    
    <label for="rol">Rol:</label>
    <input type="text" id="rol" name="rol" required><br><br>
    
    <input type="submit" value="Insertar Persona">
</form>

</body>
</html>
