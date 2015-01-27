<?php

namespace Mmazanec\Ldap;

use adLDAP\adLDAP;
use Mmazanec\Ldap\Objects\User;

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
    return $this->adldap->group()->info($groupName);
  }

  /**
   * Get user data from AD
   *
   * @param $userName
   * @return mixed
   */
  public function getUser($userName)
  {
    $adUser = $this->adldap->user()->info($userName);
    if(!empty($adUser))
    {
      return new User($adUser);
    }

    return false;
  }

  /**
   * Get a user's groups
   *
   * @param $userName
   */
  public function getUserGroups($userName)
  {
      return $this->adldap->user()->groups($userName);
  }
    
  /**
  *  Determine if a user belongs to a specified group
  *
  * @param $userName
  * @param $groupName
  */
  public function inGroup($userName, $groupName)
  {
      return $this->adldap->user()->inGroup($userName, $groupName);
  }
}
