<?php
namespace App\Database;
/**
 * Class QueryBuilder - it makes queries to database
 */
class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    //General
  public function addNew($table, $payload){
      var_dump($payload);
    $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)",
      $table,
      implode(", ", array_keys($payload)),
      ":" . implode(", :", array_keys($payload))
    );
    $query = $this->pdo->prepare($sql);
    if ($query->execute($payload)){
      echo json_encode("Successfully created");
    }else{
      echo "<br> Error: Database not updated";
      var_dump($query->errorInfo());
    }
  }
  public function getAll($table, $model = "")
  {
    $query = $this->pdo->prepare("SELECT * FROM {$table}");
    $query->execute();

    if($model) {
      return $query->fetchAll(\PDO::FETCH_CLASS, $model);
    } else {
      return $query->fetchAll(\PDO::FETCH_OBJ);
    }
  }
  public function getOne($table, $id)
  {
    $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = {$id}");
    $query->execute();
    return $query->fetch(\PDO::FETCH_OBJ);

  }
  //Visits
  public function getAllVisits($table, $model = "")
  {
    $query = $this->pdo->prepare("SELECT visits.id, date , breed_name, client_name, client_lastname, client_photo, diagnosis, long_description, pet_name, pet_photo, photo, short_description, species, staff_name, staff_lastname, type FROM {$table} LEFT JOIN clients ON visits.clients_id = clients.id LEFT JOIN pets ON pets.clients_id = clients.id LEFT JOIN breeds ON pets.breed_id = breeds.id LEFT JOIN staff ON visits.staff_id = staff.id LEFT JOIN types ON visits.type_id = types.id");
    $query->execute();

    if($model) {
      return $query->fetchAll(\PDO::FETCH_CLASS, $model);
    } else {
      return $query->fetchAll(\PDO::FETCH_OBJ);
    }
  }
  public function getAllVisitsToday($table, $date, $model = "")
  {
    $query = $this->pdo->prepare("SELECT date , breed_name, client_name, client_lastname, client_photo, diagnosis, long_description, pet_name, pet_photo, photo, short_description, species, staff_name, staff_lastname, type FROM {$table} LEFT JOIN clients ON visits.clients_id = clients.id LEFT JOIN pets ON pets.clients_id = clients.id LEFT JOIN breeds ON pets.breed_id = breeds.id LEFT JOIN staff ON visits.staff_id = staff.id LEFT JOIN types ON visits.type_id = types.id WHERE visits.date = '{$date}'");
    $query->execute();

    if($model) {
      return $query->fetchAll(\PDO::FETCH_CLASS, $model);
    } else {
      return $query->fetchAll(\PDO::FETCH_OBJ);
    }
  }
  public function editVisit($table, $payload)
  {
    $query = $this->pdo->prepare("UPDATE {$table} SET pet_id = {$payload['pet_id']}, date = '{$payload['date']}', long_description = '{$payload['long_description']}', short_description = '{$payload['short_description']}', diagnosis = '{$payload['diagnosis']}', photo = '{$payload['photo']}', type_id = {$payload['type_id']}, clients_id = {$payload['clients_id']} WHERE id = {$payload['id']}");
    if ($query->execute($payload)){
      echo json_encode("Successfully updated");
    }else{
      echo "<br> Error: Database not updated";
      var_dump($query->errorInfo());
    }
  }
  public function getPetsVisits($table, $pet_id)
  {
    $query = $this->pdo->prepare("SELECT date, long_description, short_description, diagnosis, photo  FROM {$table} LEFT JOIN pets ON pet_id = pets.id WHERE pet_id = {$pet_id}");
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_OBJ);

  }
  //Pets
  public function addNewPet($table, $payload){
    $query = $this->pdo->prepare("INSERT INTO {$table} (pet_name, species, pet_photo, breed_id, clients_id) VALUES ('{$payload['pet_name']}', '{$payload['species']}', '{$payload['pet_photo']}', {$payload['breed_id']}, {$payload['clients_id']})");
    var_dump($query);
    if ($query->execute($payload)){
      echo json_encode("Successfully created");
    }else{
      echo "<br> Error: Database not updated";
      var_dump($query->errorInfo());
    }
  }
  public function getClientsPets($table, $client_id)
  {
    $query = $this->pdo->prepare("SELECT pets.id, pet_name, pet_photo, species, breed_name  FROM {$table} LEFT JOIN breeds ON breed_id = breeds.id WHERE clients_id = {$client_id}");
    $query->execute();
    return $query->fetchAll(\PDO::FETCH_OBJ);

  }
  public function editPet($table, $payload){
    $query = $this->pdo->prepare("UPDATE {$table} SET pet_name = '{$payload['pet_name']}', species = '{$payload['species']}', pet_photo = '{$payload['client_photo']}' WHERE id = {$payload['id']} ");
    if ($query->execute($payload)){
      echo json_encode("Successfully updated");
    }else{
      echo "<br> Error: Database not updated";
      var_dump($query->errorInfo());
    }
  }
  //Staff
  public function getOneStaff($table, $email)
  {
    $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE email = '{$email}'");
    $query->execute();
    return $query->fetch(\PDO::FETCH_OBJ);

  }
  //CLients
  public function editClient($table, $payload){
    $query = $this->pdo->prepare("UPDATE {$table} SET client_name = '{$payload['client_name']}', client_lastname = '{$payload['client_lastname']}', client_photo = '{$payload['client_photo']}' WHERE id = {$payload['id']} ");
    if ($query->execute($payload)){
      echo json_encode("Successfully updated");
    }else{
      echo "<br> Error: Database not updated";
      var_dump($query->errorInfo());
    }
  }
}
