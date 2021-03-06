<?php

namespace Mineur\InstagramParser\Parser;

use Mineur\InstagramParser\EmptyRequiredParamException;
use Mineur\InstagramParser\Http\HttpClient;
use Mineur\InstagramParser\Model\User;

/**
 * Class UserAbstractParser
 *
 * @package Mineur\InstagramParser\Parser
 */
class UserParser
{
    /** @var HttpClient */
    private $httpClient;
    
    /**
     * InstagramParser constructor.
     *
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }
    
    /**
     * @param string $username
     * @return User|mixed
     * @internal param callable|null $callback
     */
    public function parse(string $username)
    {
        $this->ensureUsernameIsNotEmpty($username);
        
        $endpoint = sprintf(
            '/%s/?__a=1',
            $username
        );
        $response = $this->makeRequest($endpoint);
        $user     = $response['user'];
        
        return User::fromArray($user);
    }
    
    /**
     * @param string $endpoint
     * @return array
     */
    private function makeRequest(string $endpoint): array
    {
        $response = $this
            ->httpClient
            ->get($endpoint);
        
        return json_decode((string) $response, true);
    }
    
    /**
     * @param string $username
     * @throws EmptyRequiredParamException
     */
    private function ensureUsernameIsNotEmpty(string $username)
    {
        if (empty($username) || !isset($username)) {
            throw new EmptyRequiredParamException(
                'Username can not be empty.'
            );
        }
    }
}