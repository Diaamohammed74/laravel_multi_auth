<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Notifications\AdminPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class Admin extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminPasswordNotification($token, $this->email));
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'photo',
        'password',
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
    public function getIdAttribute($value)
    {
        return $value == 2 ? 'This Value From Model getIdAttribute method' : $value;
    }
    // protected static function boot()
    // {
    //     parent::boot();
    //     static::created(function ($model) {
    //         static::uploadPhoto($model);
    //         $model->save();
    //     });
    //     static::deleted(function ($model) {
    //         static::deletePhoto($model);
    //     });
    // }
    // public static function uploadPhoto($model)
    // {
    //     if (request()->hasFile('photo')) {
    //         //delete in case of update 
    //         // static::deletePhoto($model);
    //         // $model->photo = request()->file('photo')->store('public/images');
    //     }
    // }
    //     public static function deletePhoto($model)
    //     {
    //         // if (!empty($model->photo) && Storage::exists($model->photo)) {
    //         //     Storage::delete($model->photo);
    //         // }
    //     }
}