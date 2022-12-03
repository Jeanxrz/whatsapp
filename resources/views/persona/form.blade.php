<label for="nombre">Nombre</label>
        <input class="form-control m-2" type="text" value="{{old('nombre',$persona->nombre ?? '')}}" id="nombre" name="nombre">

        <label for="apaterno">Apellido Paterno</label>
        <input class="form-control m-2" type="text" value="{{old('apaterno',$persona->apaterno ?? '')}}" id="apaterno" name="apaterno">

        <label for="amaterno">Apellido Materno</label>
        <input class="form-control m-2" type="text" value="{{old('amaterno',$persona->amaterno ?? '')}}" id="amaterno" name="amaterno">
        
        <label for="foto">Foto</label>
        <input class="form-control m-2" type="file" value="{{old('foto',$persona->foto ?? '')}}" id="foto" name="foto">

        <button class="btn bg-info m-3" type="submit">Guardar</button>
