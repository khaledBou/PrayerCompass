<?php

namespace App\Tests\Infrastructure\API\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class QiblaDirectionControllerTest extends WebTestCase
{
    public function testGetQiblaDirection()
    {
        $client = static::createClient();

        $client->request('POST', '/api/qibla-direction', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'latitude' => 21.4225,
            'longitude' => 39.8262,
        ]));

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());
    }
}
