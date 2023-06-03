<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Média</title>
</head>
<body>
    <h1>Calculadora de Média</h1>

    <form method="POST" action="">
        <?php
        for ($i = 1; $i <= 4; $i++) {
            echo "<label for='nota$i'>Nota $i:</label>";
            echo "<input type='text' name='nota$i' id='nota$i' required><br>";
        }
        ?>

        <input type="submit" value="Calcular Média">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obter as notas digitadas pelo usuário
        $notas = array();
        for ($i = 1; $i <= 4; $i++) {
            $nota = $_POST["nota$i"];
            array_push($notas, $nota);
        }

        // Calcular a média
        $media = array_sum($notas) / count($notas);

        // Verificar a situação do estudante
        if ($media >= 7.5) {
            echo "<p>O estudante está aprovado com média $media.</p>";
        } elseif ($media >= 3 && $media < 7.5) {
            echo "<p>O estudante está de recuperação com média $media.</p>";
        } else {
            echo "<p>O estudante está reprovado com média $media.</p>";
        }
    }
    ?>
</body>
</html>
