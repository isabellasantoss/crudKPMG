   <div class="main-panel">       
        <div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Lista de usuários</h3>
                                </div>
                                <div class="col-12 text-right">
                                    <a href="{{ route('usuario.create') }}" class="btn btn-sm btn-primary">Adicionar usuário</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                        </div>

                        <div class="table-responsive">
                            <table id="tabela" class="table table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">@lang('cod_id')</th>
                                        <th scope="col">@lang('cod_matricula')</th>
                                        <th scope="col">@lang('cod_cpf')</th>
                                        <th scope="col">@lang('des_email')</th>
                                        <th scope="col">@lang('flg_ativo')</th>
                                        <th scope="col">@lang('des_acoes')</th>

                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    
<script>
    $(document).ready(function() {
        $('#tabela').DataTable(
        {
            serverSide: true,
            ajax: "{{ route('usuario.ajaxDataTable') }}",
            columns: [
                {data: 'cod_id'},
                { data: 'cod_matricula'},
                { data: 'cod_cpf'},
                { data: 'des_email'},
                { data: 'flg_ativo',
                  className:  'options',
                  render: function(data, type, full, meta){
                      if(data == "S"){
                          return '<div><i class="fa fa-check" style="font-size:18px"></i></div>'
                      }else{
                        return '<div><i class="fa fa-times" style="font-size:18px"></i></div>'
                      }
                  }
                
                },
                { data: 'actions' }

            ],
            searching: true,
            paging: false,
            sort: true,
            info: false,
            scrollX: true,
            autoWidth: false,
            pageLength: 30,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
            },
        });
    } );
/** **************** DELETE BUTTONS *******************
 * Atribuímos diretamente na tag html o onclick chamando a função
 * apenas os botões da grid gerados com DataTable.
 *
 * Para os demais botoões de deletar, pegamos todos da página pela classe
 * e criamos o eventListener click para chamar a função e deletar o registro
 */
const deleteButtons = document.querySelectorAll('.delete-button')
for(const [key, button] of Object.entries(deleteButtons)) {
    button.addEventListener('click', function() {
        deleteRegister(this)
    });
}

function deleteRegister(button) {
    const codigo = button.getAttribute('data-id');
    const url = button.getAttribute('data-href');
    const _method = button.getAttribute('data-method');
    const item = button.getAttribute('data-item');
    const name = button.getAttribute('data-name');

    if(item === 'Modelo da grid') $('#modeloGridExcel').modal('hide');

    bootbox.confirm({
        title: `Excluir usuário`,
        message: "Deseja realmente excluir este usuário?",
        className: 'fadeIn',
        buttons: {
            confirm: {
                label: '<i class="fa fa-check"></i> Sim',
            },
            cancel: {
                label: '<i class="fa fa-times"></i> Não',
                className: 'btn-default'
            }
        },
        callback: function (result) {
            if(result)
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: { data: codigo, _method: _method},
                    success: function(data){
                        bootbox.alert({
                            message: 'Excluido com sucesso!',
                            className: 'fadeIn',
                            callback: function(){
                                if(data.urlRedirect) window.location.href = data.urlRedirect;
                                else location.reload();
                            }
                        });
                    },
                    error:function(error){
                         console.log(error);
                    },
                });
            }
        }
    });

    return false;

    
}

</script>
 
