<?php

use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Component\Translation\Loader\ArrayLoader;
use Symfony\Component\Translation\Translator;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once("vendor/autoload.php");


$env = new Environment(new FilesystemLoader("templates"));

$translator = new Translator("en");
$translator->setFallbackLocales(["en"]);
$translator->addLoader("array", new ArrayLoader);
$translator->addResource("array", ["hello" => "world!"], "en");

$env->addExtension(new TranslationExtension($translator));
$template = $env->load('index.twig');
echo $template->render([]);
