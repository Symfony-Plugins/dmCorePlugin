<?php

class dmDataService extends dmService
{

	protected
	  $datas = array(
	    "user",
      "site",
	    "layouts",
	    "pages"
	  );

  public function execute()
  {
  	foreach($this->datas as $data)
  	{
  		$this->log("load data $data");
  		$method = "load".dmString::camelize($data);
  		$this->$method();
  	}
  }

  protected function loadSite()
  {
    if (!DmSitePeer::getInstance())
    {
      DmSitePeer::build()
      ->setName(dmString::humanize(dmProject::getKey()))
      ->save();
    }
  }

  protected function loadUser()
  {
    if (!$super_admin = dm::db('sfGuardUser')->where('IsSuperAdmin', true)->findOne())
    {
      $super_admin = new sfGuardUser();
      $super_admin->setIsSuperAdmin(true);
      $super_admin->setUsername("admin");
      $super_admin->setPassword("admin");
      $super_admin->save();

      $profile = $super_admin->getProfile();
    }
  }

  protected function loadLayouts()
  {
    DmLayoutPeer::getFirstOrCreate();
  }

  protected function loadPages()
  {
    if (!dm::db('DmPage')->whereRoot()->findOne())
    {
      DmPagePeer::build()
      ->setName('Accueil')
      ->setTitle('Accueil | '.DmSitePeer::getInstance()->getName())
      ->setModuleAction('root.root')
      ->save();
    }

    if (!dm::db('DmPage')->whereModuleAction('main.error404')->findOne())
    {
      DmPagePeer::build()
      ->setName('Page introuvable')
      ->setTitle('Page introuvable | '.DmSitePeer::getInstance()->getName())
      ->setModuleAction('main.error404')
      ->save();
    }
  }


  protected function loadPermissions()
  {
    $array = array(
      "admin" => "Administration I",
      "admin_2" => "Administration II",
      "edition_1" => "Edition I",
      "edition_2" => "Edition II",
      "edition_3" => "Edition III",
      "edition_4" => "Edition VI",
      "produit_w" => "Gestion du contenu",
      "e_commerce" => "Gestion de l'e-commerce",
      "e_commerce_commande" => "Commandes de l'e-commerce",
      "datamining" => "Datamining",
      "referencement" => "Référencement",
      "traduction" => "Traduction",
      "extranet_admin" => "Administration des comptes extranet",
      "integration" => "Intégration",
      "versioning" => "Versioning",
      "alerte" => "Alertes Courriels",
      "sort_tree" => "Ordonner les pages",
      "systeme" => "Super Admin",
      "todo_list" => "Tout doux liste",
      "mediatheque" => "Médiathèque",
      "search" => "Moteur de recherche",
      "spy" => "Espionnage",
      "crawler" => "Auditer le site",
      "analytics" => "Google analytics"
    );

    foreach($array as $name => $description)
    {
      if (!sfGuardPermissionPeer::retrieveByName($name))
      {
        $object = new sfGuardPermission();
        $object->setName($name);
        $object->setDescription($description);
        $object->save();
      }
    }
  }


  protected function loadGabarits()
  {
    $gabarits = array(
      "1 colonne" => "
width=100%",
      "2 colonnes" => "
width=49% class=.mgr2p
width=49%",
      "Entête, 2 colonnes" => "
width=100%
width=49% class=.mgr2p
width=49%",
      "Entête, 2 colonnes, Pied" => "
width=100%
width=49% class=.mgr2p
width=49%
width=100%",
      "2 colonnes, Pied" => "
width=49% class=.mgr2p.truc
width=49%
width=100%",
      "3 colonnes" => "
width=32% class=.mgr2p
width=32% class=.mgr2p
width=32%",
      "Entête, 3 colonnes" => "
width=100%
width=32% class=.mgr2p
width=32% class=.mgr2p
width=32%",
      "Entête, 3 colonnes, Pied" => "
width=100%
width=32% class=.mgr2p
width=32% class=.mgr2p
width=32%
width=100%",
      "3 colonnes, Pied" => "
width=32% class=.mgr2p
width=32% class=.mgr2p
width=32%
width=100%"
    );

    foreach($gabarits as $nom => $description)
    {
      if (!sfPropul::getObjectBy("DmsGabarit", "nom", $nom))
      {
        DmsGabaritPeer::build($nom, $description, true);
      }
    }
  }

  protected function loadValidatorI18n()
  {
    $array = array(
      "Required." => "Ce champ est requis",
      "Invalid" => "Ce champ n'est pas valide"
    );

    $culture = "fr";
    foreach($array as $source => $target)
    {
      TransUnitPeer::save($source, $target, $culture, TransUnit::VALIDATOR);
    }
  }

  protected function loadAdminI18n()
  {
    $array = array(
      "create" => "Nouveau",
      "Actions" => "Actions",
      "filters" => "Filtres",
      "filter" => "Filtrer",
      "reset" => "Annuler",
      "[0] no result|[1] 1 result|(1,+Inf] %1% results" => "[0] pas de résultat|[1] 1 résultat|(1,+Inf] %1% résultats",
      "list" => "Liste",
      "delete" => "Supprimer",
      "save" => "Enregistrer (Ctrl+S)",
      "save and add" => "Enregistrer et Nouveau (Ctrl+Shift+S)",
      "duplicate" => "Dupliquer",
      "Your modifications have been saved" => "Vos modifications ont été enregistrées",
      "Are you sure?" => "Etes-vous sur ?",
      "There are some errors that prevent the form to validate" => "Certaines erreurs ne permettent pas d'enregistrer les modifications",
      "no result" => "Aucun enregistrement",
      "Could not delete the selected %s" => "Impossible de supprimer : %s",
      "edit" => "Editer",
      "Unassociated" => "Non associé",
      "Associated" => "Associé",
      "remove file" => "Supprimer le fichier",
      "[show file]" => "[visualiser]",
      "Forgot your password?" => "Mot de passe perdu ?",
      "username" => "Nom d'utilisateur",
      "password" => "Mot de passe",
      "Remember me?" => "Se souvenir de moi ?",
      "yes" => "oui",
      "no" => "non",
      "yes or no" => "oui ou non",
      "You don't have the requested permission to access this page." => "Vous n'êtes pas autorisé à accéder à cette page.",
      "save and list" => "Enregistrer et Retour sur liste (Alt+S)",
      "is empty" => "Global",
      "EmploiOffres" => "Offres d'emploi",
      "EmploiCandidatures" => "Candidatures",
      "Emplois" => "Modules emploi",
      "Gallerys" => "Galleries d'images",
      "Gallerie d'imagess" => "Galleries d'images",
      "Next" => "Suivant",
      "Previous" => "Précédent",
      "First" => "Premier",
      "Last" => "Dernier",
      "Is published:" => "Est publiée:",
      "Is approved" => "Actif",
      "Is approved:" => "Est actif:",
      "Has rss:" => "Diffuse du RSS:",
      "Nom fr" => "Nom",
      "Nom fr:" => "Nom:",
      "Updated at" => "Mise à jour",
      "Updated at:" => "Mise à jour:",
      "Created at" => "Création",
      "Created at:" => "Création:",
      "Previz" => "Aperçu",
      "Previz mini" => "Image",
      "Resume" => "Résumé",
      "Resume:" => "Résumé:",
      "Query" => "Requête",
      "Image alt" => "Légende",
      "Image alt:" => "Légende:",
      "Your modifications have been saved" => "Vos modifications ont été enregistrées",
      "Required" => "Ce champ ne devrait pas être vide"
    );

    $culture = "fr";
    foreach($array as $source => $target)
    {
      TransUnitPeer::save($source, $target, $culture, TransUnit::ADMIN);
    }

  }

}