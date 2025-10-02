<?php

namespace App\Models;

use App\Http\Controllers\TaskController;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable =[
      'title',
      'is_completed'   
    ];
}
