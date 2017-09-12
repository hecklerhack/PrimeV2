<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'candidate_info';
    protected $timestamps = false;
}
