<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'tag',
        'text',
        'image',
        'dateCreateArticle',
        'timeReadArticle',
        'amountView',
        'user_id'
        ];

    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}

