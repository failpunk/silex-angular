Silex-Angular
=============
> Angular.js application structure with a Silex PHP backend

The Stack
-------------
- [Silex](http://silex.sensiolabs.org/) a PHP microframe built from Symfony components
- [Angular.js](http://angularjs.org/) Javascript framework from Google
- [Compass](http://compass-style.org/) CSS Authoring Framework for [SASS](http://sass-lang.com/)
- [Composer](https://getcomposer.org/) a dependency Manager for PHP
- [Bower](http://bower.io/) a frontend package manager for the web
- Along with...[Bootstrap](http://getbootstrap.com/), [jQuery](http://jquery.com/), [Twig](http://twig.sensiolabs.org/documentation), [Assetic](https://github.com/kriswallsmith/assetic), [angular-bootstrap](http://angular-ui.github.io/bootstrap/), [ui-router](https://github.com/angular-ui/ui-router)

This is a simple starter setup for building angular.js applications from a Silex

Who should use it?
------------------
Those of you that need a little more that a single page app (SPA). This allows for simple PHP based routes with as much or as little of either PHP or angluar as you wnat.


Installation
------------
```
$ git clone git@github.com:failpunk/silex-angular.git silex-angular
$ cd silex-angular
$ ./build.sh
```

Delevlopment
------------
In separate terminal windows run the following

#### automatically watch and compile SASS with compass
```
$ compass watch [path/to/project]
```

#### local PHP dev server
```
$ php -S localhost:4000
```

http://localhost:4000/web/dev.php


