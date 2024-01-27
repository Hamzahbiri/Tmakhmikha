<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomarticle','description','prix','imageart','categorieID'
        ];
        public function categories()
        {
        return $this->belongsTo(categorie::class,"categorieID");
        }

}
