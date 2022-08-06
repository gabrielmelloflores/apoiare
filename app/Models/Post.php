<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Para não realizar diversas sql no foreach
    protected $with = ['category', 'author'];
//    protected $guarded = ['id'];
//    protected $fillable = ['title', 'excerpt', 'body', 'category_id', 'slug'];

    public function scopeFilter($query, array $filters){ //Post::newQuery()->filter()
        //$query->where
        //if ($filters['search'] ?? false) { //mesma coisa que o isset
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            )
        );
        //}
//        dd($filters);
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
            $query->where('username', $author)
            )
        );
//            $query
//                ->whereExists(fn($query) =>
//                    $query->from('categories')
//                        ->whereColumn('categories.id', 'posts.category_id')
//                        ->where('categories.slug', $category)
//                )
//        );
    }
    public function comments(){
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Comment::class);
    }

    public function category(){
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author(){
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id');
    }
    //para que no web.php o {post} encontre pelo defenido nessa função no caso slug
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }
}
