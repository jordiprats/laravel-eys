# laravel-eys

## notes

### rebuild autoload

```
$ php artisan migrate:fresh --seed
(...)
   ReflectionException  : Class CreateCustomerUser does not exist

  at /home/jprats/git/laravel-eys/eys/vendor/laravel/framework/src/Illuminate/Container/Container.php:767
    763|         if ($concrete instanceof Closure) {
    764|             return $concrete($this, $this->getLastParameterOverride());
    765|         }
    766|
  > 767|         $reflector = new ReflectionClass($concrete);
    768|
    769|         // If the type is not instantiable, the developer is attempting to resolve
    770|         // an abstract type such as an Interface of Abstract Class and there is
    771|         // no binding registered for the abstractions so we need to bail out.

  Exception trace:

  1   ReflectionClass::__construct("CreateCustomerUser")
      /home/jprats/git/laravel-eys/eys/vendor/laravel/framework/src/Illuminate/Container/Container.php:767

  2   Illuminate\Container\Container::build("CreateCustomerUser")
      /home/jprats/git/laravel-eys/eys/vendor/laravel/framework/src/Illuminate/Container/Container.php:646

  Please use the argument -v to see more details.
```

```
composer dump-autoload
```
