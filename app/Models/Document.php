<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable=['full_name','address','account_no','file'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
