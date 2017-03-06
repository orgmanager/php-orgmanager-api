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
        $client = new Client();

        $this->orgmanager = new OrgManager($client);

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
}
