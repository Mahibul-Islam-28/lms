<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowdBook extends Model
{
    protected $table = 'borrowd_books';
    protected $primaryKey = 'borrow_id';
    public $timestamps = false;
    use HasFactory;
}
