<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    
    protected $table = 'posts';
    
    public function user () {
        return $this->belongsTo(User::class);
    }
    
    public function getPostDate () {
        $postData = $this->orderBy('created_at', 'DESC')->get();
        
        return $postData;
    }
    
}
