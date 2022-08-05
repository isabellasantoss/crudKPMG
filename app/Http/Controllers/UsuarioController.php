<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Exception;
use Symfony\Component\Process\ExecutableFinder;
use Yajra\DataTables\Facades\DataTables;



class UsuarioController extends Controller
{
    /**
     * Instância dos usuários
    */
    protected $usuarios;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Usuario $usuarios)
    {
        $this->usuarios = $usuarios;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = $this->usuarios->get();
        $model = [];
        $options = [
            'viewName' => 'grid',
        ];

        return view('usuario.index', compact('usuario', 'options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Usuario();
        $options = [
            'viewName' => 'create',
            'method' => 'post',
            'route'  => route('usuario.create')
        ];

        return view('usuario.index', compact('model', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            if($request->flg_ativo == 'S'){
                $request->flg_ativo = 'S';
            }else{
                $request->flg_ativo = 'N';

            }


            Usuario::create([
                'cod_matricula' => $request->cod_matricula,
                'cod_cpf' => $request->cod_cpf,
                'des_email' => $request->des_email,
                'flg_ativo' => $request->flg_ativo,
            ]);
    
            return redirect(route('usuario.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $model = $this->usuarios->findOrFail($id);

            $options = [
            'viewName' => 'show'
            ];

            return view('usuario.index', compact('model', 'options'));
        }catch(Exception  $ex){
            
            dd($ex);
            return $ex;
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            
            $model = $this->usuarios->findOrFail($id);
            $options = [
                'viewName' => 'edit',
                'route'  => route('usuario.update', $model->cod_id),
            ];
    
            return view('usuario.index', compact('model', 'options'));

        }catch(Exception $ex){
            dd($ex);
        };

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {    

        try
        {
                $request->validate([
                    'cod_matricula' => 'required',
                    'cod_cpf' => 'required',
                    'des_email' => 'required',
                    'flg_ativo' => 'required',
                ]);        


            $usuario->update($request->all());
    
            return redirect()->route('usuario.index');    
        

        } catch (Exception $ex)
        {
          dd($ex);  
         
        }
       
        

    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $model = $this->usuarios->findOrFail($id);

            $model->delete();


    }

    public function ajaxDataTable()
    {
        $usuarios = $this->usuarios->select();
        $dataTable = DataTables::of($usuarios);

        $dataTable
        ->addColumn('actions', function ($usuario) {
            $actions = '<a href="' . route('usuario.show', $usuario->cod_id) .'" class="btn btn-sm btn-success" title='. 'Visualizar' . ' data-toggle="tooltip" data-placement="top">
                            <i class="fa fa-eye" style="font-size:18px; color: #000"></i>
                        </a>';

            $actions .= '<a href="'. route('usuario.edit', $usuario->cod_id) . '" class="btn btn-sm btn-warning" data-method="PATCH" title='. 'Editar' . ' data-toggle="tooltip" data-placement="top">
                            <i class="fa fa-pencil" style="font-size:18px; color: #000"></i>
                         </a>';

            $actions .= '<a class="delete-button button-delete btn btn-sm btn-danger" " data-method="DELETE" data-item="' . 'usuário' . '"
                        title="' . 'Deletar' . '" data-toggle="tooltip" data-placement="top" onclick="deleteRegister(this)"
                        href="#"
                        data-href="' . route('usuario.destroy', $usuario->cod_id) . '">
                            <i class="fa fa-trash" style="font-size:18px; color: #000"></i>
                        </a>';


            return $actions;
        });

        return $dataTable->rawColumns(['actions'])->make(true);

    }
}
