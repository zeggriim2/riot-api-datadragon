<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Endpoint;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\VersionApi;
use Zeggriim\RiotApiDataDragon\RiotApiDataDragon;

final class VersionApiTest extends KernelTestCase
{
    public function testItReturnsAListOfVersions(): void
    {
        $response = [
            new MockResponse(json_encode(["14.6.1", "14.5.1", "14.4.1", "14.3.1"]))
        ];

        $versionApi = new VersionApi($this->getMockedClient($response));

        $result = $versionApi->versions();

        self::assertIsArray($result);
        self::assertCount(4, $result);
        self::assertContains('14.6.1', $result);
        self::assertContains('14.5.1', $result);
        self::assertContains('14.4.1', $result);
        self::assertContains('14.3.1', $result);
    }

    public function testEmptyWithBadRequestError()
    {
        $responses = [
            new MockResponse(["14.5.1", "14.4.1", "14.3.2", "14.3.1"], ['http_code' => Response::HTTP_BAD_REQUEST])
        ];

        $versionApi = new VersionApi($this->getMockedClient($responses));

        $result = $versionApi->versions();

        self::assertCount(0,$result);
        self::assertIsArray($result);
    }

    private function getMockedClient(array $responses): RiotApiDataDragon
    {
        $client = new MockHttpClient($responses, 'http://localhost/fakeApi/');
        $mockLogger = $this->createMock(LoggerInterface::class);

        return new RiotApiDataDragon($client, $mockLogger);
    }

}