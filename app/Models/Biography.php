<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    protected $table = 'biographie';
    protected $fillable = ['membre_id', 'contenu'];
    public function membre()
    {
        return $this->belongsTo(Membre::class);
    }
}
