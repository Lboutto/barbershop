<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
		'type', 'name', 'description', 'price', 'worker_id'
		];
}
