<head>
    <title>Cadastro de Contrato</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>
    <?php include("menu.php");?>
    <?php $acao; ?>
    <form method="post" name="dadoscliente" action="crudcontrato.php?acao=insert">
        <div class="form-group">
            <label for="exampleFormControlInput1">Número de vagas</label>
            <input name="numVagas" id="numVagas" type="number" class="form-control" id="exampleFormControlInput1"  required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo do Pagamento</label>
            <select class="form-control" id="exampleFormControlSelect1" name="tipoPag" id="tipoPag" required>
              <option>Vista</option>
              <option>Parcelado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Data de Início</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" name="dataInicio" id="dataInicio" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Data Final</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" name="dataFinal" id="dataFinal" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Código do Cliente</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="codCliente" id="codCliente" placeholder="Vá até a página para visualizar os clientes e pegue o código">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nome do Convênio</label>
            <input type="datetime" class="form-control" id="exampleFormControlInput1" name="nomeConvenio" id="nomeConvenio" placeholder="Caso tenha um convênio, coloque o nome aqui">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Caso seja para um evento </label>
            <input type="datetime" class="form-control" id="exampleFormControlInput1" name="nomeEvento" id="nomeEvento" placeholder="Vá até a página para visualizar os clientes e pegue o código">
        </div>
        <center>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </center>
    </form>
</body>