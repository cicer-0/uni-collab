<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='Users';
    protected $fillable = [
        'Username', 'Password', 'Email', 'DateCreated',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'UserRoles', 'UserId', 'RoleId');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'UserId');
    }

    public function requests()
    {
        return $this->hasMany(Request::class, 'UserId');
    }
    use HasFactory;
}
