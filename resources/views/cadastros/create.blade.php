@extends('layouts.clear')

@section('css-header')
<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@endsection

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
      <div class="card">
        <div class="card-body">
          <p>Em complemento à <strong>CONVOCAÇÃO</strong>, desde logo informa-se que os <strong>requisitos legais</strong> para obter a titulação municipal de ORGANIZAÇÃO SOCIAL estão dispostos na <strong>Lei Municipal nº 4.713/2014</strong> e respectivo regulamento, <strong>Decreto Municipal nº 151/2017</strong> (com alterações promovidas pelo Decreto Municipal nº 239/2017), disponíveis em:</p>
          <p><ul class="list-group">
              <li class="list-group-item"><a href="http://www.contagem.mg.gov.br/?legislacao=380131" target="_blank">Lei Municipal nº 4.713/2014</a></li>
              <li class="list-group-item"><a href="http://www.contagem.mg.gov.br/?legislacao=728667" target="_blank">Decreto Municipal nº 151/2017</a></li>
          </ul></p>
          <h4>Principais dispositivos:</h4>
          <p><strong>Lei Municipal nº 4.713/2014</strong>: Art. 2º, I, incisos “a” até “j”, c/c §1º; Art. 2º, §2º; Art. 4º; Art. 10, caput e parágrafos.</p>
          <p><strong>Decreto Municipal nº 151/2017 (atualizado)</strong>: Art. 2º, caput, incisos e parágrafos –requisitos; Art. 6º caput, incisos e parágrafos – formalização;</p>
          <p><strong>COMUNICA</strong> ainda que, em virtude das restrições sanitárias impostas pela Pandemia do COVID-19, nos termos do Decreto Municipal nº 058/2021, o protocolo da manifestação de interesse e da respectiva documentação de qualificação deverá, preferencialmente, ser formalizado em via eletrônica, através deste formulário web.</p>
          <p>Comparecimento presencial para protocolo deverá ocorrer apenas se não for possível a solução pela via eletrônica, obedecendo-se às normas sanitárias de prevenção da COVID-19, exclusivamente na Sede da Secretaria Municipal de Saúde, à Avenida General David Sarnoff, nº 3.113, bairro Cidade Industrial. Contagem - MG - CEP 32.210-110.</p>
          <p>Telefone: 3472-6315 / 6316 / 6317 / 6318 / 6319 / 6320 E-mail: saude@contagem.mg.gov.br Site: <a href="http://www.contagem.mg.gov.br/sms/" target="_blank">www.contagem.mg.gov.br/sms/</a> Horário de Funcionamento: 8:00 às 17:00 horas</p>
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Atenção!</strong> Todos campos marcados com <strong>*</strong> são de preenchimento obrigatório.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>

    


    <div class="container">
      <form method="POST" action="{{ route('cadastro.store') }}" enctype="multipart/form-data">
      @csrf
      
      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="entidade">Nome da Entidade<strong  class="text-danger">(*)</strong></label>
          <input type="text" class="form-control{{ $errors->has('entidade') ? ' is-invalid' : '' }}" name="entidade" value="{{ old('entidade') ?? '' }}">
          @if ($errors->has('entidade'))
          <div class="invalid-feedback">
          {{ $errors->first('entidade') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="cnpj">CNPJ da Entidade<strong  class="text-danger">(*)</strong></label>
          <input type="text" class="form-control{{ $errors->has('cnpj') ? ' is-invalid' : '' }}" name="cnpj" id="cnpj" value="{{ old('cnpj') ?? '' }}">
          @if ($errors->has('cnpj'))
          <div class="invalid-feedback">
          {{ $errors->first('cnpj') }}
          </div>
          @endif
        </div>
      </div>

      <div class="container bg-primary text-white">
        <p class="text-center">Endereço da Entidade</p>
      </div>

      <div class="form-row">
        <div class="form-group col-md-2">
          <label for="cep">CEP<strong  class="text-danger">(*)</strong></label>  
          <input type="text" class="form-control{{ $errors->has('cep') ? ' is-invalid' : '' }}" name="cep" id="cep" value="{{ old('cep') ?? '' }}">
          @if ($errors->has('cep'))
          <div class="invalid-feedback">
          {{ $errors->first('cep') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-5">  
          <label for="logradouro">Logradouro <strong  class="text-danger">(*)</strong></label>  
          <input type="text" class="form-control{{ $errors->has('logradouro') ? ' is-invalid' : '' }}" name="logradouro" id="logradouro" value="{{ old('logradouro') ?? '' }}">
          @if ($errors->has('logradouro'))
          <div class="invalid-feedback">
          {{ $errors->first('logradouro') }}
          </div>
          @endif
        </div> 
        <div class="form-group col-md-2">  
          <label for="numero">Nº <strong  class="text-danger">(*)</strong></label>  
          <input type="text" class="form-control{{ $errors->has('numero') ? ' is-invalid' : '' }}" name="numero" id="numero" value="{{ old('numero') ?? '' }}">
          @if ($errors->has('numero'))
          <div class="invalid-feedback">
          {{ $errors->first('numero') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-3">  
          <label for="complemento">Complemento <strong  class="text-warning">(opcional)</strong></label>  
          <input type="text" class="form-control" name="complemento" id="complemento" value="{{ old('complemento') ?? '' }}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="bairro">Bairro <strong  class="text-danger">(*)</strong></label>  
          <input type="text" class="form-control{{ $errors->has('bairro') ? ' is-invalid' : '' }}" name="bairro" id="bairro" value="{{ old('bairro') ?? '' }}">
          @if ($errors->has('bairro'))
          <div class="invalid-feedback">
          {{ $errors->first('bairro') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-6">  
          <label for="cidade">Cidade <strong  class="text-danger">(*)</strong></label>  
          <input type="text" class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}" name="cidade" id="cidade" value="{{ old('cidade') ?? '' }}">
          @if ($errors->has('cidade'))
          <div class="invalid-feedback">
          {{ $errors->first('cidade') }}
          </div>
          @endif
        </div> 
        <div class="form-group col-md-2">  
          <label for="uf">UF <strong  class="text-danger">(*)</strong></label>  
          <input type="text" class="form-control{{ $errors->has('uf') ? ' is-invalid' : '' }}" name="uf" id="uf" value="{{ old('uf') ?? '' }}">
          @if ($errors->has('uf'))
          <div class="invalid-feedback">
          {{ $errors->first('uf') }}
          </div>
          @endif
        </div>
      </div>

      <div class="container bg-primary text-white">
        <p class="text-center">Representante Legal</p>
      </div>

      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="representante">Nome do Representante<strong  class="text-danger">(*)</strong></label>
          <input type="text" class="form-control{{ $errors->has('representante') ? ' is-invalid' : '' }}" name="representante" value="{{ old('representante') ?? '' }}">
          @if ($errors->has('representante'))
          <div class="invalid-feedback">
          {{ $errors->first('representante') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="cpf">CPF<strong  class="text-danger">(*)</strong></label>
          <input type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" id="cpf" value="{{ old('cpf') ?? '' }}">
          @if ($errors->has('cpf'))
          <div class="invalid-feedback">
          {{ $errors->first('cpf') }}
          </div>
          @endif
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="email">E-mail<strong  class="text-danger">(*)</strong></label>
          <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') ?? '' }}">
          @if ($errors->has('email'))
          <div class="invalid-feedback">
          {{ $errors->first('email') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="cel1">N° Celular<strong  class="text-danger">(*)</strong></label>
          <input type="text" class="form-control{{ $errors->has('cel1') ? ' is-invalid' : '' }}" name="cel1" id="cel1" value="{{ old('cel1') ?? '' }}">
          @if ($errors->has('cel1'))
          <div class="invalid-feedback">
          {{ $errors->first('cel1') }}
          </div>
          @endif
        </div>
        <div class="form-group col-md-4">
          <label for="cel2">N&lowast; Celular Alternativo<strong  class="text-warning">(opcional)</strong></label>
          <input type="text" class="form-control" name="cel2" id="cel2" value="{{ old('cel2') ?? '' }}">
        </div>
      </div>

      <div class="container bg-primary text-white">
        <p class="text-center">Anexos</p>
      </div>

      <div class="form-group">
          <div class="alert alert-warning" role="alert">
            <p><strong  class="text-danger">(!)</strong> Só serão aceitos os arquivos nos seguintes formatos: pdf, doc, rtf, txt, jpg, jpeg ou png </p>
            <p><strong  class="text-danger">(!)</strong> Cada arquivo a ser enviado não pode ter mais de <strong>5MB</strong> de espaço cada um</p>
            <p><strong  class="text-danger">(!)</strong> Pode ser enviado apenas um arquivo ou vários arquivos, para isso basta selecionar quais arquivos deverão ser enviados na caixa de seleção</p>
          </div>       
      </div>


      <div class="form-group">
        <ul class="list-group">
          <li class="list-group-item">
            <label for="arquivos">Arquivo #1 <strong  class="text-danger">(*)</strong></label>
            <input type="file" class="form-control-file {{ $errors->has('arquivos') ? ' is-invalid' : '' }}" id="arquivos" name="arquivos[]" multiple data-show-upload="true" data-show-caption="true">
            @if ($errors->has('arquivos'))
            <div class="invalid-feedback">
            {{ $errors->first('arquivos') }}
            </div>
            @endif
          </li>
        </ul>
      </div>

      <div class="form-group">
        <div class="alert alert-primary" role="alert">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="declaro1" value="s">
            <label class="form-check-label" for="declaro1">Declaro que estou ciente e de acordo com os <strong>requisitos legais</strong> para obter a titulação municipal de ORGANIZAÇÃO SOCIAL estão dispostos na <strong>Lei Municipal nº 4.713/2014</strong> e respectivo regulamento, <strong>Decreto Municipal nº 151/2017</strong> (com alterações promovidas pelo Decreto Municipal nº 239/2017)</label>            
          </div>    
        </div>
        @if ($errors->has('declaro1'))
        <div class="alert alert-danger" role="alert">
        <p><strong  class="text-danger">(!)</strong>{{ $errors->first('declaro1') }}
        </div>
        @endif
      </div>


      <button type="submit" class="btn btn-primary"><i class="fas fa-plus-square"></i> Enviar Currículo</button>
    
    </div>
  </div>
@endsection

@section('script-footer')
<script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>
<script>
  $(document).ready(function(){

      $('#nascimento').datepicker({
          format: "dd/mm/yyyy",
          todayBtn: "linked",
          clearBtn: true,
          language: "pt-BR",
          autoclose: true,
          todayHighlight: true
      });

      $("#cpf").inputmask({"mask": "999.999.999-99"});
      $("#cnpj").inputmask({"mask": "99.999.999/9999-99"});
      $("#cel1").inputmask({"mask": "(99) 99999-9999"});
      $("#cel2").inputmask({"mask": "(99) 99999-9999"});
      $("#cep").inputmask({"mask": "99.999-999"});

      function limpa_formulario_cep() {
          $("#logradouro").val("");
          $("#bairro").val("");
          $("#cidade").val("");
          $("#uf").val("");
      }
      
    $("#cep").blur(function () {
          var cep = $(this).val().replace(/\D/g, '');
          if (cep != "") {
              var validacep = /^[0-9]{8}$/;
              if(validacep.test(cep)) {
                  $("#logradouro").val("...");
                  $("#bairro").val("...");
                  $("#cidade").val("...");
                  $("#uf").val("...");
                  $.ajax({
                      dataType: "json",
                      url: "http://srvsmsphp01.brazilsouth.cloudapp.azure.com:9191/cep/?value=" + cep,
                      type: "GET",
                      success: function(json) {
                          if (json['erro']) {
                              limpa_formulario_cep();
                              console.log('cep inválido');
                          } else {
                              $("#bairro").val(json[0]['bairro']);
                              $("#cidade").val(json[0]['cidade']);
                              $("#uf").val(json[0]['uf'].toUpperCase());
                              $("#logradouro").val(json[0]['rua']);
                          }
                      }
                  });
              } else {
                  limpa_formulario_cep();
              }
          } else {
              limpa_formulario_cep();
          }
      });     

  });
</script>

@endsection      
