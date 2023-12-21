<?php
use Stichoza\GoogleTranslate\GoogleTranslate;

function translate($text, $targetLanguage)
{
    $tr = new GoogleTranslate();
    $tr->setSource('en'); // Bahasa Inggris sebagai bahasa sumber
    $tr->setTarget($targetLanguage); // Tentukan bahasa tujuan
    return $tr->translate($text); // Lakukan terjemahan
}
