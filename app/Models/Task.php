<?php

namespace App\Models;

use App\Observers\TaskObserver;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель Task
 */
class Task extends Model
{
    protected $guarded = ['task_id', 'created_at', 'updated_at'];
    protected $primaryKey = 'task_id';

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
}
