<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Share;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function likes(){
      return $this->hasMany(Like::class);
    }
    
    public function user(){
      return $this->belongsTo(User::class);
    }
    
    public function category(){
      return $this->belongsTo(Category::class);
    }
    
    public function comments(){
      return $this->hasMany(Comment::class);
    }
    
    public function shares(){
      return $this->hasMany(Share::class);
    }
}
