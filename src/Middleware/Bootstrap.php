<?php
/**
 * LApolinario
 *
 * @category  LApolinario
 * @package   Ava
 * @version   1.0.0
 * @author    Luiz Felipe Apolinário <luizfelipeapo@gmail.com>
 */

declare(strict_types=1);

namespace LApolinario\Ava\Middleware;

use Closure;
use LApolinario\Ava\Facades\Admin;
use Illuminate\Http\Request;

/**
 * Class Bootstrap.
 * @package LApolinario\Ava\Middleware
 */
class Bootstrap
{
    public function handle(Request $request, Closure $next)
    {
        Admin::bootstrap();
        return $next($request);
    }
}
