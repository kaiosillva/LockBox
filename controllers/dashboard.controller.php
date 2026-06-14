<?php

if (!auth()) {
    header('location: /login');
    exit();
}

echo auth()->nome;