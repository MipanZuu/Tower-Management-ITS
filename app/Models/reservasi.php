<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{

    use HasFactory;


    protected $guard = 'default';
    protected $primaryKey = 'reservationid';

    protected $fillable = [
            'fullname',
            'reserverid',
            'contactnumber',
            'email',
            'mainpicposition',
            'mainpicname',
            'secondpicposition',
            'secondpicname',
            'roomname',
            'reservation',
            'reservationstart',
            'reservationend',
            'organization',
            'eventname',
            'eventcategory',
            'eventdescription',
            'status',
    ];

}
