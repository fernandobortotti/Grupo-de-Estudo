<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha do Laboratório</title>
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
        .lab-option {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Sobre a Vulnerabilidade de Inclusão de Arquivos</h1>
        <p class="text-justify">A vulnerabilidade de inclusão de arquivos é uma falha de segurança que ocorre quando um aplicativo permite que um usuário inclua arquivos arbitrários em uma página da web ou em um script. Isso pode levar a ataques como a execução remota de código e a exposição de arquivos confidenciais.</p>
        <p class="text-justify">Para se proteger contra essa vulnerabilidade, é importante validar e filtrar cuidadosamente todas as entradas de arquivo recebidas por meio do aplicativo, restringir o acesso a diretórios sensíveis e evitar a inclusão direta de arquivos do usuário sem verificação adequada.</p>
        
        <h2 class="text-center lab-option">Escolha do Laboratório</h2>
        <p class="text-center lab-option">Criamos nesse laboratório dois casos, um com vulnerabilidade e outro sem. Para acessar o laboratório, escolha uma das opções e seja feliz!</p>
        
        <div class="row justify-content-center lab-option">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laboratório sem Vulnerabilidade</h5>
                        <p class="card-text">Escolha esta opção se você deseja acessar o laboratório sem a vulnerabilidade de inclusão de arquivos.</p>
                        <a href="home.php" class="btn btn-primary btn-block">Acessar Laboratório</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laboratório com Vulnerabilidade</h5>
                        <p class="card-text">Escolha esta opção se você deseja acessar o laboratório com a vulnerabilidade de inclusão de arquivos.</p>
                        <a href="home-vul.php" class="btn btn-danger btn-block">Acessar Laboratório</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Adicione a linkagem para o Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
