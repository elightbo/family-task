<?php
namespace FamilyTask\Test;

use Silex\WebTestCase;

/**
 * Delete me
 */
class DeleteMeTest extends WebTestCase
{
    /**
     * Creates the application.
     *
     */
    public function createApplication()
    {
        return require __DIR__ . '/../../../../app/app.php';
    }

    public function testFamilyCreate()
    {
        $client = $this->createClient();
        $crawler = $client->request('POST', '/family');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('hi', $crawler->text());
    }

}