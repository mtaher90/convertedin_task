<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'assigned_by_id', 'id');
    }
}
