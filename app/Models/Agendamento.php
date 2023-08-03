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

    public function getAgendamento($id)
    {
        $retorno = DB::table('agendamentos as a')
            ->select('a.id', 'p.nome', 'p.cpf', 'a.data_hora', 'a.used')
            ->join('pessoas as p', 'p.id', '=', 'a.pessoa')
            ->where('a.id', '=', $id)
            ->first();
        
        return $retorno;
    }

    public function getTotalAgendamentos()
    {
        
    }
}
