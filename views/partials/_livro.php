
 <div class="p-2 rounded border-stone-800 border-2 bg-stone-900">
     <div class="flex gap-2">
         <div class="w-1/3">
            <img src='<?= $livro->imagem?>' class="w-60 rounded">
         </div>

         <div class="flex flex-col gap-1">

             <a href="/livro?id=<?= $livro->id ?>" class="font-semebold hover:underline"><?= $livro->titulo ?></a>

             <div class="texte-xs italico"><?= $livro->autor ?></div>

             <div class="texte-xs italico"><?= str_repeat("⭐", $livro->nota_avaliacao) ?>(<?=$livro->count_avaliacoes?>Avaliação)</div>

         </div>
     </div>
     <div class="texte-sm mt-2">

         <?= $livro->descricao ?>

     </div>
 </div>