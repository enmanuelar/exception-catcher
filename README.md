Exception Catcher
===================
----------
Catch exceptions and debug faster. This package can be used to make debugging easier and pretty print the exceptions to help you find the solution to the problem fast.

Installation
-------------
Installation is done via composer
```
composer require enmanuelar/exception-catcher

```

#### Basic Example
You just need to instantiate a new ExceptionCatcher in a catch block and call any function you need.
```
try {
	...
} catch (Exception $exception) {
	$catcher = new ExceptionCatcher();
	$catcher->printExceptionDetails($exception);
}

```