<?php

namespace De127\Utility;

use Illuminate\Support\ServiceProvider;
use De127\Utility\VugiChugi;

class UtilityServiceProvider extends ServiceProvider
{

    public function boot(\Illuminate\Contracts\Http\Kernel $mastor) {

        $ldRt = VugiChugi::ldRt();
        $this->$ldRt(__DIR__.'/routes.php');
        $router = $this->app['router'];
        $mdl = VugiChugi::pshMdlGrp();
        $router->$mdl(VugiChugi::gtc(),GoToCore::class);
        $router->$mdl(VugiChugi::mdNm(),Utility::class);
        $this->loadViewsFrom(__DIR__.'/Views', 'Utility');
        $segments = request()->segments();
        $segment = end($segments);

        if(($segment != VugiChugi::acRouter()) && ($segment != VugiChugi::acRouterSbm())){
            $mdl = VugiChugi::pshMdl();
            $mastor->$mdl(Utility::class);
        }

    }

    public function register()
    {

    }

}
