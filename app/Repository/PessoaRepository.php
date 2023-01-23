<?php

namespace App\Repository;

use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;

class PessoaRepository
{
   protected $entity;
   
   public function __construct(Pessoa $pessoa)
   {
        $this->entity = $pessoa;
   }

   public function store(array $date)
   {
      $this->entity->create([
         'nome' => $date['nome'],
         'cpf' => $date['cpf'],
         'endereco' => $date['endereco']
      ]);
   }

   public function getAll()
   {
      return DB::table('pessoas')->paginate(10);
   }

   public function get()
   {
      return $this->entity->get();
   }

   public function getPessoa($id)
   {
      $pessoa = $this->entity->where('id',$id)->get();

      return $pessoa;
   }

   public function update(array $date)
   {
      $pessoa = $this->entity->findOrFail($date['id']);
      $pessoa->update([
         'nome' => $date['nome'],
         'cpf' => $date['cpf'],
         'endereco' => $date['endereco']
      ]);

      return $pessoa;
   }

   public function delete($id)
   {
     
      return  $this->entity->where('id',$id)->delete();

   }


}
