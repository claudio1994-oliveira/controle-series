        <?php $__env->startSection('cabecalho'); ?>
            Séries
        <?php $__env->stopSection(); ?>
    <?php $__env->startSection('conteudo'); ?>
        <?php echo $__env->make('mensagem', ['mensagem'=> $mensagem], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(auth()->guard()->check()): ?>
    <a href="<?php echo e(route('form_criar_serie')); ?>" class="btn btn-dark mb-2">Adicionar</a>
    <?php endif; ?>
    <ul class="list-group">
         <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="list-group-item d-flex justify-content-between">
              <span id="nome-serie-<?php echo e($serie->id); ?>"><?php echo e($serie->nome); ?></span>
              <div class="input-group w-50" hidden id="input-nome-serie-<?php echo e($serie->id); ?>">
                  <input type="text" class="form-control" value="<?php echo e($serie->nome); ?>">
                      <div class="input-group-append">
                          <button class="btn btn-primary" onclick="editarSerie(<?php echo e($serie->id); ?>)">
                              <i class="bi bi-check"></i>
                          </button>
                          <?php echo csrf_field(); ?>
                      </div>
              </div>
             <form method="post" action="series/<?php echo e($serie->id); ?>" onsubmit="return confirm('Tem certeza?')">
                 <?php echo csrf_field(); ?>
                 <?php echo method_field('DELETE'); ?>

              <span>
                  <?php if(auth()->guard()->check()): ?>
                  <a class="btn btn-info btn-sm" onclick="toggleInput(<?php echo e($serie->id); ?>)"><i class="bi bi-pencil"></i></a>
                  <?php endif; ?>
                  <a href="/series/<?php echo e($serie->id); ?>/temporadas" class="btn btn-info btn-sm"><i class="bi bi-arrow-90deg-up"></i></a>
                   <?php if(auth()->guard()->check()): ?>
                  <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                      <?php endif; ?>
              </span>
             </form>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </li>
    </ul>
        <script>
            function toggleInput(serieId) {
                const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
                const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
                if (nomeSerieEl.hasAttribute('hidden')) {
                    nomeSerieEl.removeAttribute('hidden');
                    inputSerieEl.hidden = true;
                } else {
                    inputSerieEl.removeAttribute('hidden');
                    nomeSerieEl.hidden = true;
                }
            }

            function editarSerie(serieId) {
                let formData = new FormData();
                const nome = document
                    .querySelector(`#input-nome-serie-${serieId} > input`)
                    .value;
                const token = document
                    .querySelector(`input[name="_token"]`)
                    .value;
                formData.append('nome', nome);
                formData.append('_token', token);
                const url = `/series/${serieId}/editaNome`;
                fetch(url, {
                    method: 'POST',
                    body: formData
                }).then(() => {
                    toggleInput(serieId);
                    document.getElementById(`nome-serie-${serieId}`).textContent = nome;
                });
            }
        </script>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\claud\OneDrive\Documentos\Alura PHP\series\controle-series\resources\views/series/index.blade.php ENDPATH**/ ?>