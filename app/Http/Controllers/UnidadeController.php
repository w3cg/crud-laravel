<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UnidadeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // $unidades = Unidade::paginate();
        $unidades = Unidade::where('estado', 1)->orderBy('nombre', 'asc')->paginate();

        return view('unidade.index', compact('unidades'))
            ->with('i', ($request->input('page', 1) - 1) * $unidades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $unidade = new Unidade();

        return view('unidade.create', compact('unidade'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnidadeRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['estado'] = 1;

        Unidade::create($data);

        return Redirect::route('unidades.index')
            ->with('success', 'Unidade created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $unidade = Unidade::find($id);

        return view('unidade.show', compact('unidade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $unidade = Unidade::find($id);

        return view('unidade.edit', compact('unidade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnidadeRequest $request, Unidade $unidade): RedirectResponse
    {
        $unidade->update($request->validated());

        return Redirect::route('unidades.index')
            ->with('success', 'Unidade updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $unidade = Unidade::find($id);

        if($unidade){
            $unidade->update(['estado' => 0]);
        }

        return Redirect::route('unidades.index')
            ->with('success', 'Unidade deleted successfully');
    }
}
