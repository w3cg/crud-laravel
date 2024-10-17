<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Unidade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // $productos = Producto::paginate();
        $productos = Producto::where('estado', 1)->orderBy('nombre', 'asc')->paginate();

        return view('producto.index', compact('productos'))
            ->with('i', ($request->input('page', 1) - 1) * $productos->perPage());
    }

    public function pdf()
    {
        // $productos = Producto::paginate();
        $productos = Producto::where('estado', 1)->orderBy('nombre', 'asc')->paginate();

        $pdf = PDF::loadView('producto.pdf', ['productos' => $productos]);
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
        return $pdf->download('productos.pdf');

        // return view('producto.pdf', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $producto = new Producto();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $unidades = Unidade::all();

        return view('producto.create', compact('producto', 'categorias', 'marcas', 'unidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['estado'] = 1;

        Producto::create($data);

        return Redirect::route('productos.index')
            ->with('success', 'Producto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $unidades = Unidade::all();

        return view('producto.edit', compact('producto', 'categorias', 'marcas', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, Producto $producto): RedirectResponse
    {
        $producto->update($request->validated());

        return Redirect::route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $producto = Producto::find($id);

        if ($producto) {
            $producto->update(['estado' => 0]);
        }

        return Redirect::route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }

}
