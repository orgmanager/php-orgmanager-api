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
    public function __construct(Client $client, $apiToken = null, $rootUrl = 'https://orgmanager.miguelpiedrafita.com')
    {
        $this->client = $client;

        $this->apiToken = $apiToken;

        $this->baseUrl = $rootUrl.'/api';
    }

    /**
     * @param string $apiToken
     *
     * @return string
     */
    public function connect($apiToken)
    {
        $this->apiToken = $apiToken;

        return $this->apiToken;
    }

    /**
     * @return array
     */
    public function getRoot()
    {
        return $this->get('');
    }

    /**
     * @return array
     */
    public function getStats()
    {
        return $this->get('/stats');
    }

    /**
     * @return array
     */
    public function getUser()
    {
        return $this->get('/user');
    }

    public function test()
    {
        return 'test';
    }

    /**
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
        return $this->get('/org/'.$id);
    }

    /**
     * @param string $id
     * @param string $password
     *
     * @return array
     */
    public function changeOrgPassword($id, $password)
    {
        return $this->post('/org/'.$id, ['password' => $password]);
    }

    /**
     * @param string $id
     *
     * @return null
     */
    public function updateOrg($id)
    {
        return $this->put('/org/'.$id);
    }

    /**
     * @param string $id
     *
     * @return null
     */
    public function deleteOrg($id)
    {
        return $this->delete('/org/'.$id);
    }

    /**
     * @param string $id
     * @param string $username
     *
     * @return null
     */
    public function joinOrg($id, $username)
    {
        return $this->post('/join/'.$id, ['username' => $username]);
    }

    /**
     * @param string $resource
     * @param array  $query
     *
     * @return array
     */
    protected function get($resource, array $query = [])
    {
        $data['headers'] = ['Authorization' => 'Bearer '.$this->apiToken, 'User-Agent' => 'php-orgmanager-api'];
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
    protected function post($resource, array $rawdata = [])
    {
        $data['headers'] = ['Authorization' => 'Bearer '.$this->apiToken, 'User-Agent' => 'php-orgmanager-api'];
        $data['json'] = $rawdata;
        $results = $this->client
            ->post("{$this->baseUrl}{$resource}", $data)
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
    protected function put($resource, array $rawdata = [])
    {
        $data['headers'] = ['Authorization' => 'Bearer '.$this->apiToken, 'User-Agent' => 'php-orgmanager-api'];
        $data['json'] = $rawdata;
        $results = $this->client
            ->request('PUT', "{$this->baseUrl}{$resource}", $data)
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
    public function delete($resource, array $rawdata = [])
    {
        $data['headers'] = ['Authorization' => 'Bearer '.$this->apiToken, 'User-Agent' => 'php-orgmanager-api'];
        $data['json'] = $rawdata;
        $results = $this->client
            ->request('DELETE', "{$this->baseUrl}{$resource}", $data)
            ->getBody()
            ->getContents();

        return json_decode($results, true);
    }
}
