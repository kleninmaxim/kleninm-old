<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\DeletedModels\Models\Concerns\KeepsDeletedModels;

class Portfolio extends Model
{
    use KeepsDeletedModels, HasFactory;

    protected $guarded = [];
}
