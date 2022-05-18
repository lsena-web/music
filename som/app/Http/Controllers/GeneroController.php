<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateGenero;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Método responsável por listar os Gêneros
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Genero::all();

        return view('admin.genero.listagem', ['generos' => $generos]);
    }

    /**
     * Método responsável por retoprna o formulário de cadastro
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genero.create');
    }

    /**
     * Método responsável por persistir os dados de cadastro no banco
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateGenero $request)
    {
        $genero = new Genero();

        $genero->name = $request->name;

        $genero->save();

        return redirect('/genero')->with('msg', 'Cadastro realizado com sucesso!');
    }


    /**
     * Método responsável por retornar o fomulário de atualização
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genero = Genero::findOrFail($id);

        return view('admin.genero.edit', ['genero' => $genero]);
    }

    /**
     * Método responsável por persistir os dados atualizado no banco
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateGenero $request)
    {

        Genero::findOrFail($request->id)->update([
            'name' => $request->name
        ]);

        return redirect('/genero')->with('msg', 'Atualização realizada com sucesso!');
    }

    /**
     * Método responsável por remover um registro do banco
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genero = Genero::findOrFail($id);
        if ($genero->delete()) {

            return redirect('/genero')->with('msg', 'Registro deletado com sucesso!');
        }

        return redirect('/genero')->with('msg', 'Falha ao deletar!');
    }
}
