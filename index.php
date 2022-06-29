<head>
    <title> Página Inicial</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>
    <?php include("menu.php");?>
    <?php $acao; ?>
    <form method="post" name="dadoscliente" action="crudcliente.php?acao=insert">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nome</label>
            <input name="nome" id="nome" type="text" class="form-control" id="exampleFormControlInput1"  required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo do cliente</label>
            <select class="form-control" id="exampleFormControlSelect1" name="tipo" id="tipo" required>
              <option>Físico</option>
              <option>Jurídico</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Documento Identificador</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="doc" id="doc" placeholder="CPF/CNPJ" required>
        </div>
        <center>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </center>
    </form>
</body>