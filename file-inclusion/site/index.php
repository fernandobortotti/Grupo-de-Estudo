<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de Imagem - Laboratório sobre Vulnerabilidade de Inclusão de Arquivos</title>
    <!-- Adicione a linkagem para o Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            padding-top: 50px;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            width: 100%;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Envio de Imagem - Laboratório sobre Vulnerabilidade de Inclusão de Arquivos</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fileToUpload">Selecione uma imagem para enviar:</label>
                <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
            </div>
            <button type="submit" class="btn btn-primary">Enviar Imagem</button>
        </form>
        <?php
        if (isset($_GET['success']) && $_GET['success'] == 'true') {
            echo '<p class="text-success text-center mt-3">Imagem enviada com sucesso!</p>';
        }
        ?>
        <hr>
        <h2>Sobre a Vulnerabilidade de Inclusão de Arquivos</h2>
        <p>A vulnerabilidade de inclusão de arquivos é uma falha de segurança que ocorre quando um aplicativo permite que um usuário inclua arquivos arbitrários em uma página da web ou em um script. Isso pode levar a ataques como a execução remota de código e a exposição de arquivos confidenciais.</p>
        <p>Para se proteger contra essa vulnerabilidade, é importante validar e filtrar cuidadosamente todas as entradas de arquivo recebidas por meio do aplicativo, restringir o acesso a diretórios sensíveis e evitar a inclusão direta de arquivos do usuário sem verificação adequada.</p>
    </div>
    <!-- Adicione a linkagem para o Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
