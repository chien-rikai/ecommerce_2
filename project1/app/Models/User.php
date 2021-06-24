<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;

    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function requests(){
        return $this->hasMany(ProductRequest::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded =[];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute(){
        return $this->last_name.' '.$this->first_name;
    }
    public static function findOrCreateUser($user)
    {
        $authUser = User::where('username', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'username'     => $user->id,
            'email'    => $user->email,
            'password'=> Hash::make($user->id)
        ]);
    }
    public static function countUsers(){
        $users = User::all()->count();
        return $users;
    }
}
