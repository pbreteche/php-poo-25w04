<?php

$formBuilder = new FormBuilder();

$form = $formBuilder
    ->add('username')
    ->add('password')
    ->add('remember_me')
    ->getForm()
;
