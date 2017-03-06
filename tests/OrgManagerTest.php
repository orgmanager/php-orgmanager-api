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

        $this->orgmanager = new OrgManager($client, 'token');

        parent::setUp();
    }

    /** @test */
    public function it_can_get_root_endpoint()
    {

        $result = $this->orgmanager->getRoot();

        $this->assertArrayHasKey('docs', $result);
    }
}
