<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ittango extends Model
{
        /**
     * テーブルの主キー
     *
     * @var string
     */
    protected $primaryKey = 'tango_id';
    use HasFactory;
}
