<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{

    use HasFactory;


    protected $guard = 'default';
    protected $tables = 'reservasis';
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
            'reservationdate',
            'reservationstart',
            'reservationend',
            'organization',
            'eventname',
            'eventcategory',
            'eventdescription',
            'status',
    ];

    public function setdate($value){
        $this->attributes['reservationdate'] = Carbon::createFromFormat('d/m/Y',$value)->format('Y-m-d');
    }
    
    // public function settimestart($value){
    //     $this->attributes['reservationstart'] = Carbon::createFromFormat('H:i',$value)->format('H:i:s');
    // }
    // public function settimeend($value){
    //     $this->attributes['reservationend'] = Carbon::createFromFormat('H:i',$value)->format('H:i:s');
    // }

}
