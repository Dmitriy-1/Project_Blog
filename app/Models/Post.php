<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

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
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}

