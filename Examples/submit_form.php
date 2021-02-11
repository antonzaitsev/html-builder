<?php

use Checkk\HtmlBuilder\Form\Form;

$form = new Form('http://example.com');

$form->addAttribute('name', 'my_best_form');
$form->addAttribute('id', 'form_id');

$form->addInput('text', 'login', 'myBestLogin');
$form->addHiddenInput('csrf', 'csrfhashstring');
$form->addHiddenInput('password', 'pa$$word');
$form->addSubmitInput('Push me');

$form->addScript("window.onload = function () {document.getElementByTagName('form').submit()}");

echo $form;