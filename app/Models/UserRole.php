<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'UserRoles';
    protected $fillable = [
        'UserId', 'RoleId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'RoleId');
    }
    use HasFactory;
}
