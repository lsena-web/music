<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAlbumFormRequest;
use App\Models\Album;
use App\Models\Genero;
use App\Models\Musica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Método responsável por retornar a página inicial dos visitantes
     * 
     * @return view
     */
    public function index(Request $request)
    {
        // PESQUISA GERAL
        $search = Album::select();

        // CONTADORES
        $countAlbum = $search->count();
        $countMusica = Musica::count();

        // FILTROS
        $searchAlbum = $request->album;
        $searchGenero = $request->genero;

        // ADICIONAN CLAÚSULA WHERE  name
        if ($searchAlbum) {
            $search->where([['name', 'like', '%' . $searchAlbum . '%']]);
        }

        // ADICIONAN CLAÚSULA WHERE  gender
        if ($searchGenero) {
            $search->where([['gender', 'like', '%' . $searchGenero . '%']]);
        }

        // efetuando pesquisa
        $search = $search->paginate(5);

        return view('welcome', [

            'albuns'        => $search,
            'searchAlbum'   => $searchAlbum,
            'searchGenero'  => $searchGenero,
            'countAlbum'    => $countAlbum,
            'countMusica'   => $countMusica
        ]);
    }

    /**
     * Método responsável por retornar os detalhes da página inicial dos visitantes
     * 
     * @return view
     */
    public function details($id)
    {
        $album = Album::findOrFail($id);

        $musica = Musica::where('albuns_id', '=', $id)->paginate(5);
        return view('details', ['albuns' => $album, 'musicas' => $musica]);
    }

    /**
     * Método responsável por retornar a dashboard com a listagem de albuns
     * 
     * @param Request
     * @return view
     */
    public function dashboard(Request $request)
    {

        // PESQUISA GERAL
        $search = Album::select();

        // CONTADORES
        $countAlbum = $search->count();
        $countMusica = Musica::count();

        // FILTROS
        $searchAlbum = $request->album;
        $searchArtista = $request->artista;

        // ADICIONAN CLAÚSULA WHERE  name
        if ($searchAlbum) {
            $search->where([['name', 'like', '%' . $searchAlbum . '%']]);
        }

        // ADICIONAN CLAÚSULA WHERE  artist
        if ($searchArtista) {
            $search->where([['artist', 'like', '%' . $searchArtista . '%']]);
        }

        // efetuando pesquisa
        $search = $search->paginate(5);

        return view('admin.dashboard', [

            'albuns'        => $search,
            'searchAlbum'   => $searchAlbum,
            'searchArtista' => $searchArtista,
            'countAlbum'    => $countAlbum,
            'countMusica'   => $countMusica
        ]);
    }

    /**
     * Método responsável por retornar o fomurlário de criação do álbum
     * 
     * @return view
     */
    public function create()
    {
        $genero = Genero::all();
        return view('admin.create', ['generos' => $genero]);
    }

    /**
     * Método responsável por persistir os dados no banco
     * 
     * @param FormRequest
     * @return redirect
     */
    public function store(StoreUpdateAlbumFormRequest $request)
    {
        $album = new Album();

        $album->name   = $request->name;
        $album->gender = $request->gender;
        $album->artist = $request->artist;
        $album->price  = $request->price;

        // VALIDANDO ARQUIVO
        if ($request->hasFile('file') && $request->file('file')->isValid()) {

            $album->file =   $request->file->store('albuns');
        }

        $album->save();

        return redirect('/dashboard')->with('msg', 'Álbum cadastrado com sucesso!');
    }

    /**
     * Método responsável por retornar detalhes do álbum junto da listagem de musicas pertencidas
     * 
     * @param integer $id
     * @return view
     */
    public function show($id)
    {

        $album = Album::findOrFail($id);

        $musica = Musica::where('albuns_id', '=', $id)->get();
        return view('admin.detail', ['albuns' => $album, 'musicas' => $musica]);
    }

    /**
     * Método responsável por retornar o formulário de edição
     * 
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);

        $generos = Genero::all();

        return view('admin.edit', ['album' => $album, 'generos' => $generos]);
    }

    /**
     * Método responsável por persistir a edição dos dados
     * 
     * @param FormRequest
     * @return redirect
     */
    public function update(StoreUpdateAlbumFormRequest $request)
    {
        $data = $request->all();

        // ATUALIZAÇÃO DO ARQUIVO
        if ($request->hasFile('file') && $request->file('file')->isValid()) {

            $this->deleteFile($request->id);

            $data['file'] = $request->file->store('albuns');
        }

        Album::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Atualização realizada com sucesso!');
    }

    /**
     * Método responsável por atualizar apenas o album
     * 
     * @param int $id
     * @return bool | 404
     */
    public function updateFile(Request $request)
    {

        // VALIDANDO ATUALIZAÇÃO DO ARQUIVO
        if ($this->deleteFile($request->id)) {

            $album = Album::findOrFail($request->id);

            $album->file = null;

            $album->save();

            return redirect('/dashboard')->with('msg', 'Atualização realizada com sucesso!');
        }

        return redirect('/dashboard')->with('msgError', 'Erro na operação, tente mais tarde!');
    }

    /**
     * Método responsável por deletar um resgistro do banco
     * 
     * @param int $id
     * @return redirect |404
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);

        // DELETANDO ARQUIVO
        $this->deleteFile($id);

        if ($album->delete()) {

            return redirect('/dashboard')->with('msg', 'Registro deletado com sucesso!');
        }

        return redirect('/dashboard')->with('msg', 'Falha ao deletar o registro, tente novemente mais tarde!');
    }

    /**
     * Método reponsável por deletar a capa do álbum
     * 
     * @param int $id
     * @return boolean |404
     */
    public function deleteFile($id)
    {
        $album = Album::findOrFail($id);

        if (!empty($album->file) && ($album->file != 'albuns/md3.png')) {

            Storage::delete($album->file);

            return true;
        }

        return false;
    }
}
