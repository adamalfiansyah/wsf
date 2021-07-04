<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table    = 'files';

    public function incrementViews(){
        $this->increment('views', 1);
    }

    public function incrementDownloads(){
        $this->increment('downloads');
    }

}
