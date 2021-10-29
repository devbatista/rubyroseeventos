<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Agendamento extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getHorasInativas()
    {
        $retorno = DB::table('agendamentos')
            ->select('data_hora', DB::raw('count(*) as total'))
            ->groupBy('data_hora')
            ->get();

        return $retorno;
    }
}
