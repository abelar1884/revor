<?php

namespace App\Modules\Classes;

use App\Models\Responsibility\Responsibility;

class ResponsEmloyee
{
    public static function employee()
    {
        $responses = Responsibility::where('division_id', 5)->get();

        foreach ($responses as $respons)
        {
            $respons->employee_id = rand(1,19);
            $respons->save();
        }

        return $responses;
    }
}