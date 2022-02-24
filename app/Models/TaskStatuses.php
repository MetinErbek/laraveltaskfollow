<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskStatuses extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'taskstatuses';
    protected $softDelete = true;
    protected $fillable = ['status_name'];



}
