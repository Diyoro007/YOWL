<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class commentaire extends Model

{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(user::class);
    }

    protected $table = 'commentaire';
    protected $primaryKey = 'id';
    protected $fillable = [
        'commentaire_lien',
        'commentaire_contenu',
        'commentaire_like',
        'commentaire_dislike',
        'image_url',
        'title_url',
        'users_id'
    ];
}