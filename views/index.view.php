            <form class="w-full fex space-x-2 mt-6">

                <input
                    type="texte"
                    class="border-stone-800 border-2 roudend-md bg-stone-900 text-sm focus:outline-none px-2 py-1"
                    placeholder="Pesquisar..."
                    name="pesquisar" />

                <button type="submit">🔎</button>

            </form>

            <section class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

                <?php foreach ($livros as $livro) {

                    require 'partials/_livro.php';
                } ?>

            </section>