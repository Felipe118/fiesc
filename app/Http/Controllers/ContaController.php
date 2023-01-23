<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use Illuminate\Http\Request;
use App\Repository\ContaRepository;

class ContaController extends Controller
{
    protected $repository;

    public function __construct(ContaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('conta.index');
    }

    public function store(ContaRequest $request)
    {
        $conta = $this->repository->store($request->all());

        if($conta){
            return response()->json(['Conta cadastrada com sucesso']);
        }
    }

    public function getContaPessoa()
    {
        return $this->repository->getContaPessoa();
    }

    public function getConta(Request $request)
    {
        return $this->repository->getConta($request->id);
    }

    public function update(ContaRequest $request)
    {
        $conta = $this->repository->update($request->all());

        if($conta){
            return response()->json(['message' => 'Numero da conta editada com sucesso']);
        }
    }

    public function delete(Request $request)
    {
        $conta = $this->repository->delete($request->id);

        if($conta){
            return response()->json(['message' => 'A conta foi deletada com sucesso']);
        }
    }

    public function getContaUnique(Request $request)
    {
        return $this->repository->getContaPessoaUnique($request->id);
    }
}
