<?php

namespace App\Tests\Infrastructure\API\Controller;

class PrayerTimeControllerTest extends WebTestCase
{
    public function testGetPrayerTimes()
    {
        $client = static::createClient();
        $client->request('GET', '/api/prayer-times/Paris');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}