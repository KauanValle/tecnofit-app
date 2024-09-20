<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalRecord extends Model
{
    use HasFactory;

    const ID = 'id';
    const USER_ID = 'user_id';
    const MOVEMENT_ID = 'movement_id';
    const VALUE = 'value';
    const DATE = 'date';
    const TABLE = 'personal_records';

    protected $table = self::TABLE;
    protected $fillable = [
        self::USER_ID,
        self::MOVEMENT_ID,
        self::VALUE,
        self::DATE,
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function movement()
    {
        return $this->belongsTo(Movement::class);
    }
}
