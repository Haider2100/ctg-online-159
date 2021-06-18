<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class Todocontroller extends Controller
{
    public function showtask()
    {
        $tasks = todo::all();
        return (compact('tasks'));
    }
}
