<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Follow;
use App\Models\Skychat;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /*protected $fillable = [
        'name',
        'email',
        'password',
    ];*/
    
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    
    public function likes(){
      return $this->hasMany(Like::class);
    }
    
    public function posts(){
      return $this->hasMany(Post::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'from_user_id', 'to_user_id');
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'to_user_id', 'from_user_id');
    }
    
    
    public function comments(){
      return $this->hasMany(Comment::class);
    }
    
    public function skychat(){
      return $this->hasMany(Skychat::class);
    }
}
