@extends('layouts.app')

@section('content')

@if (Route::has('login'))
@auth

<style>
#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h3 {
  text-align: center;
}

input {
  padding: 5px;
  display:inline-block !important;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}


/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 5px 10px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
  margin-top:18px !important;
}

button#nextBtn{
  position:relative !important;
  right:15px !important;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 25px;
  width: 25px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 100%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #dfb351;
}
.hijos
{
  margin-top:10px !important;
  margin-bottom:10px !important;
}

@media all and (max-width: 320px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:50% !important;
    }
}

@media all and (min-width: 375px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:42% !important;
    }
}

@media all and (min-width: 424px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:37% !important;
    }
}

@media all and (min-width: 427px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:28% !important;
    }
}

@media all and (min-width: 768px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:21% !important;
    }
}

@media all and (min-width: 1023px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:16% !important;
    }
}

@media all and (min-width: 1439px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:12% !important;
    }
}

.quitar{
  display:none !important;
}

.poner{
  display:block  !important;
  
}

#crearV{
    width: 120px !important;
    height: 39px !important;
    /*margin: auto !important;*/
    padding-bottom: 15px;
    float: right !important;
    
}

button#crearV{
    display:inline-block;
    padding: 0.3em 1.2em;
    margin:0 0.1em 0.1em 0;
    border:0.16em solid rgba(255,255,255,0);
    border-radius:2em;
    box-sizing: border-box;
    text-decoration: none;
    color:#FFFFFF !important;
    text-shadow: 0 0.04em 0.04em rgba(0,0,0,0.35);
    text-align: center;
    transition: all 0.2s;
    background-color: #2a5483 !important;
    outline:none !important;
}

button#nextBtn{
    display:inline-block;
    padding: 0.3em 1.2em;
    margin:17px 0.1em 0.1em 0 !important;
    border:0.16em solid rgba(255,255,255,0);
    border-radius:2em;
    box-sizing: border-box;
    text-decoration: none;
    color:#FFFFFF !important;
    text-shadow: 0 0.04em 0.04em rgba(0,0,0,0.35);
    text-align: center;
    transition: all 0.2s;
    background-color: #2a5483;
    outline:none !important;
}

button#prevBtn{
    display:inline-block;
    padding: 0.3em 1.2em;
    margin:0 0.1em 0.1em 0;
    border:0.16em solid rgba(255,255,255,0);
    border-radius:2em;
    box-sizing: border-box;
    text-decoration: none;
    color:#FFFFFF !important;
    text-shadow: 0 0.04em 0.04em rgba(0,0,0,0.35);
    text-align: center;
    transition: all 0.2s;
    background-color: #2a5483;
    outline:none !important;
}

::-webkit-input-placeholder {
   text-align: center;
}

:-moz-placeholder { /* Firefox 18- */
   text-align: center;  
}

::-moz-placeholder {  /* Firefox 19+ */
   text-align: center;  
}

:-ms-input-placeholder {  
   text-align: center; 
}

</style>

<!--Formulario completo por pasos de crear el personaje-->
<form method="POST" action="{{route('registrar')}}" id="formulario" name="formulario"  class="estiloSombreado">
    {!! csrf_field() !!}  
   <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center; margin-top:5px !important; margin-bottom:10px !important; padding-top:9px !important;" >
    <span class="step">1</span>
    <span class="step">2</span>
    <span class="step">3</span>
  </div>
  
  <div class="container tab ">
  <h3>Datos del personaje</h3>
    <div class="row ">
      <div class="col-sm-12 col-md-12 col-lg-12 text-center  ">
        <input class="hijos " type="text" placeholder="Nombre de la partida" id="nickPartida" name="nickPartida">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
        <label id="lnick"></label>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
          <select id="selectRaza" name="raza" class="hijos" style="padding:5px !important; ">
            <option disabled selected value=""> -- Elija una raza -- </option>
            <option value="Humano">Humano/a</option>
            <option value="Elfo">Elfo/a</option>
            <option value="SemiElfo">SemiElfo/a</option>
            <option value="Orco">Orco/a</option>
            <option value="SemiOrco">Semi-Orco/a</option>
            <option value="Enano">Enano/a</option>
            <option value="Gnomo">Gnomo</option>
            <option value="Mediano">Mediano/a</option>
          </select>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
          <input class="hijos" type="text" placeholder="Nombre"  value="" name="nombrePersonaje">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
          <input class="hijos" type="text" placeholder="Apodo"  name="apodo">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
          <input class="hijos" type="text" placeholder="Altura en metros"  name="altura">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
          <label >Edad:</label>
          <input class="hijos" type="number" placeholder="(1-110)" name="edad" min="1" max="110"><br>
          <input class="hijos hijosv2" id="peso" type="text" placeholder="Peso en kg" name="peso">
        </div>
    </div>
    <div class="row">    
          <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
          <div> Sexo del personaje : <br/></div>
            <input type="radio" id="sexo" name="sexo" value="F"> Femenino<br>
            <input type="radio" id="sexo" name="sexo" value="M"> Masculino<br>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
            <label id="lsexo"></label>
          </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
          <input class="hijos" type="text" placeholder="Vida"  name="vida">
        </div>
    </div>
        <!-- <p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p>
        
    <div class="form-group" style="width:200px !important; margin:auto !important;padding-bottom: 15px;" >
        <button class="btn btn-primary btn-block"  type="submit">Crear personaje</button>
    </div>
         -->
  </div>
  <div class="container tab">
   <h3>Clase y equipamiento</h3>
   <div class="row">
     <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
         <label >Nivel:</label>
         <input class="hijos" type="number" placeholder="(1-100)" name="nivel" min="1" max="100">
     </div>
      <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
          <select name="clase" class="hijos" style="padding:5px !important;" onchange='annadirArmas(this.value),tipoArmadura(this.value)'>
            <option disabled selected value=""> -- Elija una clase -- </option>
            <option value="Barbaro">Barbaro</option>--
            <option value="Bardo">Bardo</option>
            <option value="Clérigo">Clérigo</option>-
            <option value="Druida">Druida</option>-
            <option value="Explorador">Explorador</option>
            <option value="Guerrero">Guerrero</option>--
            <option value="Hechicero">Hechicero</option>-
            <option value="Mago">Mago</option>-
            <option value="Monje">Monje</option>-
            <option value="Paladín">Paladín</option>--
            <option value="Pícaro">Pícaro</option>
          </select>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
          <select name="arma" class="hijos" id="selectArma" style="padding:5px !important;" disabled onchange='habilitarEscudo(this.value)'>
            <option disabled selected value=""> -- Elija un arma-- </option>
            <!--<option value="Espadas">Espadas</option>
            <option value="Hachas">Hachas</option>
            <option value="Mazas">Mazas</option>
            <option value="Mandoble">Mandoble</option>
            <option value="Bastones">Bastones</option>
            <option value="Cetro">Cetro</option>
            <option value="Varitas">Varitas</option>
            <option value="Arcos">Arcos</option>
            <option value="Cuchillos">Cuchillos</option>
            <option value="Puñales">Puñales</option>
            <option value="Pico">Pico</option>
            <option value="Ballestas">Ballestas</option>-->
          </select>
      </div>

      <div id="armadura">
      
      </div>

      <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
        <input type="text" name="escudo" placeholder="Escribe el tipo de escudo" id="escudo" style="text-align:center !important;" disabled>
      </div>
      
      <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
        <input class="hijos" type="text" placeholder="Habilidad 1"  name="habilidad1">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
        <input class="hijos" type="text" placeholder="Habilidad 2"  name="habilidad2">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
        <input class="hijos" type="text" placeholder="Habilidad 3"  name="habilidad3">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 text-center ">
        <input class="hijos" type="text" placeholder="Habilidad 4"  name="habilidad4">
      </div>
  </div>
  </div>

  <div class="container tab">
  <h3>Características y objetos</h3>
      <div class="row ">
        <div class="col-sm-6 col-md-6 col-lg-6 text-center ">
            <input class="hijos" type="number" placeholder="Fuerza mínima 0" name="fuerza" min="0" id="" required>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 text-center ">
            <input class="hijos" type="number" placeholder="Destreza mínima 0" name="destreza" min="0" id="" required>
        </div>
      </div>
      <div class="row ">
        <div class="col-sm-6 col-md-6 col-lg-6 text-center ">
            <input class="hijos" type="number" placeholder="Constitución mínima 0" name="constitucion" min="0" id="" required>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 text-center ">
            <input class="hijos" type="number" placeholder="Inteligencia mínima 0" name="inteligencia" min="0" id="" required>
        </div>
      </div>
      <div class="row ">
        <div class="col-sm-6 col-md-6 col-lg-6 text-center ">
            <input class="hijos" type="number" placeholder="Sabiduría mínima 0" name="sabiduria" min="0" id="" required>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 text-center ">
            <input class="hijos" type="number" placeholder="Carisma mínima 0" name="carisma" min="0" id="" required>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 text-center ">
          <textarea class="hijos" name="objetos" placeholder="Incluir 4 objetos como máximo" id="objetos" cols="28" rows="5" required></textarea>
        </div>    
        <div class="col-sm-6 col-md-6 col-lg-6 text-center ">
          <textarea class="hijos" name="personalidad" placeholder="Haga un resumén de la personalidad" id="personalidad" cols="28" rows="5" required></textarea>
        </div>
      </div>
  </div>

  <div style="overflow:auto;">
    <div>
      <button style="float:left;"type="button" id="prevBtn" onclick="nextPrev(-1)">Atras</button>
      <button style="float:right;" type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
      <div class="form-group quitar" id="divCrear" style="width:200px !important; margin:auto !important;padding-bottom: 15px; float:right !important;">
          <button  id="crearV" type="submit">Crear</button>
      </div>
    </div>
  </div>
</form>
<script>
 var arrayNombres = <?php echo(json_encode($response)); ?>;
</script>
<script src="{{asset('js/propio.js')}}"></script>

@else

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12" >
         <h1 style="text-align:center !important; font-weight:bold !important; align-content: center;">Debe iniciar sesión o registrarse</h1>
        </div>
    </div>
</div>

@endauth
@endif
@endsection
