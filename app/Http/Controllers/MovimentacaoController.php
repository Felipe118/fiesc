<?php

namespace App\Http\Controllers;
use App\Repository\MovimentacaoRepository;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    protected $repository;

    public function __construct(MovimentacaoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('movimentacao.index');
    }

    public function getMovimentacao(Request $request)
    {
        return $this->repository->getMovimentacao($request->conta_id);
    }

    public function store(Request $request)
    {
        $movimentacao = $this->repository->store($request->all());

        if($movimentacao){
            return response()->json(['message' => 'Movimentação feita com sucesso']);
        }
    }

    public function totalSaldo(Request $request)
    {
        return $this->repository->totalValor($request->conta_id);
    }

    public function get(Request $request)
    {
        return $this->repository->get($request->conta_id);
    }

    
}
