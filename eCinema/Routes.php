<?php

// home page
Route::set('', function() {
    Index::CreateView("index");
});

// movies
Route::set('filmy', function() {
    Filmy::CreateView("filmy");
});

// movie screening
Route::set('premietanie', function() {
    Premietanie::CreateView("premietanie");
});

// movie attributes
Route::set('rozlisenie', function() {
    Rozlisenie::CreateView("rozlisenie");
});

Route::set('dabing', function() {
    Dabing::CreateView("dabing");
});

Route::set('titulky', function() {
    Titulky::CreateView("titulky");
});

Route::set('zanre', function() {
    Zanre::CreateView("zanre");
});

Route::set('filmy_zanre', function() {
    ZanreFilmu::CreateView("filmy_zanre");
});

Route::set('krajiny', function() {
    Krajiny::CreateView("krajiny");
});

Route::set('filmy_krajiny', function() {
    KrajinyFilmu::CreateView("filmy_krajiny");
});

Route::set('herci', function() {
    Herci::CreateView("herci");
});

Route::set('filmy_herci', function() {
    HerciFilmu::CreateView("filmy_herci");
});

Route::set('reziseri', function() {
    Reziseri::CreateView("reziseri");
});

Route::set('filmy_reziseri', function() {
    ReziseriFilmu::CreateView("filmy_reziseri");
});

Route::set('saly', function() {
    Saly::CreateView("saly");
});

// users
Route::set('zakaznici', function() {
    Zakaznici::CreateView("zakaznici");
});

Route::set('platobne_udaje', function() {
    PlatobneUdaje::CreateView("platobne_udaje");
});

Route::set('zamestnanci', function() {
    Zamestnanci::CreateView("zamestnanci");
});

Route::set('roly_zamestnancov', function() {
    RolyZamestnancov::CreateView("roly_zamestnancov");
});

// login
Route::set('prihlasenie', function() {
    Prihlasenie::CreateView("prihlasenie");
});

Route::set('odhlasenie', function() {
    session_destroy();
    header('Location: /');
    exit();
});