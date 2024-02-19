<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;
use App\Models\Estudio;

/**
 * Class AnimeController
 * @package App\Http\Controllers
 */
class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animes = Anime::paginate();

        return view('anime.index', compact('animes'))
            ->with('i', (request()->input('page', 1) - 1) * $animes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anime = new Anime();
        $estudios =Estudio::pluck('nombre','id');
        return view('anime.create', compact('anime', 'estudios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Anime::$rules);

        $anime = Anime::create($request->all());

        return redirect()->route('animes.index')
            ->with('success', 'Anime created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anime = Anime::find($id);

        return view('anime.show', compact('anime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anime = Anime::find($id);
        $estudios =Estudio::pluck('nombre','id');
        return view('anime.edit', compact('anime','estudios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Anime $anime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anime $anime)
    {
        request()->validate(Anime::$rules);

        $anime->update($request->all());

        return redirect()->route('animes.index')
            ->with('success', 'Anime updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $anime = Anime::find($id)->delete();

        return redirect()->route('animes.index')
            ->with('success', 'Anime deleted successfully');
    }
}
