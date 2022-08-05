<div class="main-panel">       
    <div class="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Criar usuário</h3>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="col-12">
                    </div>
                    <form  method="POST" action="{{ route('usuario.store') }}" name="f1" >
                        {{ csrf_field() }}

                    <div class="table-responsive">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <ul class="list-unstyled m-t-10">

                                        <li class="row">
                                            <p class="col-sm-4 col-5">
                                                <b>@lang('cod_cpf'): </b>
                                            </p>    
                                            <p class="col font-weight-semibold"> 
                                                <input type="text"
                                                required
                                                class="form-control {{ $errors->has('cod_cpf') ? ' is-invalid' : '' }}"
                                                id="cod_cpf"
                                                data-inputmask="'mask': '9', 'repeat': 10, 'greedy' : false"
                                                name="cod_cpf">
                                            </p>

                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                <b>@lang('cod_matricula'): </b>
                                            </p>
                                            <p class="col font-weight-semibold"> 
                                                <input type="text"
                                                required
                                                class="form-control{{ $errors->has('cod_matricula') ? ' is-invalid' : '' }}"
                                                id="cod_matricula"
                                                name="cod_matricula"
                                                maxlength="6">

                                            </p>                                       
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                <b>@lang('des_email'): </b>
                                            </p>
                                            <p class="col font-weight-semibold"> 
                                                <input type="text"
                                                required
                                                class="form-control{{ $errors->has('des_email') ? ' is-invalid' : '' }}"
                                                id="des_email" 
                                                onkeyup="validacaoEmail()"
                                                name="des_email">
                                                <span id="lblError" style="color: red"></span>
                                            </p>       
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                <b>@lang('flg_ativo'): </b>
                                                <p class="col font-weight-semibold"> 
                                                    <input
                                                    type="checkbox"
                                                    name="flg_ativo"
                                                    value="{{ old('flg_ativo', 'S') }}"
                                                    {{ old('flg_ativo', $model->getRawOriginal('flg_ativo')) == 'S' || !$model->exists ? 'checked' : ''   }}
                                                    id="flg_ativo">                                                                                       
                                                </p>
                                            </p>
                                        </li>
                                    </ul>
                                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Voltar</a>
                                        <button type="submit" class="btn btn-sm btn-success" onclick="return validacaoEmail(true)">Salvar</button>                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</div>


<script>

VMasker(document.getElementById("cod_cpf")).maskPattern("999.999.999-99");

function validacaoEmail() {
    var email = document.getElementById("des_email").value;
    var lblError = document.getElementById("lblError");
    lblError.innerHTML = "";
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (!expr.test(email)) {
        lblError.innerHTML = "Email inválido";
        return false;
    } else  {
        return true;
    }
}

</script>