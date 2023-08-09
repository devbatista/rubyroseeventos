<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AgendamentoMelu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'agendamentos_melu';

    public function getHorasInativas()
    {
        $retorno = DB::table('agendamentos_melu')
            ->select('data_hora', DB::raw('count(*) as total'))
            ->groupBy('data_hora')
            ->get();

        return $retorno;
    }

    public function getAgendamento($id)
    {
        $retorno = DB::table('agendamentos_melu as am')
            ->select('am.id', 'am.pessoa', 'p.nome', 'p.cpf', 'am.data_hora', 'am.used')
            ->join('pessoas_melu as p', 'p.id', '=', 'am.pessoa')
            ->where('am.id', '=', $id)
            ->first();
        
        return $retorno;
    }

    public function getTotalAgendamentos()
    {
        
    }
}
