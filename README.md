#Ldap
An adLDAP wrapper for Laravel 4. ***Not ready for use in a production environment***.

##How to install
Add the package to composer.json - it is not currently in packagist, so you'll have to add the github repo:

    "repositories": [{
    	  "type": "vcs",
    	  "url":"https://github.com/mmazanec/ldap.git"
    	}],
Then add the package itself:

    "mmazanec/ldap": "dev-master"
and run `composer update`.

Next add the service provider to app/config/app.php:

    'Mmazanec\Ldap\LdapServiceProvider',
	
then publish the configuration file:

    php artisan config:publish mmazanec/ldap

You'll need to add your configuration options to app/config/packages/mmazanec/ldap/ldap.php.

##Using Ldap
To use Ldap, simply call the method:

    $authenticated = Ldap::authenticate('jsmith', 'p@assw0rd');
    $user = Ldap::getUser('jsmith');
    $group = Ldap::getGroup('Accounting');
    $access = Ldap::inGroup('jsmith', 'Accounting');
    $userGroups = Ldap::getUserGroups('jsmith')