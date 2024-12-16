<?php

class Utilisateur
{
    private $insert;
    private $select;

    public function __construct($db)
    {
        $this->insert = $db->prepare("INSERT INTO utilisateurs(utilisateur_nom, utilisateur_prenom, utilisateur_pseudo, utilisateur_mdp, id_role) 
                                      VALUES(:utilisateur_nom, :utilisateur_prenom, :utilisateur_pseudo, :utilisateur_mdp, :id_role);");
        $this->select = $db->prepare("SELECT * 
                                      FROM utilisateurs
                                      JOIN roles ON (roles.role_id = utilisateurs.id_role);");
    }

    public function insert($sNom, $sPrenom, $sPseudo, $sMdp, $iIdRole)
    {
        $r = true;
        $this->insert->execute(array(
            ":utilisateur_nom" => strtoupper($sNom),
            ":utilisateur_prenom" => ucfirst(strtolower($sPrenom)),
            ":utilisateur_pseudo" => $sPseudo,
            ":utilisateur_mdp" => $sMdp,
            ":id_role" => $iIdRole
        ));
        if ($this->insert->errorCode() != 0) {
            print_r($this->insert->errorInfo());
            $r = false;
        }
        return $r;
    }

    public function select()
    {
        $this->select->execute();
        if ($this->select->errorCode() != 0) {
            print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>