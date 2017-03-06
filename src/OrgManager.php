<?php

namespace OrgManager\ApiClient;

use GuzzleHttp\Client;

class OrgManager
{
    /** @var \GuzzleHttp\Client */
    protected $client;

    /** @var string */
    protected $baseUrl;

    /**
     * @param \GuzzleHttp\Client $client
     * @param string             $apiToken
     * @param string             $rootUrl
     */
    public function __construct(Client $client, $apiToken, $rootUrl = 'https://orgmanager.miguelpiedrafita.com')
    {
        $this->client = $client;
        
        $this->apiToken = $apiToken;
        
        $this->baseUrl = $rootUrl.'/api';
    }

    /**
     *
     * @return array
     */
    public function getRoot()
    {
        return $this->get('');
    }
    
    /**
     *
     * @return array
     */
    public function getStats()
    {
        return $this->get('/stats');
    }
    
    /**
     *
     * @return array
     */
    public function getUser()
    {
        return $this->get('/user');
    }
    
    /**
     *
     * @return array
     */
    public function getOrgs()
    {
        return $this->get('/user/orgs');
    }
    
    /**
     * @param string $id
     *
     * @return array
     */
    public function getOrg($id)
    {
        return $this->get('/org/'$id);
    }

    /**
     * @param string $resource
     * @param array  $query
     *
     * @return array
     */
    public function get($resource, array $query = [])
    {
        $data['headers'] = ['Authorization' => 'Bearer '.$this->apiToken];
        $data['query'] = $query;
        $results = $this->client
            ->get("{$this->baseUrl}{$resource}", $data)
            ->getBody()
            ->getContents();

        return json_decode($results, true);
    }
    
    /**
     * @param string $resource
     * @param array  $rawdata
     *
     * @return array
     */
    
    public function post($resource, array $rawdata = [])
    {
        $data['headers'] = ['Authorization' => 'Bearer '.$this->apiToken];
        $data['json'] = $rawdata;
        $results = $this->client
            ->request('POST', "{$this->baseUrl}{$resource}", $data])
            ->getBody()
            ->getContents();
        return json_decode($results, true);
    }
}
