<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dealer extends Model
{
    use HasFactory;
    protected $fillable = ['kode','nama','jenis'];
    protected $table = 'dealer';
    public $timestamps = false;
}
