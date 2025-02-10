<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class UserCatalogue extends Model
{
    use HasFactory, QueryScopes, SoftDeletes, Notifiable;

    protected $table = 'user_catalogues';

    protected $fillable = [
        'id',
        'phone',
        'email',
        'publish'
    ];

    public function users() {
        return $this->hasMany(User::class, 'user_catalogue_id', 'id');
    }

    public function languages() {
        return $this->belongsToMany(Language::class, 'user_catalogue_languages', 'user_catalogue_id', 'language_id')->withPivot('name', 'description');
    }
}
