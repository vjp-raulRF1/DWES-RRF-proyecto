<?php
require __DIR__ . '/../exceptions/file_exception.class.php';
class File
{
    private $file;
    private $fileName;
    public function __construct(string $fileName, array $arrTypes)
    {
        //con $fileName obtendremos el fichero mediante el array $ FILES que contiene
        //todos los ficheros que se suben al servidor mediante un formulario.
        $this->file = $_FILES[$fileName];
        $this->fileName = '';
        //Comprobamos que es array contiene el fichero
        if (!isset($this->file)) {
            //Mostrar un error
            throw new FileException('debes seleccionar un fichero');
        }
        //Verificamos si ha habido algún error durante la subida del fichero
        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            //Dentro del if verificamos de que tipo ha sido el error
            switch ($this->file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE: {
                        //Algún problema con el tamaño del fichero
                        throw new FileException('El fichero es demasiado grande');
                        break;
                    }
                case UPLOAD_ERR_PARTIAL: {
                        //Error en la transferencia subida incompleta
                        throw new FileException('No se ha podido subir el fichero completo');
                        break;
                    }
                default: {
                        //Error en la subida del fichero
                        throw new FileException('No se ha podido subir el fichero');
                        break;
                    }
            }
        }
        //Comprobamos si el fichero subido es de un tipo de los que tenemos soportados
        if (in_array($this->file['type'], $arrTypes) === false) {
            //Error, tipo no soportado
            throw new FileException('Tipo de fichero no soportado');
        }
    }
    public function getFileName()
    {
        return $this->fileName;
    }

    public function saveUploadFile(string $rutaDestino)
    {
        //Compruebo que el fichero temporal con el que vamos a trabajar se
        //haya subido previamente por petición Post
        if (is_uploaded_file($this->file['tmp_name']) === false) {
            throw new FileException('El archivo no se ha subido mediante el formulario');
        }
        //Cargamos el nombre del fichero
        $this->fileName = $this->file['name']; //nombre original del fichero cuando se subió
        $ruta = $rutaDestino . $this->fileName; //concateno la rutaDestino con el nombre del fichero
        //Comprobamos que la ruta no se corresponda con un fichero que ya exista
        if (is_file($ruta) == true) {
            //no sobreescribo, sino que genero uno nuevo añadiendo la fecha y hora actual
            $fechaActual = date(format: 'dmYHis');
            $this->fileName = $this->fileName . '_' . $fechaActual;
            $ruta = $rutaDestino . $this->fileName; //Actualizo la variable ruta con el nuevo nombre
        }
        //muevo el fichero subido del directorio temporal (viene definido en php.ini)
        if (move_uploaded_file($this->file['tmp_name'], $ruta) === false) {
            //devuelve false si no se ha podido mover
            throw new FileException("No se puede mover el fichero a su destino");
        }
    }
}
?>