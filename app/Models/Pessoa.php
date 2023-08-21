<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pessoa extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getPessoasEnviaEmail($email)
    {
        $retorno = DB::table('pessoas as p')
            ->select('p.id', 'p.nome', 'p.cpf', 'a.data_hora', 'p.email', 'p.hash')
            ->join('agendamentos as a', 'a.pessoa', 'p.id')
            ->where('p.email', $email)
            ->first();

        return $retorno;
    }
}
