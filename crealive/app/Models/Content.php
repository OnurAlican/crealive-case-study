<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = "contents";

    protected $fillable = [
        'categoryId',
        'content',
        'isActive',
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','categoryId');
    }
}
