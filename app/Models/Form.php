<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'Forms';

    protected $fillable = [
        'ProjectId', 'MicrosoftFormLink',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'ProjectId');
    }
    use HasFactory;
}
