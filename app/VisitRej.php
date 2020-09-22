<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitRej extends Model
{
    protected $table = 'visit_agreement_reject';
    protected $fillable = ['id', 'cid', 'staff_cid', 'created_at', 'updated_at'];
}
