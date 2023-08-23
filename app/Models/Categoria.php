<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categoria';

    public function votacoes(): HasMany
    {
        return $this->hasMany(Votacao::class, 'categoria_id', 'id');
    }

    public function candidatos(): BelongsToMany
    {
        return $this->belongsToMany(Candidato::class, 'categoria_candidato', 'categoria_id', 'candidato_id');
    }
}
