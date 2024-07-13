<?php

namespace App\Tests\Infrastructure\API\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PrayerTimeControllerTest extends WebTestCase
{
    public function testGetPrayerTimes()
    {
        $client = static::createClient();
        $client->request('GET', '/api/prayer-time');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testAddPrayerTime()
    {
        $client = static::createClient();

        $client->request('POST', '/api/prayer-time', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'city' => 'Mecca',
            'country' => 'Saudi Arabia',
            'fajr' => '2023-07-13T04:30:00',
            'dhuhr' => '2023-07-13T12:30:00',
            'asr' => '2023-07-13T15:30:00',
            'maghrib' => '2023-07-13T18:45:00',
            'isha' => '2023-07-13T20:00:00',
        ]));

        $this->assertEquals(201, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());
    }
}
