<?php

declare(strict_types=1);

namespace BotixPro\Sdk\Tests;

use BotixPro\Sdk\Client;
use PHPUnit\Framework\TestCase;

final class WebhookVerifyTest extends TestCase
{
    private const SECRET = 'whsec_test_secret_for_botix';

    public function testReturnsTrueForCorrectSignature(): void
    {
        $payload = '{"event":"contact.created","data":{"id":1}}';
        $signature = hash_hmac('sha256', $payload, self::SECRET);
        self::assertTrue(Client::verifyWebhook($payload, $signature, self::SECRET));
    }

    public function testReturnsFalseForTamperedPayload(): void
    {
        $payload = '{"event":"contact.created","data":{"id":1}}';
        $tampered = '{"event":"contact.created","data":{"id":2}}';
        $signature = hash_hmac('sha256', $payload, self::SECRET);
        self::assertFalse(Client::verifyWebhook($tampered, $signature, self::SECRET));
    }

    public function testReturnsFalseForWrongSecret(): void
    {
        $payload = '{"event":"x"}';
        $signature = hash_hmac('sha256', $payload, self::SECRET);
        self::assertFalse(Client::verifyWebhook($payload, $signature, 'whsec_other_secret'));
    }

    public function testReturnsFalseForEmptySignature(): void
    {
        $payload = '{"event":"x"}';
        self::assertFalse(Client::verifyWebhook($payload, '', self::SECRET));
    }

    public function testReturnsFalseForEmptySecret(): void
    {
        $payload = '{"event":"x"}';
        $signature = hash_hmac('sha256', $payload, self::SECRET);
        self::assertFalse(Client::verifyWebhook($payload, $signature, ''));
    }

    public function testReturnsFalseForWrongLengthSignatureWithoutCrash(): void
    {
        $payload = '{"event":"x"}';
        // hash_equals в PHP 8 возвращает false на разных длинах, не падает
        self::assertFalse(Client::verifyWebhook($payload, 'short', self::SECRET));
    }
}
