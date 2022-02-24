<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TaskStatuses;

class Tasks extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tasks';
    protected $softDelete = true;
    protected $fillable = [
      'task_status_id',
      'taskdetails',
      'task'
    ];

    public function status()
    {
      return $this->belongsTo(TaskStatuses::class, 'task_status_id');
    }

    public function scopeWithFilter($query, $param = NULL)
    {
      if(isset($param)){extract($param);}
      $conditions = [];
      if(isset($status_filter) && !empty($status_filter))
      {
        $conditions[] = ['task_status_id', '=', $status_filter];
      }
      return $query->where($conditions);

    }

}
