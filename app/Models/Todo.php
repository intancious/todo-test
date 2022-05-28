<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Todo extends Model
{
    use HasFactory;
    protected $table = 'todo';
    public $primaryKey = "id_todo";
    protected $fillable = [
        'nama_todo', 'status'
    ];

    public function getTodo()
    {
        $return = DB::table('todo');
        return $return;
    }
}
