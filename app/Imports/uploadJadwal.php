<?php

namespace App\Imports;

use App\Models\Event;
use Maatwebsite\Excel\Concerns\ToModel;

class uploadJadwal implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $unixDate = ($row[3] - 25569) * 86400;
        $date =  gmdate("Y-m-d H:i:s", $unixDate);
        $unixDate2 = ($row[4] - 25569) * 86400;
        $date2 =  gmdate("Y-m-d H:i:s", $unixDate2);
        return new Event([
            'title'         => $row[0],
            'lantai'        => $row[1],
            'ruangan'       => $row[2],
            'start'         => $date,
            'end'           => $date2,
        ]);
    }
}
