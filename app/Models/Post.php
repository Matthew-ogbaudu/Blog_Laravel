<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
   // protected $fillable=['title','excerpt','body','category_id','slug'];
    protected $guarded=[];
    protected $with=['category','author'];
    public function scopeFilter($query, array $filter){
//        $posts = Post::latest();

        $query->when($filter['search'] ?? false, function($query,$search) {
//            $query->where('title', 'like', '%' . request('search') . '%')
//                ->orWhere('body', 'like', '%' . request('search') . '%');
            $query->where(fn($query)=>
            $query->where('title','like', '%'.$search. '%')
                ->orWhere('body', 'like','%'.$search.'%'));
        });
        $query->when($filter['category'] ?? false, function($query,$category) {
//            $query->where('title', 'like', '%' . request('search') . '%')
//                ->orWhere('body', 'like', '%' . request('search') . '%');
            $query->whereExists(fn($query)=>
                $query->from('categories')
                ->whereColumn('categories.id','posts.category_id')
                ->where('categories.slug',$category));
        });
        $query->when($filter['author'] ?? false, function($query,$author) {
//            $query->where('title', 'like', '%' . request('search') . '%')
//                ->orWhere('body', 'like', '%' . request('search') . '%');
            $query->whereHas('author', fn($query)=>
                $query->where('username', $author));
        });
    }
//    public function getRouteKeyName()
//{
//    return'slug';
//}
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        //laravel relation types hasoNE, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
      // return $this->belongsTo();
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
