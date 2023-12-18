<?php

use Illuminate\Support\Facades\Route;
use De127\Utility\Controller\UtilityController;
use De127\Utility\VugiChugi;

Route::middleware(VugiChugi::gtc())->controller(UtilityController::class)->group(function(){
    Route::get(VugiChugi::acRouter(),'de127Start')->name(VugiChugi::acRouter());
    Route::post(VugiChugi::acRouterSbm(),'de127Submit')->name(VugiChugi::acRouterSbm());
});
