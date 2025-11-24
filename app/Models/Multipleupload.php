<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multipleupload extends Model
{
    protected $table = 'multipleuploads';

    protected $fillable = [
        'file',
        'ref_table',
        'ref_id'
    ];
}
