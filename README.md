iDevWeb v1.1
=======

By Benoit PASQUIER

Resume:
=======

iDevWeb is a web app available like an intranet.
It's an easy tool to list your projects in your apache server.
Design is based on Twitter boostrap CSS.
An authenticate form limits the access to it.

Developped for MAMP, you can install it for WAMP or other web servers.

Install:
=======

Edit the 'config.php' file:

```php
// Define global vars
define('PATH_URL', 'http://localhost:8888/iDevWeb/');
define('MAMP_URL','http://localhost:8888/MAMP/?language=French');
define('PATH_FOLDER', '/var/www/iDevWeb/');
 
// boolean for activate authentication
define('AUTHENTICATION', true);
 
// Define login password
define('LOGIN', 'user');
define('PASSWORD', 'password');
```


Use it:
=======

Open a web browser and go to your localhost domain.
On the "Configuration" page, you can pick which projects you want to show/hide

Help and More:
=======

Read my french blog on it : https://benoitpasquier.com
