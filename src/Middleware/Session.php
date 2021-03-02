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

use Illuminate\Http\Request;

/**
 * Class Pjax.
 * @package LApolinario\Ava\Middleware
 */
class Session
{
    public function handle(Request $request, \Closure $next)
    {
        $path = '/'.trim(config('admin.route.prefix'), '/');
        config(['session.path' => $path]);
        if ($domain = config('admin.route.domain')) {
            config(['session.domain' => $domain]);
        }
        return $next($request);
    }
}
