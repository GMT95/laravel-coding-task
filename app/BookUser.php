<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    protected $table = 'book_user';

    protected $fillable = ['user_id', 'book_id'];
}
