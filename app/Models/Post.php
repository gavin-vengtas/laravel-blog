<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Isset_;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category','author'];

    public function scopeFilter($query, array $filters) //Post:newQuery()->filter()
    {
        $query->when(isset($filters['search']), function($query, $search) {
            $query->where(function($query){
                $query
                    ->where('title', 'like', '%'.request('search').'%')
                    ->orWhere('body', 'like', '%'.request('search').'%');
            });
                
        });

        $query->when(isset($filters['category']), function($query){
            $query->whereHas('category', function($query){
                $query->where('slug',request('category'));
            });
        });

        $query->when(isset($filters['author']), function($query){
            $query->whereHas('author', function($query){
                $query->where('username',request('author'));
            });
        });
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
