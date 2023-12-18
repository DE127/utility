<?php

namespace De127\Utility;

use Closure;

class Utility{

    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
