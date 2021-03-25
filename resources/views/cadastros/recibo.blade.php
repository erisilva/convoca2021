@extends('layouts.clear')

@section('content')


<div class="container">


  <div class="jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="text-center">
            <img class="img-fluid" src="http://www.contagem.mg.gov.br/novoportal/images/brasao_provisorio.png">
          </div>  
        </div>
        <div class="col-md-8">
            <h3>Prefeitura Municipal de Contagem</h3>
            <h4>Secretaria Municipal de Saúde</h4>
            <p class="lead">Convocação de Entidades de Saúde para Qualificação como Organizações Sociais de Saúde</p>
            <hr class="my-4">
            <p>Gestão de Equipamentos de Saúde Sus</p>
            <p>Unidades de Pronto Atendimento de Hospitais</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <h1>Sua inscrição foi recebida com sucesso.</h1>
    <h2>Número da inscrição <strong>{{ $newcurriculo->id }}</strong></h2>
    <hr class="my-4">
    <p class="lead">Entidade: {{ $newcurriculo->entidade }}</p>
    <p class="lead">CNPJ: {{ $newcurriculo->cnpj }}</p>
    <hr class="my-4">
    <h3>Representante: {{ $newcurriculo->representante }}</h3>
    <hr class="my-4"> 
  </div>

  <div class="container">
    <p class="lead">Data/Hora: {{ $newcurriculo->created_at->format('d/m/Y H:i') }}</p>
  </div>

  <div class="container">
    <a class="btn btn-warning btn-sm" role="button" onclick="window.print();return false;"><i class="fas fa-print"></i> Imprimir</a>
  </div>
  
</div>

@endsection
