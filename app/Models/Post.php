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
            $query
                ->where('title', 'like', '%'.request('search').'%')
                ->orWhere('body', 'like', '%'.request('search').'%');
        });
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
