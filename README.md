# General information #

* PHP 7.0 or above

### Installation ###

To use this lib 
```
composer require checkk/html-builder
```

### Usage ###

* Create empty form
```PHP
$form = new Form('action.php');
```
* Add name or id attribute to form
```PHP
$form->addAttribute('name', 'my_best_form');
$form->addAttribute('id', 'form_id');
```
* Add inputs to form
```PHP
$form->addInput('text', 'login');
$form->addHiddenInput('csrf', 'qrqrqwreqaf');
$form->addSubmitInput('Push me');
```
* Add script after form.
```PHP
$form->addScript("window.onload = function () {document.forms[0].submit();}");
```
* Good for payment form submitting
