<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Candidato extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'candidato';

    protected $casts = [
        'datahora_inicio' => 'datetime:Y-m-d H:i',
        'datahora_fim' => 'datetime:Y-m-d H:i',
    ];

    public function votacoes(): BelongsToMany
    {
        return $this->belongsToMany(Votacao::class, 'candidato_votacao', 'candidato_id', 'votacao_id')->withPivot('pontos');;
    }

    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class, 'categoria_candidato', 'candidato_id', 'categoria_id');
    }
}
