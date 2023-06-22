<?php
namespace App\Http\Middleware;

use Auth0\SDK\Auth0;
use Closure; 
use Illuminate\Http\JsonResponse;

class Auth0Middleware
{
    public function handle($request, Closure $next)
    {
        // Import the Composer Autoloader to make the SDK classes accessible:
        require __DIR__ . '/../../../vendor/autoload.php';

        // Now instantiate the Auth0 class with our configuration:
        $auth0 = new Auth0([
            'domain' => $_ENV['AUTH0_DOMAIN'],
            'clientId' => $_ENV['AUTH0_CLIENT_ID'],
            'clientSecret' => $_ENV['AUTH0_CLIENT_SECRET'],
            'audience' => [$_ENV['AUTH0_AUDIENCE']],
            'cookieSecret' => $_ENV['AUTH0_SECRET']
        ]);

        // Caching
        $tokenCache = new \Symfony\Component\Cache\Adapter\FilesystemAdapter();
        $auth0->configuration()->setTokenCache($tokenCache);

        $jwt = $_GET['token'] ?? $_SERVER['HTTP_AUTHORIZATION'] ?? $_SERVER['Authorization'] ?? null;

        // If a token is present, process it.
        if ($jwt !== null) {
            // Trim whitespace from token string.
            $jwt = trim($jwt);

            // Remove the 'Bearer ' prefix, if present, in the event we're getting an Authorization header that's using it.
            if (substr($jwt, 0, 7) === 'Bearer ') {
                $jwt = substr($jwt, 7);
            }

            // Attempt to decode the token:
            try {
                $token = $auth0->decode($jwt, null, null, null, null, null, null, \Auth0\SDK\Token::TYPE_TOKEN);
                $email = $token['https://example.com/email'];
                
                define('ENDPOINT_AUTHORIZED', true);
            } catch (\Auth0\SDK\Exception\InvalidTokenException $exception) {
                // The token wasn't valid. Let's display the error message from the Auth0 SDK.
                // We'd probably want to show a custom error here for a real world application.
                die($exception->getMessage());
            }
        }
        
        // Is the request authorized?
        if (defined('ENDPOINT_AUTHORIZED')) {
            // Autorización exitosa, pasa al siguiente middleware y al controlador
            return $email;
        }

        // Issue a HTTP 401 Unauthorized status:
        return new JsonResponse([
            'authorized' => false,
            'error' => [
                'message' => 'You are NOT authorized to be here!'
            ]
        ], 401);
    }
}