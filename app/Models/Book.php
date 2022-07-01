<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function genre() {
        return $this->hasMany(Genre::class);
      }

      public function borrow() {
        return $this->hasMany(Borrow::class ,'book_id');
      }
    
      public function managedRequests() {
        return $this->hasMany(Borrow::class, 'request_managed_by');
      }
    
      public function managedReturns() {
        return $this->hasMany(Borrow::class, 'return_managed_by');
      }
}
