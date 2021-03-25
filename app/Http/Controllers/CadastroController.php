<?php
namespace App\Http\Controllers;

use App\Curriculo;
use App\Funcao;
use App\Formacao;

use Response;

use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon; // tratamento de datas

use App\Rules\Cpf; // validação de um cpf

use Illuminate\Support\Facades\Redirect; // para poder usar o redirect

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(403, 'Acesso negado.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('cadastros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'cpf' => 'required',
            'cpf' => new Cpf,

            'email' => 'required',
            'cel1' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',

           
            'declaro1' => 'required',

            'arquivo.*' => 'required|mimes:pdf,doc,rtf,txt,jpg,jpeg,png|max:5120',

        ],
        [
            'nome.required' => 'O nome do candidato é obrigatório',

            'cpf.required' => 'O CPF do candidato é obrigatório',

            'email.required' => 'O e-mail do candidato é obrigatório',
            'cel1.required' => 'É obrigatório digitar um número de celular para contato',



            'declaro1.required' => 'Você precisa aceitar as condições exigidas de acordo com o edital clicando na caixa acima',

            'arquivo.*.required' => 'Esse anexo é requerido para essa inscrição',
            'arquivo.*.mimes' => 'O arquivo anexado deve ser das seguintes extensões: pdf',
            'arquivo.*.max' => 'O arquivo anexado não pode ter mais de 5MB',
        ]);


         $input = $request->all();


        // geração de uma string aleatória de tamanho configurável
        function generateRandomString($length = 10) {
            return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
        }


        // ajusta no nome e cpf para que seja usado no nome do arquivo
        $nome = str_replace(' ', '-', $input['entidade']);
        $nome = preg_replace('/[^A-Za-z0-9\-]/', '', $nome);
        $cpf = preg_replace('/[^0-9]/', '', $input['cpf']);

        $local = generateRandomString(20);
        if ($request->hasFile('arquivo1') && $request->file('arquivo1')->isValid()) {            
            $nome_arquivo =  $nome . '-' . $cpf . '-experiencia.' . $request->arquivo1->extension();
            $path = $request->file('arquivo1')->storeAs($local, $nome_arquivo, 'public');
            $url = asset('storage/' . $local . '/' . $nome_arquivo);            
            $input['arquivo1Nome'] =  $nome_arquivo;  
            $input['arquivo1Local'] =  $local;  
            $input['arquivo1Url'] =  $url;
        }

        /*

$files = $request->file('attachment');

if($request->hasFile('attachment'))
{
    foreach ($files as $file) {
        $file->store('users/' . $this->user->id . '/messages');
    }
}
        */

        $newcurriculo = Curriculo::create($input); //salva

        return view('cadastros.recibo', compact('newcurriculo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(403, 'Acesso negado.');
    }
}
