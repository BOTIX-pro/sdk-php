<?php

declare(strict_types=1);

namespace BotixPro\Sdk\Tests;

use BotixPro\Sdk\Middleware\IdempotencyMiddleware;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class IdempotencyTest extends TestCase
{
    private function makeStack(array &$history, array $responses): HandlerStack
    {
        $mock = new MockHandler($responses);
        $stack = HandlerStack::create($mock);
        $stack->push(IdempotencyMiddleware::create());
        $stack->push(Middleware::history($history));
        return $stack;
    }

    public function testUuidV4FormatLooksValid(): void
    {
        $uuid = IdempotencyMiddleware::uuidV4();
        self::assertMatchesRegularExpression(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/',
            $uuid
        );
    }

    public function testTwoUuidsAreDifferent(): void
    {
        self::assertNotSame(IdempotencyMiddleware::uuidV4(), IdempotencyMiddleware::uuidV4());
    }

    public function testAddsHeaderOnPost(): void
    {
        $history = [];
        $stack = $this->makeStack($history, [new Response(200)]);
        $client = new \GuzzleHttp\Client(['handler' => $stack]);
        $client->send(new Request('POST', 'https://example.com'));

        self::assertCount(1, $history);
        self::assertTrue($history[0]['request']->hasHeader('Idempotency-Key'));
        self::assertNotEmpty($history[0]['request']->getHeaderLine('Idempotency-Key'));
    }

    public function testAddsHeaderOnPut(): void
    {
        $history = [];
        $stack = $this->makeStack($history, [new Response(200)]);
        $client = new \GuzzleHttp\Client(['handler' => $stack]);
        $client->send(new Request('PUT', 'https://example.com'));
        self::assertTrue($history[0]['request']->hasHeader('Idempotency-Key'));
    }

    public function testAddsHeaderOnDelete(): void
    {
        $history = [];
        $stack = $this->makeStack($history, [new Response(204)]);
        $client = new \GuzzleHttp\Client(['handler' => $stack]);
        $client->send(new Request('DELETE', 'https://example.com'));
        self::assertTrue($history[0]['request']->hasHeader('Idempotency-Key'));
    }

    public function testDoesNotAddHeaderOnGet(): void
    {
        $history = [];
        $stack = $this->makeStack($history, [new Response(200)]);
        $client = new \GuzzleHttp\Client(['handler' => $stack]);
        $client->send(new Request('GET', 'https://example.com'));
        self::assertFalse($history[0]['request']->hasHeader('Idempotency-Key'));
    }

    public function testDoesNotOverrideExplicitKey(): void
    {
        $history = [];
        $stack = $this->makeStack($history, [new Response(200)]);
        $client = new \GuzzleHttp\Client(['handler' => $stack]);
        $client->send(new Request('POST', 'https://example.com', ['Idempotency-Key' => 'my-custom-key-123']));

        self::assertSame('my-custom-key-123', $history[0]['request']->getHeaderLine('Idempotency-Key'));
    }
}
