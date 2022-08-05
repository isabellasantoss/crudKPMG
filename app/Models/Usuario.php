<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    
    protected $table = 'tb_cad_usuario';
    protected $primaryKey = 'cod_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
            'cod_matricula',
            'cod_cpf',
            'des_email',
            'flg_ativo'
        ];

    public function getFlgAtivoAttribute($flg_ativo)
    {
        return $flg_ativo == 'S' ? 'S' : 'N';
    }

    public function getUpdatedAtAttribute($dat_update) {
        if($dat_update)
            return Carbon::parse($dat_update)->format('d/m/Y H:i:s');
    }

    public function getCreatedAtAttribute($dat_cadastro) {
        if($dat_cadastro)
            return Carbon::parse($dat_cadastro)->format('d/m/Y H:i:s');
    }


}