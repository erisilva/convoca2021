@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('curriculo.index') }}">Lista de Cadastros</a></li>
      <li class="breadcrumb-item active" aria-current="page">Exibir Registro</li>
    </ol>
  </nav>
</div>
<div class="container">

  <form>
    
    <div class="form-row">
      <div class="form-group col-md-6">
        <div class="p-3 bg-primary text-white text-right h2">Nº {{ $curriculo->id }}</div>    
      </div>
      <div class="form-group col-md-3">
        <label for="dia">Data</label>
        <input type="text" class="form-control" name="dia" value="{{ $curriculo->created_at->format('d/m/Y') }}" readonly>
      </div>
      <div class="form-group col-md-3">
        <label for="hora">Hora</label>
        <input type="text" class="form-control" name="hora" value="{{ $curriculo->created_at->format('H:i') }}" readonly>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-9">
        <label for="nome">Nome da Entidade</label>
        <input type="text" class="form-control" name="nome" value="{{ $curriculo->entidade }}" readonly>
      </div>    

      <div class="form-group col-md-3">
        <label for="cnpj">CNPJ</label>
        <input type="text" class="form-control" name="cnpj" value="{{ $curriculo->cnpj }}" readonly>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="cep">CEP</label>  
        <input type="text" class="form-control" name="cep" id="cep" value="{{ $curriculo->cep }}" readonly>
      </div>
      <div class="form-group col-md-5">  
        <label for="logradouro">Logradouro</label>  
        <input type="text" class="form-control" name="logradouro" id="logradouro" value="{{ $curriculo->logradouro }}" readonly>
      </div> 
      <div class="form-group col-md-2">  
        <label for="numero">Nº</label>  
        <input type="text" class="form-control" name="numero" id="numero" value="{{ $curriculo->numero }}" readonly>

      </div>
      <div class="form-group col-md-3">  
        <label for="complemento">Complemento</label>  
        <input type="text" class="form-control" name="complemento" id="complemento" value="{{ $curriculo->complemento }}" readonly>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="bairro">Bairro</label>  
        <input type="text" class="form-control" name="bairro" id="bairro" value="{{ $curriculo->bairro }}" readonly>
      </div>
      <div class="form-group col-md-6">  
        <label for="cidade">Cidade</label>  
        <input type="text" class="form-control" name="cidade" id="cidade" value="{{ $curriculo->cidade }}" readonly>
      </div> 
      <div class="form-group col-md-2">  
        <label for="uf">UF</label>  
        <input type="text" class="form-control" name="uf" id="uf" value="{{ $curriculo->uf }}" readonly>
      </div>
    </div>    

    <div class="form-row">
      <div class="form-group col-md-9">
        <label for="representante">Representante</label>
        <input type="text" class="form-control" name="representante" id="representante" value="{{ $curriculo->representante }}" readonly>
      </div>   
      <div class="form-group col-md-3">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" name="cpf" id="cpf" value="{{ $curriculo->cpf }}" readonly>
      </div>     
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="email">E-mail</label>
        <input type="text" class="form-control" name="email" value="{{ $curriculo->email }}" readonly>
      </div>
      <div class="form-group col-md-3">
        <label for="cel1">N&lowast; Celular</label>
        <input type="text" class="form-control" name="cel1" id="cel1" value="{{ $curriculo->cel1 }}" readonly>
      </div>
      <div class="form-group col-md-3">
        <label for="cel2">N&lowast; Celular Alternativo</label>
        <input type="text" class="form-control" name="cel2" id="cel2" value="{{ $curriculo->cel2 }}" readonly>
      </div>
    </div>



    <br>

    <div class="container bg-primary text-white">
        <p class="text-center">Anexos</p>
    </div>

    @if (count($anexos))
    <div class="form-group">
      <div class="table-responsive">      
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Link</th>
            </tr>
          </thead>
          <tbody>
            @foreach($anexos as $anexo)
            <tr>
                <td>{{$anexo->id}}</td>
                <td><a href="{{ $anexo->arquivoUrl }}" target="_blank">{{ $anexo->arquivoUrl }}</a></td>
            </tr>    
            @endforeach 
          </tbody>
        </table>
      </div>  
    </div>
    @endif

  </form>

  <br>
  <div class="container">
    <a href="{{ route('curriculo.index') }}" class="btn btn-primary" role="button"><i class="fas fa-long-arrow-alt-left"></i> Voltar</i></a>
    <a href="#" class="btn btn-primary" role="button" onclick="window.print();return false;"><i class="fas fa-print"></i> Imprimir</a>

  </div>

</div>

@endsection
