<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use HasFactory;

    // private $guarded = [
    //     'id',
    //     'create_at',
    //     'update_at'
    // ];
    private $fillable = [
        'titulo',
        'corpo',
        'data_publicacao'
    ];
}
