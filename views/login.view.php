<div class="grid grid-cols-2">

    <div class="hero min-h-screen flex ml-40">
        <div class="hero-content">
            <div>
                <p class="py-2 text-xl -mg-20">
                    Bem vindo ao
                </p>
                <h1 class="text-6xl font-bold">LockBox</h1>
                <p class="pt-2 pb-4 text-xl">
                    Onde você guarda <span class="italic">tudo</span> com segurança.
                </p>
            </div>
        </div>
    </div>
    <div class="bg-white hero mr-40 min-h-screen text-black">
        <div class="hero-content -mt-20">
            <form method="POST" action="/login">

                <?php $validacoes = flash()->get('validacoes');?>

                <label class="form-control">

                    <div class="label">

                        <span class="label-text text-black">Email</span>

                    </div>

                    <input
                        type="text"
                        name="email"
                        class="input input-bordered w-full max-w-xs bg-white"
                        value="<?= old("email"); ?>" />

                    <?php if (isset($validacoes['email'])): ?>

                        <div class="label text-xs text-error"><?= $validacoes['email'][0] ?></div>

                    <?php endif ?>

                    <label class="form-control">

                        <div class="label">

                            <span class="label-text text-black">Senha</span>

                        </div>

                        <input
                            type="password"
                            name="senha"
                            class="input input-bordered w-full max-w-xs bg-white" 
                            />
                        <?php if (isset($validacoes['email'])): ?>

                            <div class="label text-xs text-error"><?= $validacoes['senha'][0] ?></div>

                        <?php endif ?>


                    </label>
                    <div class="card-actions">
                        <button class="btn btn-primary btn-block">Login</button>
                        <a href="/registrar" class="btn btn-link">Quero me registrar</a>
                    </div>
        </div>
    </div>
    </form>
</div>

</div>

</div>

<fieldset class="fieldset">
    <legend class="fieldset-legend">What is your name?</legend>
    <input type="text" class="input" placeholder="Type here" />
    <p class="label">Optional</p>
</fieldset>