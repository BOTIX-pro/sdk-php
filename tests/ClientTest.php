<?php

declare(strict_types=1);

namespace BotixPro\Sdk\Tests;

use BotixPro\Sdk\Api\ChannelsApi;
use BotixPro\Sdk\Api\ChatsApi;
use BotixPro\Sdk\Api\ContactsApi;
use BotixPro\Sdk\Api\MessagesApi;
use BotixPro\Sdk\Api\MetaApi;
use BotixPro\Sdk\Api\ScenariosApi;
use BotixPro\Sdk\Api\WebhooksApi;
use BotixPro\Sdk\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{
    public function testRejectsEmptyApiKey(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Client('');
    }

    public function testStoresApiKeyInBearerToken(): void
    {
        $client = new Client('btx_live_test_1234567890');
        self::assertSame('btx_live_test_1234567890', $client->getConfig()->getAccessToken());
    }

    public function testDefaultHost(): void
    {
        $client = new Client('btx_live_x');
        self::assertSame('https://api.botix.pro', $client->getConfig()->getHost());
    }

    public function testCustomHost(): void
    {
        $client = new Client('btx_live_x', ['host' => 'http://localhost:8888']);
        self::assertSame('http://localhost:8888', $client->getConfig()->getHost());
    }

    public function testDefaultUserAgent(): void
    {
        $client = new Client('btx_live_x');
        self::assertSame(Client::DEFAULT_USER_AGENT, $client->getConfig()->getUserAgent());
    }

    public function testResourceAccessorsReturnExpectedTypes(): void
    {
        $client = new Client('btx_live_x');
        self::assertInstanceOf(MetaApi::class, $client->meta());
        self::assertInstanceOf(ContactsApi::class, $client->contacts());
        self::assertInstanceOf(MessagesApi::class, $client->messages());
        self::assertInstanceOf(ScenariosApi::class, $client->scenarios());
        self::assertInstanceOf(ChatsApi::class, $client->chats());
        self::assertInstanceOf(ChannelsApi::class, $client->channels());
        self::assertInstanceOf(WebhooksApi::class, $client->webhooks());
    }

    public function testResourceAccessorsAreCached(): void
    {
        $client = new Client('btx_live_x');
        self::assertSame($client->meta(), $client->meta());
        self::assertSame($client->messages(), $client->messages());
    }

    public function testAuthorizationHeaderSentToServer(): void
    {
        $history = [];
        $mock = new MockHandler([new Response(200, [], json_encode(['success' => true, 'data' => ['project_id' => 1]]))]);
        $stack = HandlerStack::create($mock);
        $stack->push(Middleware::history($history));

        $guzzle = new GuzzleClient(['handler' => $stack]);
        $client = new Client('btx_live_xyz', ['http_client' => $guzzle]);
        $client->meta()->publicV1MeGet();

        self::assertCount(1, $history);
        self::assertSame('Bearer btx_live_xyz', $history[0]['request']->getHeaderLine('Authorization'));
    }
}
