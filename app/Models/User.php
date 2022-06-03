<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'birth_date',
        'sex',
        'phone',
        'barangay',
        'password',
        'type',
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

  protected static function boot(){

        parent::boot();

        static::created(function($user){
            $user->profile()->create([
                'title' => $user->id,
            ]);
        });
    }
    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function name(){

        return ucwords(Auth::User()->first_name . ' ' . Auth::User()->last_name);
    }

    public function interests()
    {
        return $this->hasMany(Interest::class);
    }
    public function post()
    {
        return $this->hasMany(Post::class)
        ->latest();
    }

    public function getNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }
}
