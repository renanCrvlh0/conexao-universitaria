<?php
// Estabeleça a conexão com o banco de dados
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'namoro';

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conn->connect_error);
}

// Consulta os dados na tabela "pessoas"
$sql = "SELECT * FROM pessoas";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Pessoas</title>
    <link rel="stylesheet" type="text/css" href="pagina.css">
</head>
<body>
    <header>
        <img src="imagens/logo.svg" alt="logo do site" id="logo">
    </header>

<?php
echo "<div class='container-pessoa'>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nome = $row['nome'];
        $telefone = $row['telefone'];
        $telefoneFormatado = substr($telefone, 0, 2) . ' ' . substr($telefone, 2, 5) . '-' . substr($telefone, 7);
        $foto = $row['foto'];
        $fotoFormatada = utf8_encode($foto);
        $universidade = $row['universidade'];
        $genero = $row['genero'];
        $sobre = $row['sobre'];

        
        echo "<div class='pessoa'>";
        echo "<img src='imagens/$fotoFormatada' alt='Foto de $nome' id='fotoUsuario' class='dados'>";
        echo "<h2 id='nome' class='dados'>$nome</h2>";
        echo "<div class='container-dados'>";
        echo "<p id='tel' class='dados'>Telefone: <a href='https://wa.me/$telefone'>$telefoneFormatado</a></p>";
        echo "<p id='universidade' class='dados'>Universidade: $universidade</p>";   
        echo "<p id='genero' class='dados'>Gênero: $genero</p>";
        echo "<p id='sobreMim' class='dados'>Sobre mim: $sobre</p>"; 
        echo "</div>";        
        echo "</div>";
        
    }
echo "</div>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn->close();
?>
    <footer>
        <p>Todos os direitos reservados</p>
    </footer>
</body>
</html>
