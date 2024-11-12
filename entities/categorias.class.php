<?php
require_once 'entities/database/IEntity.class.php';
class Categoria implements IEntity {
 
    private $id;
    private $nombre;
    private $numImagenes;

    public function __construct(string $nombre = "", int $numImagenes = 0)
    {
        $this->nombre = $nombre;
        $this->numImagenes = $numImagenes;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id) 
    {
        $this->id = $id;

        return $this;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNumImagenes(): int
    {
        return $this->numImagenes;
    }

    public function setNumImagenes(int $numImagenes)
    {
        $this->numImagenes = $numImagenes;

        return $this;
    }

    public function toArray(): array{
        return [
        'id' => $this->getId(),
        'nombre' => $this->getNombre(),
        'numImagenes' => $this->getNumImagenes()
        ];
    }
}