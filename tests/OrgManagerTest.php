<?php

namespace OrgManager\ApiClient\Test;

use GuzzleHttp\Client;
use OrgManager\ApiClient\OrgManager;

class OrgManagerTest extends \PHPUnit_Framework_TestCase
{
    /** @var \OrgManager\ApiClient\OrgManager */
    protected $orgmanager;

    public function setUp()
    {
        $this->orgmanager = new OrgManager();

        parent::setUp();
    }

    /** @test */
    public function it_does_not_have_token()
    {
        $this->assertNull($this->orgmanager->apiToken);
    }

    /** @test */
    public function you_can_set_api_token()
    {
        $this->orgmanager->connect('API_TOKEN');
        $this->assertEquals('API_TOKEN', $this->orgmanager->apiToken);
    }

    /** @test */
    public function you_can_get_client()
    {
        $this->assertInstanceOf(Client::class, $this->orgmanager->getClient());
    }

    /** @test */
    public function you_can_set_client()
    {
        $newClient = new Client(['base_uri' => 'http://foo.bar',]);
        $this->assertInstanceOf(Client::class, $newClient);
        $this->assertNotEquals($this->orgmanager->getClient(), $newClient);
        $this->orgmanager->setClient($newClient);
        $this->assertEquals($newClient, $this->orgmanager->client);
    }
}
