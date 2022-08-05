<div class="main-panel">       
    <div class="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Detalhes @lang('usuário')</h3>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <ul class="list-unstyled m-t-10">
                                        <li class="row">
                                            <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                <b>@lang('cod_id'): </b>
                                            </p>
                                            <p class="col font-weight-semibold"> {{ $model->cod_id }}</p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                <b>@lang('cod_cpf'): </b>
                                            </p>
                                            <p class="col font-weight-semibold"> {{ $model->cod_cpf }}</p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                <b>@lang('cod_matricula'): </b>
                                            </p>
                                            <p class="col font-weight-semibold"> {{ $model->cod_matricula }}</p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                <b>@lang('des_email'): </b>
                                            </p>
                                            <p class="col font-weight-semibold"> {{ $model->des_email }}</p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                <b>@lang('flg_ativo'): </b>
                                            </p>
                                                <p class="col font-weight-semibold"> 

                                                    <input class="form-check" 
                                                    id="flg_ativo" name="flg_ativo" disabled type="checkbox"         
                                                    @if ($model->flg_ativo == 'S') checked @else  @endif>   

                                                             
                                                </p>
                                            </p>
                                        </li>
                                    </ul>
                                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Voltar</a>

                                        <a href="{{ route('usuario.edit', $model->cod_id) }}" class="btn btn-sm btn-warning">Editar</a>
                                </div>
                                <div class="col-6">
                                    <ul class="list-unstyled m-t-10">
                                        <li class="row">
                                            <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                <b>Criado em: </b>
                                            </p>
                                            <p class="col font-weight-semibold"> {{ $model->created_at }}</p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                <b>Última atualização: </b>
                                            </p>
                                            <p class="col font-weight-semibold"> {{ $model->updated_at }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


