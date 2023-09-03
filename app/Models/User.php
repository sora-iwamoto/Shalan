<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'img_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function home () {
        return $this->hasOne(Home::class);  
    }
    
    public function mypage () {
        return $this->hasOne(MyPage::class);  
    }
    
    public function messages () {
        return $this->hasMany(Message::class);
    }
    
    public function getSearchUser ($name) {
        return $this->where('name', 'like', '%' . $name . '%')->where('name', '!=', auth()->user()->name)->get();
    }
    
    public function follows () {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'followed_user_id');
    }
    
    public function plans () {
        return $this->belongsToMany(Plan::class);
    }
}
