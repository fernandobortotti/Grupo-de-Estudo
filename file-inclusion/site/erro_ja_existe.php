<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro - Imagem Já Existe</title>
    <!-- Adicione a linkagem para o Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            padding-top: 50px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            text-align: center;
        }

        .container0 {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 2px;
            padding-right: 20px;
            padding-bottom: 20px;
            padding-left: 20px;
            max-width: 600px;
            width: 100%;
            margin: auto;
        }

        .error-message {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 15px;
            border: 1px solid transparent;
            border-radius: 0.25rem;
            margin-top: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-message img {
            width: 100px;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <div class="container0">
        <div class="container">
            <div class="error-message">
                <img src="/img/ja_existe.svg" alt="Erro" />
                <h1>Arquivo duplicado!</h1>
            </div>
            <p class="text-center">Desculpe, sua imagem já existe.</p>
            <a href="index.php" class="btn btn-primary">Voltar para o Upload</a>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
</body>

</html>