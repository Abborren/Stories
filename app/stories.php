<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stories extends Model
{
    protected $fillable = ['body'];

    /**
     * Figuers out the next id in the table.
     */
    public function getNextId() 
    {
        $statement = DB::select("show table status like 'stories'");
        return $statement[0]->Auto_increment;
    }
}
