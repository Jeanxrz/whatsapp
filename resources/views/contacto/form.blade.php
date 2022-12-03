<label for="telefono">telefono</label>
        <input class="form-control m-2" type="text" value="{{old('telefono',$contacto->telefono ?? '')}}" id="telefono" name="telefono">

        <label for="parentesco">Parentesco</label>
        <input class="form-control m-2" type="text" value="{{old('parentesco',$contacto->parentesco ?? '')}}" id="parentesco" name="parentesco">

        <select value="{{old('persona_id',$contacto->persona_id ?? '')}}" id="persona_id" name="persona_id">
                <option value="1">Lucas</option>
                <option value="2">Marcos</option>
                <option value="3">Julio</option>
        </select>

        <button class="btn bg-info m-3" type="submit">Guardar</button>