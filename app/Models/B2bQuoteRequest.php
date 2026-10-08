<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class B2bQuoteRequest extends Model
{
    use HasFactory;

    protected $table = 'b2b_quote_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'company_name',
        'phone',
        'email',
        'gstin',
        'rice_variety',
        'quantity',
        'packaging_type',
        'delivery_pincode',
        'delivery_city',
        'notes',
        'status',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'pending',
    ];
}
