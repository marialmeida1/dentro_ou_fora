<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Votacao extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'votacao';

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    public function candidatos(): BelongsToMany
    {
        return $this->belongsToMany(Candidato::class, 'candidato_votacao', 'votacao_id', 'candidato_id')->withPivot('pontos');
    }
}
