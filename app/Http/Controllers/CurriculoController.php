<?php

namespace App\Http\Controllers;

use App\Curriculo;
use App\Anexo;
use App\Funcao;
use App\Formacao;

use App\Perpage;


use Response;

use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon; // tratamento de datas

use Illuminate\Support\Facades\Redirect; // para poder usar o redirect

class CurriculoController extends Controller
{
    protected $pdf;

    /**
     * Construtor.
     *
     * precisa estar logado ao sistema
     * precisa ter a conta ativa (access)
     *
     * @return 
     */
    public function __construct(\App\Reports\CurriculoReport $pdf)
    {
        $this->middleware(['middleware' => 'auth']);
        $this->middleware(['middleware' => 'hasaccess']);

        $this->pdf = $pdf;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$curriculos = new Curriculo;

        // filtros

        if (request()->has('codigo')){
            if (request('codigo') != ""){
                $curriculos = $curriculos->where('id', '=', request('codigo'));
            }
        }

        if (request()->has('entidade')){
            $curriculos = $curriculos->where('entidade', 'like', '%' . request('entidade') . '%');
        }


        // ordena
        $curriculos = $curriculos->orderBy('id', 'desc');

        // se a requisição tiver um novo valor para a quantidade
        // de páginas por visualização ele altera aqui
        if(request()->has('perpage')) {
            session(['perPage' => request('perpage')]);
        }

        // consulta a tabela perpage para ter a lista de
        // quantidades de paginação
        $perpages = Perpage::orderBy('valor')->get();

        // paginação
        $curriculos = $curriculos->paginate(session('perPage', '5'))->appends([          
            'codigo' => request('codigo'),
            'entidade' => request('entidade'),    
            ]);


        return view('curriculos.index', compact('curriculos', 'perpages'));
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curriculo = Curriculo::findOrFail($id);

        $anexos = Anexo::where('curriculo_id', '=', $id)->orderBy('id', 'asc')->get();

        return view('curriculos.show', compact('curriculo', 'anexos'));
    }

        /**
     * Exportação para planilha (csv)
     *
     * @param  int  $id
     * @return Response::stream()
     */
    public function exportcsv()
    {

       $headers = [
                'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
            ,   'Content-type'        => 'text/csv; charset=UTF-8'
            ,   'Content-Disposition' => 'attachment; filename=cadastros_' .  date("Y-m-d H:i:s") . '.csv'
            ,   'Expires'             => '0'
            ,   'Pragma'              => 'public'
        ];

        $curriculos = DB::table('curriculos');

        //joins

        $curriculos = $curriculos->select(
            'curriculos.id as codigo', 
            DB::raw('DATE_FORMAT(curriculos.created_at, \'%d/%m/%Y\') AS data_cadastro'), 
            DB::raw('DATE_FORMAT(curriculos.created_at, \'%H:%i\') AS hora_cadastro'),
            'curriculos.entidade',
            'curriculos.cnpj',
            'curriculos.representante',
            'curriculos.cpf',
            'curriculos.email',
            'curriculos.cel1',
            'curriculos.cel2',
            'curriculos.cep',
            'curriculos.logradouro',
            'curriculos.numero',
            'curriculos.complemento',
            'curriculos.bairro',
            'curriculos.cidade',
            'curriculos.uf',
       

        );

        if (request()->has('codigo')){
            if (request('codigo') != ""){
                $curriculos = $curriculos->where('curriculos.id', '=', request('codigo'));
            }
        }

        if (request()->has('entidade')){
            $curriculos = $curriculos->where('curriculos.entidade', 'like', '%' . request('entidade') . '%');
        }

        if (request()->has('funcao_id')){
            if (request('funcao_id') != ""){
                $curriculos = $curriculos->where('curriculos.funcao_id', '=', request('funcao_id'));
            }
        } 

        $curriculos = $curriculos->orderBy('curriculos.id', 'asc');

        $list = $curriculos->get()->toArray();

        # converte os objetos para uma array
        $list = json_decode(json_encode($list), true);

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

       $callback = function() use ($list)
        {
            $FH = fopen('php://output', 'w');
            fputs($FH, $bom = ( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
            foreach ($list as $row) {
                fputcsv($FH, $row, chr(59));
            }
            fclose($FH);
        };

        return Response::stream($callback, 200, $headers);
    } 
  
}
