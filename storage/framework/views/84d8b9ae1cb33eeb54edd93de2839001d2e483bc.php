        <?php $__env->startSection('cabecalho'); ?>
        Adicionar Série
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('conteudo'); ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                </ul>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
            <form method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-6">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome">
                    </div>
                    <div class="col-3">
                        <label for="nome">Nº Temporadas</label>
                        <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
                    </div>
                    <div class="col-3">
                        <label for="nome">Eps por temporada</label>
                        <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
                    </div>
                </div>
                <button class="btn btn-primary mt-2">Adicionar</button>
            </form>
        <?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Documentos\Alura PHP\series\controle-series\resources\views/series/create.blade.php ENDPATH**/ ?>