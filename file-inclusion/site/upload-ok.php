<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = array("image/png", "image/jpg", "image/jpeg", "image/gif");

    
    // Verifica se o arquivo é uma imagem real ou uma imagem falsa
    // if (isset($_POST["submit"])) {
    //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //     if ($check !== false) {
    //         $uploadOk = 1;
    //     } else {
    //         $errorMessage = "O arquivo enviado não é uma imagem.";
    //         $uploadOk = 0;
    //     }
    // }

   // Valida o tipo de arquivo
   if (!in_array($_FILES["fileToUpload"]["type"], $allowedTypes)) {
    http_response_code(415);
    header("Location: error.php");
    exit();
    }

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
    // Verifica se o arquivo já existe
    // if (file_exists($targetFile)) {
    //     http_response_code(400);
    //     header("Location: erro_ja_existe.php");
    //     exit();
    // }
    
    // Sanitiza o nome do arquivo
    $fileName = filter_var($_FILES["fileToUpload"]["name"], FILTER_SANITIZE_FILENAME);

    // Gera um nome único para o arquivo
    if (empty($fileName)) {
        $fileName = uniqid() . "." . $ext;
    }



    // Permitir apenas determinados formatos de arquivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
        http_response_code(400);
        header("Location: error.php");
        exit();
    }
    
    // Verifica se $uploadOk está definido como 0 por algum erro
    if ($uploadOk == 0) {
        // Exibe mensagem de erro
        http_response_code(400);
        echo $errorMessage;
    // Se tudo estiver correto, tenta enviar o arquivo
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            // Redireciona para a página de sucesso
            header("Location: index.php?success=true");
            exit();
        } else {
            // Exibe mensagem de erro
            http_response_code(500);
            echo "Desculpe, ocorreu um erro ao enviar sua imagem.";
        }
    }
} else {
    // Exibe mensagem de erro se não houver arquivo enviado
    http_response_code(400);
    echo "Nenhum arquivo enviado.";
}
?>
