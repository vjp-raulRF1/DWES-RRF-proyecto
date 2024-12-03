<?php
require_once 'exceptions/file_exception.class.php';
require_once 'utils/const.php';
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
            // Obtenemos el mensaje de error utilizando la función getErrorString
            $mensajeError = getErrorString($this->file['error']);
            
            // Lanzamos la excepción con el mensaje de error correspondiente
            throw new FileException($mensajeError);
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
        $contador=0;
        //Comprobamos que la ruta no se corresponda con un fichero que ya exista
        if (is_file($ruta) == true) {
            $contador++;
            
            $FNParts = explode(".", $this->fileName);
            $this->fileName = $FNParts[0] . "(" . $contador . ")." . $FNParts[1];

            // ACTUALIZO LA (ruta) CON EL NUEVO NOMBRE
            $ruta = $rutaDestino . $this->fileName;

            // SE REPITE MIENTRAS EXISTA UN FICHERO CON EL MISMO NOMBRE
            while (is_file($rutaDestino . $this->fileName) == true) {
                $contador++;
                $this->fileName = $FNParts[0] . "(" . $contador . ")." . $FNParts[1];

                $ruta = $rutaDestino . $this->fileName;
            }
        }
        //muevo el fichero subido del directorio temporal (viene definido en php.ini)
        if (move_uploaded_file($this->file['tmp_name'], $ruta) === false) {
            //devuelve false si no se ha podido mover
            throw new FileException("No se puede mover el fichero a su destino");
        }
    }

    public function copyFile (string $rutaOrigen, string $rutaDestino) {
        $origen = $rutaOrigen . $this->fileName;
        $destino = $rutaDestino . $this->fileName;
      
        if (is_file($origen) === false) {
          throw new FileException("No existe el fichero $origen que intentas copiar");
        }
      
        if (is_file($destino) === true) {
          throw new FileException("El fichero $destino ya existe y no se puede sobreescribirlo");
        }
      
        if (copy($origen, $destino) === false) {
          throw new FileException("No se ha podido copiar el fichero $origen a $destino");
        }
      }
}
?>