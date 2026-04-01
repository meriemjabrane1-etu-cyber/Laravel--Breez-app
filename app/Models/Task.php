<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     protected $fillable = [
        'title',
        'description',
        'assigned_to',
        'created_by',
        'status'
    ];

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'assigned_to');
    // }
    // public function creator()
    // {
    //     return $this->belongsTo(User::class, 'created_by');
    // }
}
