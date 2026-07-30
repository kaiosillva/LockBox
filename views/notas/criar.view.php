        <?php $validacoes = flash()->get('validacoes'); ?>

        <div class="menu bg-base-300 rounded-l-box w-56 ">
            <div class="bg-base-200 p-4 rounded-tl-box">
                + Nova Nota

            </div>

        </div>


        <div class="bg-base-200 rounded-r-box w-full p-10 flex flex-col space-y-6">
            <form action="/notas/criar" method="post" class="flex flex-col space-y-6">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Título</span>
                    </div>

                    <input
                        name="titulo"
                        type="text"
                        class="input input-bordered w-full" />

                    <?php if (isset($validacoes['titulo'])): ?>

                        <div class="label text-xs text-error"><?= $validacoes['titulo'][0] ?? '' ?></div>

                    <?php endif ?>
                </label>
                <label class="form-control">

                    <div class="label">
                        <span class="label-text">Sua nota</span>
                    </div>

                    <textarea class="textarea textarea-bordered h-24" name="nota"></textarea>
                    <?php if (isset($validacoes['nota'])): ?>

                        <div class="label text-xs text-error"><?= $validacoes['nota'][0] ?? '' ?></div>

                    <?php endif ?>

                </label>

                <div class="flex justify-end items-center">
                    <button class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>