<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $fillable = [
      'reader_id',
      'book_id',
       'status',
       'deadline',
  ];

    public function book() 
    {
        return $this->belongsTo(Book::class , 'id');
      }

      public function reader() {
        return $this->belongsTo(User::class,'id');
      }
    
      public function managedRequestsbyOne() {
        return $this->belongsTo(User::class);
      }

      public function managedReturnsbyOne() {
        return $this->belongsTo(User::class);
      }
}
