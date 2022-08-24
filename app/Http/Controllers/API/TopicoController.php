<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topico;
use App\Traits\ApiResponse;

class TopicoController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topicos = Topico::all();
        return $this->sucess($topicos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate ([
            'topico' => 'required|max:255',
        ]);
        if($validated){
            try{
                $topico = new Topico();
                $topico->topico = $request->get('topico');
                $topico->save();
                return $this->success($topico);
            } catch (\Throwable $th){
                return $this->error("Erro ao cadastrar o tópico !", 401, $th->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $topico = Topico::findOrFail($id);
            return $this->success($topico);
        } catch (\Throwable $th){
            return $this->error("Topico não encontrado! ", 401, $th->getMessage());
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate ([
            'topico' => 'required|max:255',
        ]);
        if($validated){
            try{
                $topico = Topico::findOrFail($id);
                $topico->topico = $request->get('topico');
                $topico->save();
                return $this->success($topico);
            } catch (\Throwable $th){
                return $this->error("Topico não encontrado! ", 401, $th->getMessage());
            }
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
        try{
            $topico = Topico::findOrFail($id);
            $topico->delete();
            return $this->success($topico);
        } catch (\Throwable $th){
            return $this->error("Topico não encontrado! ", 401, $th->getMessage());
        }
    }
}
