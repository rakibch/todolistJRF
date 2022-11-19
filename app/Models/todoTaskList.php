<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todoTaskList extends Model
{
    use HasFactory;
    protected $table = 'todo_task';
    protected $fillable = [
        'categoryId',
        'todoTask',
    ];
}
