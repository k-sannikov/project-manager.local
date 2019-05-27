<?php

namespace App\Models;

use App\Observers\TaskObserver;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель Task
 */
class Task extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $primaryKey = 'task_id';

    public function users()
    {
        return $this->belongsTo('App\Model\User', 'user_id', 'user_id');
    }

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $events = [
        'updated' => TaskObserver::class,
    ];
}
