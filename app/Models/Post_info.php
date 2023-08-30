<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_info extends Model
{
    use HasFactory;
    protected $table = 'post_info';
    protected $fillable = ['title','body','user_id'];
}
