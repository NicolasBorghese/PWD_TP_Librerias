<?php 

class CuentaUsuario {

    //ATRIBUTOS
    private $direccionMail;
    private $contrasenia;
    private $nombrePersona;
    private $apellidoPersona;
    private $telefono;

    private $mensajeoperacion;
    
    //CONSTRUCTOR
    /**
     * Crea un objeto de tipo CuentaUsuario
     */
    public function __construct(){
        
        $this->direccionMail = "";
        $this->contrasenia = "";
        $this->nombrePersona = "";
        $this->apellidoPersona = "";
        $this->telefono = "";

        $this->mensajeoperacion = "";
    }

    /**
     * Actualiza los atributos del objeto por los recibidos por parámetro
     * 
     * @param string $direccionMail
     * @param string $contrasenia
     * @param string $nombrePersona
     * @param string $apellidoPersona
     * @param string $telefono
     */
    public function setear($direccionMail, $contrasenia, $nombrePersona, $apellidoPersona, $telefono){

        $this->setDireccionMail($direccionMail);
        $this->setContrasenia($contrasenia);
        $this->setNombrePersona($nombrePersona);
        $this->setApellidoPersona($apellidoPersona);
        $this->setTelefono($telefono);
    }
    
    // OBSERVADORES Y MODIFICADORES

    public function getDireccionMail(){
        return $this->direccionMail;  
    }
    public function setDireccionMail($direccionMail){
        $this->direccionMail = $direccionMail;
    }
    
    public function getContrasenia(){
        return $this->contrasenia; 
    }
    public function setContrasenia($contrasenia){
        $this->contrasenia = $contrasenia;
    }

    public function getNombrePersona(){
        return $this->nombrePersona; 
    }
    public function setNombrePersona($nombrePersona){
        $this->nombrePersona = $nombrePersona;
    }

    public function getApellidoPersona(){
        return $this->apellidoPersona; 
    }
    public function setApellidoPersona($apellidoPersona){
        $this->apellidoPersona = $apellidoPersona;
    }

    public function getTelefono(){
        return $this->telefono; 
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
    }
    
    //PROPIOS DE LA CLASE

    /**
     * Toma el atributo donde está cargado el id del objeto y lo utiliza para realizar
     * una consulta a la base de datos con el objetivo de actualizar el resto de los atributos del objeto.
     * Retora un booleano que indica el éxito o falla de la operación
     * 
     * @return boolean
     */
    public function cargar(){
        $exito = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM cuentaUsuario WHERE direccionMail = ".$this->getDireccionMail();

        //Verifica si esta activa la base de datos
        if ($base->Iniciar()) {

            //Ejercuta la consulta (en este caso es un select, debe devolver un arreglo de registros)
            $res = $base->Ejecutar($sql);

            //Si $res es mayor a -1 quiere decir que la consulta se ejecuto con éxito
            if($res >-1){

                //Si $res es mayor a 0 quiere decir que la consulta genero al menos 1 registro
                if($res > 0){

                    /*Guardo en el arreglo $row el resultado del primer registro obtenido y seteo
                    esos valores al objeto Auto actual*/
                    $row = $base->Registro();

                    $this->setear($row['direccionMail'], $row['contrasenia'], $row['nombrePersona'],
                    $row['apellidoPersona'], $row['telefono']);

                    $exito = true;
                }
            }
        } else {
            $this->setmensajeoperacion("CuentaUsuario->listar: ".$base->getError());
        }
        return $exito;
    }

    /**
     * Esta función lee los valores actuales de los atributos del objeto e inserta un nuevo
     * registro en la base de datos a partir de ellos.
     * Retorna un booleano que indica si le operación tuvo éxito
     * 
     * @return boolean
     */
    public function insertar(){

        $resp = false;
        $base = new BaseDatos();

        $sql = "INSERT INTO cuentaUsuario (direccionMail, contrasenia, nombrePersona, apellidoPersona, telefono) VALUES(
            '".$this->getDireccionMail()."', 
            '".$this->getContrasenia()."', 
            '".$this->getNombrePersona()."', 
            '".$this->getApellidoPersona()."',
            '".$this->getTelefono()."'
            );";

        if ($base->Iniciar()) {
            if ($id = $base->Ejecutar($sql)) {
                //Este objeto no tiene id con autoincrement
                // $this->getDireccionMail($id);
                $resp = true;
            } else {
                $this->setmensajeoperacion("CuentaUsuario->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("CuentaUsuario->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    /**
     * Esta función lee los valores actuales de los atributos del objeto y los actualiza en la
     * base de datos.
     * Retorna un booleano que indica si le operación tuvo éxito
     * 
     * @return boolean
     */
    public function modificar(){
        $resp = false;
        $base = new BaseDatos();

        $sql = "UPDATE cuentaUsuario SET 
        direccionMail = '".$this->getDireccionMail()."', 
        contrasenia = '".$this->getContrasenia()."', 
        nombrePersona = '".$this->getNombrePersona()."', 
        apellidoPersona = '".$this->getApellidoPersona()."', 
        Telefono = '".$this->getTelefono()."'
        WHERE direccionMail = '".$this->getDireccionMail()."'";

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("CuentaUsuario->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("CuentaUsuario->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    /**
     * Esta función lee el id actual del objeto y si puede lo borra de la base de datos
     * Retorna un booleano que indica si le operación tuvo éxito
     * 
     * @return boolean
     */
    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();

        $sql = "DELETE FROM cuentaUsuario WHERE direccionMail = '".$this->getDireccionMail()."'";

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("CuentaUsuario->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("CuentaUsuario->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    /**
     * Esta función recibe condiciones de busqueda en forma de consulta sql para obtener
     * los registros requeridos.
     * Si por parámetro se envía el valor "" se devolveran todos los registros de la tabla
     * 
     * La función devuelve un arreglo compuesto por todos los objetos que cumplen la condición indicada
     * por parámetro
     * 
     * @return array
     */
    public function listar($parametro){
        $arreglo = array();
        $base = new BaseDatos();

        $sql = "SELECT * FROM cuentaUsuario ";

        if ($parametro != "") {
            $sql .= 'WHERE '.$parametro;
        }

        $res = $base->Ejecutar($sql);
        if($res >- 1){
            if($res > 0){
                
                while ($row = $base->Registro()){

                    $obj = new CuentaUsuario();
                    $obj->setear($row['direccionMail'], $row['contrasenia'], $row['nombrePersona'], $row['apellidoPersona'],
                    $row['Telefono']);
                    array_push($arreglo, $obj);

                }
            }
        } else {
            $this->setmensajeoperacion("CuentaUsuario->listar: ".$base->getError());
        }
        return $arreglo;
    }

    /**
     * Esta función lee todos los valores de todos los atributos del objeto y los devuelve
     * en un arreglo asociativo
     * 
     * @return array
     */
    public function obtenerInfo(){

        $info = [];
        $info['direccionMail'] = $this->getDireccionMail();
        $info['contrasenia'] = $this->getContrasenia();
        $info['nombrePersona'] = $this->getNombrePersona();
        $info['apellidoPersona'] = $this->getApellidoPersona();
        $info['telefono'] = $this->getTelefono();

        return $info;
    }

}
?>