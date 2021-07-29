<?php

namespace App\Http\Middleware;

use App\Visit;
use Closure;

class visitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $page)
    {
        if (\Auth::user()) {
            $dataTable['name'] = \Auth::user()->name;
            $dataTable['email'] = \Auth::user()->email;
        } else {
            $dataTable['name'] = 'noname';
            $dataTable['email'] = null;
        }

        $browser = get_browser(null, true);

        $dataTable['ip'] = request()->ip();

        if ($dataTable['ip'] !== '5.165.236.61') {

            $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $dataTable['ip']));
            $ip_country = ($ip_data->geoplugin_countryName);
            $ip_city = ($ip_data->geoplugin_city);

            $dataTable['page'] = $page;
            $dataTable['browser'] = $browser['parent'];
            $dataTable['platform'] = $browser['platform'];
            $dataTable['device_type'] = $browser['device_type'];
            $dataTable['country'] = $ip_country;
            $dataTable['city'] = $ip_city;
            $dataTable['ismobiledevice'] = $browser['ismobiledevice'];
            $dataTable['request'] = $_SERVER['QUERY_STRING'];

            Visit::create([
                'name' => $dataTable['name'],
                'email' => $dataTable['email'],
                'ip' => $dataTable['ip'],
                'page' => $dataTable['page'],
                'browser' => $dataTable['browser'],
                'platform' => $dataTable['platform'],
                'device_type' => $dataTable['device_type'],
                'country' => $dataTable['country'],
                'city' => $dataTable['city'],
                'request' => $dataTable['request'],
                'ismobiledevice' => (int)$dataTable['ismobiledevice']
            ]);
        }

        return $next($request);
    }
}
