<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    const ID = 'id';
    const NAME = 'name';
    const TABLE = 'movement';

    protected $table = self::TABLE;
    protected $fillable = [
        self::NAME,
    ];

    public function personal_record()
    {
        $this->hasMany(PersonalRecord::class);
    }
}
