<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'Roles';
    protected $fillable = [
        'RoleName', 'Description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'UserRoles', 'RoleId', 'UserId');
    }
    use HasFactory;
}
