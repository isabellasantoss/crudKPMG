<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_cad_usuario')->insert([
            'cod_matricula' => Str::random(6),
            'cod_cpf' => 10768236718,
            'des_email' => Str::random(11) . '@outlook.com',
            'flg_ativo' => 'S',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
