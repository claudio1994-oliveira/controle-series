<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Series</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
    <div class="container">
        <a class="navbar navbar-expand-lg" href="<?php echo e(route('listar_series')); ?>">Home</a>
        <?php if(auth()->guard()->check()): ?>
             <a href="/sair" class="text-danger">Sair</a>
        <?php endif; ?>
        <?php if(auth()->guard()->guest()): ?>
                <a href="/entrar" class="text-primary">Entrar</a>
        <?php endif; ?>
    </div>
</nav>
<div class="container">
    <div class="jumbotron">
        <h1><?php echo $__env->yieldContent('cabecalho'); ?></h1>
    </div>

    <?php echo $__env->yieldContent('conteudo'); ?>
</div>
</body>
</html>

<?php /**PATH C:\Users\claud\OneDrive\Documentos\Alura PHP\series\controle-series\resources\views/layout.blade.php ENDPATH**/ ?>