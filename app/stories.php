<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stories extends Model
{

    public function getNextId() 
    {
        $statement = DB::select("show table status like 'stories'");
        return $statement[0]->Auto_increment;
    }
}
