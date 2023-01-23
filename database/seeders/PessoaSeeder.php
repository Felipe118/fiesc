<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pessoas')->insert(['nome' => 'Luis Felipe', 'cpf' => '12354669190', 'endereco' => 'Rua 3 Lote 4 Teste','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('pessoas')->insert(['nome' => 'João', 'cpf' => '32165498778', 'endereco' => 'Rua 3 Lote 4 Teste','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('pessoas')->insert(['nome' => 'Maria', 'cpf' => '55555555555', 'endereco' => 'Rua 3 Lote 4 Teste','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('pessoas')->insert(['nome' => 'Joana', 'cpf' => '111111111111', 'endereco' => 'Rua 3 Lote 4 Teste','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('pessoas')->insert(['nome' => 'Marcos', 'cpf' => '44444444444', 'endereco' => 'Rua 3 Lote 4 Teste','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('pessoas')->insert(['nome' => 'Lucio', 'cpf' => '77777777777', 'endereco' => 'Rua 3 Lote 4 Teste','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
        DB::table('pessoas')->insert(['nome' => 'Isa', 'cpf' => '88888888888', 'endereco' => 'Rua 3 Lote 4 Teste','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);

    }
}
