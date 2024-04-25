<?php

namespace App\Models\Emus;

enum TypeUploadImage: string
{
    case inicio = 'inicio';
    case comentari = 'comentario';
    case final = 'final';
}
