<?php
function login(string $identifiant, string $password)
{
  global $db;
  $query = $db->prepare('SELECT * FROM users WHERE identifiant = ?');
  if ($query == false) {
    return false;
  }
  $res = $query->execute([$identifiant, $password]);
  if ($res == false) {
    return false;
  }

  // Si l'utilisateur n'est pas trouvé
  $user = $query->fetch();
  if ($user == false) {
    return false;
  }

  // Si l'utilisateur est trouvé, on verifie si le mot de passe est correct
  if (password_verify($password, $user['password'])) {
    session_start();
    return true;
  }

  return false;
}
