
 <label for="Estado">{{'Estado'}}</label>
     <input type="text" name="Estado" id="Estado" 
     
     value="{{isset($estado->Estado)?$estado->Estado:''}}">
      <br/>
     <br/>
     <input type="submit"  class="btn btn-success" value=" {{$Modo=='crear'?'Agregar':'Modificar '}}"> 
    
     <a href="{{ url('/estados') }}"  class="btn btn-primary">Cancelar</a>
