<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'plan_reference',
        'first_name',
        'last_name',
        'investment_house',
        'last_operation',
        'staff_user_id',  // Foreign key for the staff user
    ];

    /**
     * Define the relationship: A policy belongs to a staff user.
     */
    public function staffUser()
    {
        return $this->belongsTo(User::class, 'staff_user_id');
    }
}
