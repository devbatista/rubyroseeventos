<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PessoaMelu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pessoas_melu';

    public function getPessoasEnviaEmail($email)
    {
        $retorno = DB::table('pessoas_melu as p')
            ->select('p.id', 'p.nome', 'p.cpf', 'a.data_hora', 'p.email')
            ->join('agendamentos_melu as a', 'a.pessoa', 'p.id')
            ->where('p.email', $email)
            ->first();

        return $retorno;
    }
}
