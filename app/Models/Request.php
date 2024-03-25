<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'Requests';
    protected $fillable = [
        'ProjectId', 'UserId', 'RequestStatus',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'ProjectId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }
    use HasFactory;
}
