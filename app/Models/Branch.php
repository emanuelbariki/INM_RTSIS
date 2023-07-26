<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'postal_code',
        'region',
        'district',
        'ward',
        'street',
        'house_number',
        'reporting_date',
        'branch_name',
        'tax_identification_number',
        'business_license',
        'branch_code',
        'qefsr_code',
        'gps_coordinates',
        'banking_services',
        'mobile_money_services',
        'registration_date', 'branch_status',
        'closure_date',
        'contact_person',
        'telephone_number',
        'alt_telephone_number',
        'branch_category'
    ];
}
