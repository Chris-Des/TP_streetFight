<?php
require_once('database.php');

class Personnage extends Database
{
  public int $id;
  public string $name;
  public int $life;
  public int $atk;
  public string $color;
  public mixed $fighterPdo;

  public function __construct()
  {
    parent::__construct();

    $this->id = 0;
    $this->name = '';
    $this->life = 0;
    $this->atk = 0;
    $this->color = '';
    $this->fighterPdo = $this->pdo->prepare('SELECT * FROM personnage');
  }

  public function setId(?int $id)
  {
    $this->id = $id;
  }


  public function getId()
  {
    return $this->id;
  }

  public function getPersonnage($id)
  {
    $stmt = $this->pdo->prepare('SELECT * FROM personnage WHERE id = ?');
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function listPersonnages()
  {
    $stmt = $this->fighterPdo;
    $stmt->execute();
    $fighters = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $fighters;
  }

  public function createPersonnage($name, $life, $atk, $color)
  {
    $stmt = $this->pdo->prepare('INSERT INTO personnage (name, life, atk, color) VALUES (?, ?, ?, ?)');
    $stmt->execute([$name, $life, $atk, $color]);
  }

  public function updateDetails($atk, $life, $color)
  {
    if ($this->id === 0) {
      echo "Erreur: ID non défini. Impossible de mettre à jour les détails.";
      return;
    }
    $currentValues = $this->getPersonnage($this->id);

    if ($currentValues !== false) {

      if ($currentValues['atk'] == $atk && $currentValues['life'] == $life && $currentValues['color'] == $color) {
        echo "Aucune mise à jour nécessaire. Les détails sont déjà à jour.";
        return;
      }
    } else {
      echo "Erreur lors de la récupération des détails actuels.";
      return;
    }
    $stmt = $this->pdo->prepare('UPDATE personnage SET atk = ?, life = ?, color = ? WHERE id = ?');
    $result = $stmt->execute([$atk, $life, $color, $this->id]);
    if ($result !== false) {
      echo "Détails mis à jour avec succès!";
    } else {
      echo "Erreur lors de la mise à jour des détails.";
    }
  }

  public function deadAttack($opponentAttack, $opponentName)
  {
      // Calculer les dégâts en fonction de l'attaque de l'adversaire
      $damage = $opponentAttack;
  
      // Réduisez la vie du personnage en fonction des dégâts
      $newLife = $this->life - $damage;
  
      // Assurez-vous que la vie ne devient pas négative
      $this->life = max(0, $newLife);
  
      // Ajoutez un message pour indiquer l'attaque
      echo "<p>{$opponentName} a attaqué {$this->name}, {$this->name} subit une attaque de {$damage} points.</br> Nouvelle vie : {$this->life}</p>";
  
      // Vérifiez si le personnage est mort
      if ($this->life === 0) {
          echo "<p>{$this->name} est mort!</p>";
      } else {
          echo "<p>{$this->name} est toujours en vie.</p>";
      }
  }
  
  
  
  
  

  public function getRandomPersonnage()
  {
    // Sélectionnez un ID de manière aléatoire dans la base de données
    $stmt = $this->pdo->prepare('SELECT * FROM personnage ORDER BY RAND() LIMIT 1');
    $stmt->execute();
    $randomPersonnage = $stmt->fetch(PDO::FETCH_ASSOC);

    // Mettez à jour les propriétés de l'objet avec les détails du personnage choisi
    $this->id = $randomPersonnage['id'];
    $this->name = $randomPersonnage['name'];
    $this->life = $randomPersonnage['life'];
    $this->atk = $randomPersonnage['atk'];

    return $randomPersonnage;
  }
}
