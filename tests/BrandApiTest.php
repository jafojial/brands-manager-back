<?php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class BrandApiTest extends ApiTestCase
{
    
    public function testCreateBrand(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/brands', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'brand_name' => 'TestBrand',
            'brand_image' => 'https://example.com/image.png',
            'rating' => 4
        ]));

        $this->assertResponseStatusCodeSame(201);
    }

    public function testListBrands(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/brands');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json');
    }
}
