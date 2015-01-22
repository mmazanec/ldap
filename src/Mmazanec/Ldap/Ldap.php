<?php

namespace Mmazanec\Ldap;

use adLDAP\adLDAP;

class Ldap
{

  protected $options;
  protected $adldap;

  /**
   * @param array $options
   */
  public function __construct($options)
  {
    $this->options = $options;
    $this->adldap = new adLDAP($this->options);
  }

  /**
   * Authenticate a user.
   *
   * @param $userName
   * @param $password
   * @return bool
   * @throws \adLDAP\adLDAPException
   */
  public function authenticate($userName, $password)
  {
    return $this->adldap->authenticate($userName, $password);
  }


  /**
   * Get info for a group
   *
   * @param $groupName
   * @return array
   */
  public function getGroup($groupName)
  {
    return$this->adldap->group()->info($groupName);
  }

  /**
   * Get user data from AD
   *
   * @param $userName
   * @return array
   */
  public function getUser($userName)
  {
    return$this->adldap->user()->info($userName);
  }

  /**
   * Get a user's groups
   *
   * @param $userName
   */
  public function getUserGroups($userName)
  {

  }
}
