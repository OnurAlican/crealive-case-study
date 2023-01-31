<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\isEmpty;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        'categoryName',
        'isActive',
        'slug',
        'parentId'
    ];
    public function subcategory()
    {
        return $this->hasMany(\App\Models\Category::class, 'parentId');
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Category::class, 'parentId');
    }

    public static function tree(){
        $allCategories=Category::get();
        $rootCategories=$allCategories->whereNull('parentId');

        self::formatTree($rootCategories,$allCategories);
        return $rootCategories;
    }

    private static function formatTree($categories, $allCategories){
        foreach ($categories as $category){
            $category->children=$allCategories->where('parentId',$category->id)->values();

            if(!$category->children>isEmpty()){
                self::formatTree($category->children,$allCategories);
            }

            foreach ($category->children as $child){
                $child->children=$allCategories->where('parentId',$child->id)->values();
            }
        }

    }
}
