<?php

namespace App\Http\Middleware;

use Auth0\SDK\Auth0;
use Closure;
use Dotenv\Dotenv;

class Auth0Middleware
{
    public function handle($request, Closure $next)
    {
        // Import the Composer Autoloader to make the SDK classes accessible:
        require 'vendor/autoload.php';

        // Load our environment variables from the .env file:
        (Dotenv::createImmutable(__DIR__))->load();

        // Now instantiate the Auth0 class with our configuration:
        $auth0 = new Auth0([
            'domain' => $_ENV['AUTH0_DOMAIN'],
            'clientId' => $_ENV['AUTH0_CLIENT_ID'],
            'clientSecret' => $_ENV['AUTH0_CLIENT_SECRET'],
            'audience' => $_ENV['AUTH0_AUDIENCE']
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
                define('ENDPOINT_AUTHORIZED', true);
            } catch (\Auth0\SDK\Exception\InvalidTokenException $exception) {
                // The token wasn't valid. Let's display the error message from the Auth0 SDK.
                // We'd probably want to show a custom error here for a real world application.
                die($exception->getMessage());
            }
        }
        

        // Is the request authorized?
        if (defined('ENDPOINT_AUTHORIZED')) {
            // Respond with a JSON response:
            echo json_encode([
                'authorized' => true,
                'data' => $token->toArray()
            ], JSON_PRETTY_PRINT);

            exit;
        }

        // Issue a HTTP 401 Unauthorized status:
        http_response_code(401);

        // Respond with a JSON response:
        echo json_encode([
            'authorized' => false,
            'error' => [
                'message' => 'You are NOT authorized to be here!'
            ]
        ], JSON_PRETTY_PRINT);

        // Perform any actions using the $auth0 object
        // For example, you can authenticate a user:
        $auth0->login();
        // Or retrieve user information:
        $user = $auth0->getUser();

        // Continue with your desired logic

        return $next($request);
    }
}