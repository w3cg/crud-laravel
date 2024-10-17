<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $nombre
 * @property $categoria_id
 * @property $marca_id
 * @property $unidad_id
 * @property $precioCompra
 * @property $precioVenta
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Marca $marca
 * @property Unidade $unidade
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'categoria_id', 'marca_id', 'unidad_id', 'precioCompra', 'precioVenta', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class, 'categoria_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marca()
    {
        return $this->belongsTo(\App\Models\Marca::class, 'marca_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unidade()
    {
        return $this->belongsTo(\App\Models\Unidade::class, 'unidad_id', 'id');
    }
    
}
