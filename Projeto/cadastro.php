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

// Receba os dados do formulário
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$foto = $_FILES['foto'];
$universidade = $_POST['universidade'];
$genero = $_POST['genero'];
$sobre = $_POST['sobre'];

// Verifique se a foto foi enviada corretamente
if ($foto['error'] === UPLOAD_ERR_OK) {
    $fotoNome = $foto['name'];
    $fotoTmp = $foto['tmp_name'];

    // Caminho da pasta onde as imagens serão salvas
    $pastaDestino = 'C:/xampp/htdocs/Pagina/imagens/';

    // Verifique se a pasta de destino existe, caso contrário, crie-a
    if (!file_exists($pastaDestino)) {
        mkdir($pastaDestino, 0777, true); // Permissões: 0777 (você pode ajustar as permissões conforme necessário)
    }

    $fotoDestino = $pastaDestino . $fotoNome;

    // Copie o arquivo para a pasta de destino
    if (copy($fotoTmp, $fotoDestino)) {
        // O arquivo foi copiado com sucesso
        // Agora você pode salvar o caminho da foto no banco de dados
    } else {
        // Ocorreu um erro ao copiar o arquivo
        die('Erro ao salvar a foto.');
    }
} else {
    die('Erro no envio da foto: ' . $foto['error']);
}


// Insira os dados no banco de dados
$sql = "INSERT INTO pessoas (nome, telefone, foto, universidade, genero, sobre) VALUES ('$nome', '$telefone', '$fotoNome', '$universidade', '$genero', '$sobre')";
if ($conn->query($sql) === TRUE);
