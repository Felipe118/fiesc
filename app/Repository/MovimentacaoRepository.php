<?php

namespace App\Repository;

use App\Models\Movimentacao;
use Illuminate\Support\Facades\DB;

class MovimentacaoRepository
{
   protected $entity;
   
   public function __construct(Movimentacao $movimentacao)
   {
        $this->entity = $movimentacao;
   }

   public function getMovimentacao($conta_id)
   {
        return $this->entity->where('conta_id',$conta_id)->with('conta')->get();
   }

   public function store(array $date)
   {
     $movimentacao = $this->entity->create([
          'pessoa_id' => $date['pessoa_id'],
          'conta_id' => $date['conta_id'],
          'valor' => $date['valor'],
          'opcao' => $date['opcao']
     ]);

     return $movimentacao;
   }

   public function totalValor($conta_id)
   {
     $movimentacoes = $this->entity->where('conta_id',$conta_id)->get();
     // dd($movimentacoes->isEmpty());

     $saldoDepositar = [];

     $saldoRetirada = [];
     if(count($movimentacoes) > 1){
          foreach($movimentacoes as $m){
               if($m->opcao == 'depositar'){
                    $saldoDepositar[] = $m->valor;
               }else{
                    $saldoRetirada[] = $m->valor;
               }
          }
          $totalDeposito = array_sum($saldoDepositar);
          $totalRetirar = array_sum($saldoRetirada);

          $saldoTotal = $totalDeposito - $totalRetirar;
          return $saldoTotal;
     }else{
          if(!$movimentacoes->isEmpty()){
               $totalSaldo = $movimentacoes[0]->valor;
          }else{
               $totalSaldo = 0;
          }

          return $totalSaldo;
     }
     //$saldoRetirar = [];

   }

   public function get($conta_id)
   {
          return $this->entity->where('conta_id' , $conta_id)->get();
   }

  


}
