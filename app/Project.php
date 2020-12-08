<?php


class Project
{
    private $id;
    private $nom;

    /**
     * Project constructor.
     * @param $id
     */
    public function __construct($uid)
    {
        $this->id=$uid;
    }

    /**
     * Renvoi l'id du projet
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Change l'ID du projet
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Renvoi le nom du projet
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Change le nom du projet
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


}