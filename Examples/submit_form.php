<?php

use Checkk\HtmlBuilder\Form\Form;

$form = new Form('http://example.com');

$form->addAttribute('name', 'my_best_form');
$form->addAttribute('id', 'form_id');

$form->addInput('text', 'login', 'myBestLogin');
$form->addInput('text', 'email', '123@examle.com');
$form->addHiddenInput('csrf', 'csrfhashstring');
$form->addHiddenInput('password', 'pa$$word');
$form->addSubmitInput('Push me');

$form->addScript("window.onload = function () {document.forms[0].submit();}");

echo $form;