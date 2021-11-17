<?php $__env->startSection('cabecalho'); ?>
    Temporadas
<?php $__env->stopSection(); ?>
<?php $__env->startSection('conteudo'); ?>
     <ul class="list-group ">
         <?php $__currentLoopData = $temporadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temporada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <li class="list-group-item d-flex justify-content-between align-items-center">
                 <a href="/temporadas/<?php echo e($temporada->id); ?>/episodios">
                     Temporada <?php echo e($temporada->numero); ?>

                 </a>
                 <span class="badge bg-secondary">
                     <?php echo e($temporada->getEpisodiosAssistidos()->count()); ?> / <?php echo e($temporada->episodios->count()); ?>


                 </span>
             </li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Documentos\Alura PHP\series\controle-series\resources\views/temporadas/index.blade.php ENDPATH**/ ?>