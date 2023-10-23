<?php

class Imagen{
    /**
     * Analiza si el tipo de archivo recibido es admitido, retorna booleano
     * con la respuesta
     * @param string $archivo
     * @return boolean
     */
    function analizarArchivo($archivo)
    {
        $archivo = strtolower($archivo);
        $admitido = true;

        //Preparo nombre del archivo + tipo archivo
        $mystring = $archivo;
        $encontrar   = '.png';
        $encontrar2   = '.jpg';

        //Concateno nombre del archivo + tipo de archivo
        $pos1 = strpos($mystring, $encontrar);
        $pos2 = strpos($mystring, $encontrar2);

        //Evalúo si el archivo es de tipo ".png" o ".jpg"
        if ($pos1 === false && $pos2 === false) {
            $admitido = false;


            
        } 

        return $admitido;
    }

}