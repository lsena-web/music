<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateMusicaFormRequest;
use App\Models\Album;
use App\Models\Musica;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    /**
     * Método responsável por retornar lista de musicas
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $musica = Musica::join('albuns', 'musicas.albuns_id', '=', 'albuns.id')
            ->select(
                'musicas.id as idMusica',
                'musicas.name as nameMusica',
                'durable',
                'albuns.id as idAlbum',
                'albuns.name as nameAlbum',
                'artist',
                'gender'
            )->orderBy('musicas.id', 'asc')->get();

        return view('admin.music.listagem', ['musicas' => $musica]);
    }

    /**
     * Método responsável por retornar o formulário de cadastro 
     * 
     * @param integer $id (id do álbum) 
     * @return view
     */
    public function create($id)
    {
        return view('admin.music.create', ['id' => $id]);
    }

    /**
     * Método responsável por persistir os dados de cadastro no banco.
     *
     * @param  FormRequest
     * @return redirect
     */
    public function store(StoreUpdateMusicaFormRequest $request)
    {
        $musica = new Musica();

        $musica->name = $request->name;
        $musica->durable = $request->durable;
        $musica->albuns_id = $request->id;

        $musica->save();

        return redirect('/dashboard' . '/' . $request->id)->with('msg', 'Música cadastrada com sucesso!');
    }


    /**
     * Método responsável por retornar o formulário de edição a partir do álbum
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        $musica = Musica::findOrFail($id);

        return view('admin.music.edit', ['musica' => $musica]);
    }

    /**
     * Métodoresponsáavel por persistir os dados de atualização no banco a partir do álbum
     *
     * @param  FormRequest
     * @return redirect
     */
    public function update(StoreUpdateMusicaFormRequest $request)
    {
        $musica = Musica::findOrFail($request->id);

        $musica->update([
            'name' => $request->name,
            'durable' => $request->durable
        ]);

        return redirect('/dashboard' . '/' . $musica->albuns_id)->with('msg', 'Música atualizada com sucesso!');
    }

    /**
     * Método responsável por retornar o formulário de edição a partir da listagem de músicas
     *
     * @param  int  $id
     * @return view
     */
    public function editar($id)
    {
        $musica = Musica::findOrFail($id);

        return view('admin.music.editar', ['musica' => $musica]);
    }

    /**
     * Métodoresponsáavel por persistir os dados de atualização no banco
     *
     * @param  FormRequest
     * @return redirect
     */
    public function atualizar(StoreUpdateMusicaFormRequest $request)
    {
        $musica = Musica::findOrFail($request->id);

        $musica->update([
            'name' => $request->name,
            'durable' => $request->durable
        ]);

        return redirect('/musica')->with('msg', 'Música atualizada com sucesso!');
    }


    /**
     * Método responsável por deletar um registro a partir dos detalhes do álbum
     *
     * @param  int  $id
     * @return redirect
     */
    public function destroy($id)
    {
        $musica = Musica::findOrFail($id);

        if ($musica->delete()) {

            return redirect('/dashboard' . '/' . $musica->albuns_id)->with('msg', 'Registro deletado com sucesso!');
        }

        return redirect('/dashboard' . '/' . $musica->albuns_id)->with('msg', 'Falha ao deletar!');
    }

    /**
     * Método responsável por deletar um registro a partir da lista de músicas
     *
     * @param  int  $id
     * @return redirect
     */
    public function delete($id)
    {
        $musica = Musica::findOrFail($id);

        if ($musica->delete()) {

            return redirect('/musica')->with('msg', 'Registro deletado com sucesso!');
        }

        return redirect('/musica')->with('msg', 'Falha ao deletar!');
    }
}
