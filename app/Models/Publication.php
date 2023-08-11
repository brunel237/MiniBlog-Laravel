<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    public function getPublication($id, $order=0){
        if ($order)
            return Publication::where('publication_id', $id)->latest()->first();
        else
            return Publication::where('publication_id', $id)->first();
    }
    public function setPublication($user_id, $publication){
        $pub = new Publication([
            'user_id' => $user_id,
            'comment' => $publication
        ]);
        $pub->save();
    }
    
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'comment',
    ];
}
