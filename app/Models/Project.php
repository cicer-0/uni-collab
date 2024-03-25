<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'Projects';
    protected $fillable = [
        'UserId', 'ProjectName', 'Status', 'ProjectOwner', 'Faculty', 'ResearchArea', 'ResearchLine', 'NumMembers', 'Description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    public function form()
    {
        return $this->hasOne(Form::class, 'ProjectId');
    }

    public function requests()
    {
        return $this->hasMany(Request::class, 'ProjectId');
    }

    use HasFactory;
}
