<?php

namespace Mmazanec\Ldap\Objects;

class User {

  public $email = '';
  public $userName = '';
  public $displayName = '';

  public function __construct($adUser)
  {
    $this->setUser($adUser);
  }

  /**
   * Set up the user object
   *
   * @param $adUser
   */
  public function setUser($adUser)
  {
    $this->email = $adUser[0]['mail'][0];
    $this->displayName = $adUser[0]['displayname'][0];
    $this->userName = $adUser[0]['samaccountname'][0];
  }
}