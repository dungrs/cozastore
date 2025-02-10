<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasApiTokens, HasFactory, Notifiable, QueryScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'languages';

    protected $fillable = [
        'name',
        'canonical',
        'image',
        'description',
        'publish',
        'current'
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'user_languges')->withPivot('name', 'address', 'description');
    }

    public function user_catalogues() {
        return $this->belongsToMany(UserCatalogue::class, 'user_catalogue_languages')->withPivot('name', 'description');
    }

    public function languageable()
    {
        return $this->morphTo();
    }
}
