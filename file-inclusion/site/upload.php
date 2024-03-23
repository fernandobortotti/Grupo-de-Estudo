<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $allowedTypes = array("image/png", "image/jpg", "image/jpeg", "image/gif");

    // Valida o tipo de arquivo
    if (!in_array($_FILES["fileToUpload"]["type"], $allowedTypes)) {
        http_response_code(415);
        header("Location: error.php");
        exit();
    }


    // Valida o tamanho do arquivo
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        http_response_code(413);
        echo "Erro: Tamanho do arquivo excede o limite de 5MB.";
        exit();
    }

    // Valida a extensão do arquivo
    $ext = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
    if (!in_array($ext, array("png", "jpg", "jpeg", "gif"))) {
        http_response_code(400);
        echo "Erro: Extensão de arquivo inválida.";
        exit();
    }

    function isFileNameValid($fileName) {
        // Expressão regular para verificar se existe uma palavra entre os pontos
        $regex = '/^[^.]+\.[^.]+\.[^.]+$/';
      
        return preg_match($regex, $fileName) === 1;
      }
      
      // Valida o nome do arquivo
      if (isFileNameValid($_FILES["fileToUpload"]["name"])) {
        ?>
    <script type="text/javascript">
        alert(<?php echo json_encode("Erro: Nome do arquivo inválido. Não é permitido ter palavras entre os pontos."); ?>);
        window.location.href = "/home.php";
    </script>
    <?php
    exit();
      }

    // Sanitiza o nome do arquivo
    // $fileName = filter_var($_FILES["fileToUpload"]["name"], FILTER_SANITIZE_FILENAME);

    // // Gera um nome único para o arquivo
    // if (empty($fileName)) {
    //     $fileName = uniqid() . "." . $ext;
    // }

    // Move o arquivo temporário para o diretório de destino
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        http_response_code(500);
        echo "Erro: Falha ao mover o arquivo para o servidor.";
        exit();
    }

    // Exibe a mensagem de sucesso
    http_response_code(200);

    ?>
    <script type="text/javascript">
        alert(<?php echo json_encode("Arquivo enviado com sucesso!"); ?>);
        window.location.href = "/home.php";
    </script>
    <?php
    exit();

} else {

    // Exibe o formulário de upload
    http_response_code(200);
    echo "<form action='upload.php' method='post' enctype='multipart/form-data'>
        Selecione a imagem: <input type='file' name='fileToUpload'>
        <input type='submit' value='Enviar'>
    </form>";

}
