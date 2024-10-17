<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $producto?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="categoria_id" class="form-label">{{ __('Categoría') }}</label>
            <select name="categoria_id" class="form-select @error('categoria_id') is-invalid @enderror" id="categoria_id">
                <option value="" disabled {{ is_null($producto?->categoria_id) ? 'selected' : '' }}>Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ (old('categoria_id', $producto?->categoria_id) == $categoria->id) ? 'selected' : '' }}>
                    {{ $categoria->nombre }} <!-- Asegúrate de que 'nombre' es la propiedad correcta -->
                </option>
                @endforeach
            </select>
            {!! $errors->first('categoria_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="marca_id" class="form-label">{{ __('Marca') }}</label>
            <select name="marca_id" class="form-select @error('marca_id') is-invalid @enderror" id="marca_id">
                <option value="" disabled {{ old('marca_id', $producto?->marca_id) ? '' : 'selected' }}>Seleccione una marca</option>
                @foreach($marcas as $marca)
                <option value="{{ $marca->id }}" {{ (old('marca_id', $producto?->marca_id) == $marca->id) ? 'selected' : '' }}>
                    {{ $marca->nombre }} <!-- Asegúrate de que 'nombre' es la propiedad correcta -->
                </option>
                @endforeach
            </select>
            {!! $errors->first('marca_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="unidad_id" class="form-label">{{ __('Unidad') }}</label>
            <select name="unidad_id" class="form-select @error('unidad_id') is-invalid @enderror" id="unidad_id">
                <option value="" disabled {{ old('unidad_id', $producto?->unidad_id) ? '' : 'selected' }}>Seleccione una unidad</option>
                @foreach($unidades as $unidad)
                <option value="{{ $unidad->id }}" {{ (old('unidad_id', $producto?->unidad_id) == $unidad->id) ? 'selected' : '' }}>
                    {{ $unidad->nombre }} <!-- Asegúrate de que 'nombre' es la propiedad correcta -->
                </option>
                @endforeach
            </select>
            {!! $errors->first('unidad_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="precio_compra" class="form-label">{{ __('Precio Compra') }}</label>
            <input type="text" name="precioCompra" class="form-control @error('precioCompra') is-invalid @enderror" value="{{ old('precioCompra', $producto?->precioCompra) }}" id="precio_compra" placeholder="Precio Compra">
            {!! $errors->first('precioCompra', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="precio_venta" class="form-label">{{ __('Precio Venta') }}</label>
            <input type="text" name="precioVenta" class="form-control @error('precioVenta') is-invalid @enderror" value="{{ old('precioVenta', $producto?->precioVenta) }}" id="precio_venta" placeholder="Precio Venta">
            {!! $errors->first('precioVenta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <!-- <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $producto?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> -->

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
