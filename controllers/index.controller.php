<?php

$livros = Livro::all($_REQUEST['pesquisar'] ?? '');


view('index', ['livros' => $livros]); 
