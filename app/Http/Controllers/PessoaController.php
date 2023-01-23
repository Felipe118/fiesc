<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaRequest;
use Illuminate\Http\Request;

use App\Repository\PessoaRepository;

class PessoaController extends Controller
{
    protected $repository;

    public function __construct( PessoaRepository $repository )
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('pessoa.index');
    }

    public function getPessoas()
    {
        $pessoas = $this->repository->getAll();

        return $pessoas;
    }

    public function get()
    {
        return $this->repository->get();
    }

    public function store(PessoaRequest $request) 
    {
        $pessoa = $this->repository->store($request->all());

        if($pessoa){
            return response()->json(['message' => 'Pessoa cadastrada com sucesso']);
        }
       
    }

    public function getPessoa(Request $request)
    {
        //dd($request->id);
        $pessoa = $this->repository->getPessoa($request->id);

        return $pessoa;
    }

    public function update(PessoaRequest $request)
    {
       
        $pessoa = $this->repository->update($request->all());

        if($pessoa){
            return response()->json(['message' => 'Pessoa editada com sucesso']);
        }
        
    }

    public function delete(Request $request)
    {
        $pessoa = $this->repository->delete($request->id);

        if($pessoa){
            return response()->json(['message' => 'Pessoa deletada com sucesso']);
        }
    }
}
