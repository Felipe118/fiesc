<?php

namespace App\Repository;

use App\Models\Conta;
use Illuminate\Support\Facades\DB;

class ContaRepository
{
   protected $entity;
   
   public function __construct(Conta $conta)
   {
        $this->entity = $conta;
   }

   public function store(array $date)
   {
      $conta = $this->entity->create([
            'pessoa_id' => $date['pessoa_id'],
            'numero_conta' => $date['numero_conta'] 
      ]);   

      return $conta;
   }

   public function getContaPessoa()
   {
      return $this->entity->with('pessoa')->get();
   }

   public function getContaPessoaUnique($id)
   {
     
      return $this->entity->where('pessoa_id',$id)->with('pessoa')->get();
   }

   public function getConta($id)
   {
      return $this->entity->where('id',$id)->get();
   }

   public function update(array $date)
   {
      $conta = $this->entity->findOrFail($date['id']);
      $conta->update([
         'numero_conta' => $date['numero_conta'],
         'pessoa_id' => $date['pessoa_id']
      ]);
      return $conta;
   }

   public function delete($id)
   {
     return  $this->entity->where('id',$id)->delete();
   }

   


}
