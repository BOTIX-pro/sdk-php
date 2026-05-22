<?php
/**
 * BOTIX SDK — клиент-обёртка над автогенерированным API.
 *
 * Источник правды контракта: openapi.yaml в основном репозитории BOTIX.
 * Базовый код в lib/ генерируется openapi-generator-cli и не редактируется руками;
 * этот файл — ручная полировка для удобной точки входа разработчика.
 */

declare(strict_types=1);

namespace BotixPro\Sdk;

use BotixPro\Sdk\Api\ChannelsApi;
use BotixPro\Sdk\Api\ChatsApi;
use BotixPro\Sdk\Api\ContactsApi;
use BotixPro\Sdk\Api\MessagesApi;
use BotixPro\Sdk\Api\MetaApi;
use BotixPro\Sdk\Api\ScenariosApi;
use BotixPro\Sdk\Api\WebhooksApi;
use BotixPro\Sdk\Middleware\IdempotencyMiddleware;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;

/**
 * Точка входа в SDK.
 *
 *   $client = new \BotixPro\Sdk\Client('btx_live_...');
 *   $me = $client->meta()->publicV1MeGet();
 *
 * Опции (массив $options):
 *   - host                 (string) переопределить базовый URL (по умолчанию https://api.botix.pro)
 *   - user_agent           (string) подменить User-Agent
 *   - timeout              (float)  тайм-аут HTTP-запроса в секундах (по умолчанию 30)
 *   - auto_idempotency_key (bool)   автогенерация UUID v4 в заголовке Idempotency-Key
 *                                   для POST/PUT/DELETE, если не передан явно (по умолчанию true)
 *   - http_client          (\GuzzleHttp\ClientInterface) свой HTTP-клиент (для тестов/моков)
 */
final class Client
{
    public const VERSION = '1.0.0';
    public const DEFAULT_USER_AGENT = 'botix-pro-sdk-php/1.0.0';

    private Configuration $config;
    private \GuzzleHttp\ClientInterface $httpClient;

    private ?MetaApi $meta = null;
    private ?ContactsApi $contacts = null;
    private ?MessagesApi $messages = null;
    private ?ScenariosApi $scenarios = null;
    private ?ChatsApi $chats = null;
    private ?ChannelsApi $channels = null;
    private ?WebhooksApi $webhooks = null;

    public function __construct(string $apiKey, array $options = [])
    {
        if ($apiKey === '') {
            throw new \InvalidArgumentException('API key cannot be empty');
        }

        $this->config = Configuration::getDefaultConfiguration()
            ->setAccessToken($apiKey)
            ->setUserAgent($options['user_agent'] ?? self::DEFAULT_USER_AGENT);

        if (!empty($options['host'])) {
            $this->config->setHost((string) $options['host']);
        }

        if (isset($options['http_client']) && $options['http_client'] instanceof \GuzzleHttp\ClientInterface) {
            $this->httpClient = $options['http_client'];
        } else {
            $stack = HandlerStack::create();
            if (($options['auto_idempotency_key'] ?? true) === true) {
                $stack->push(IdempotencyMiddleware::create(), 'botix_idempotency');
            }
            $this->httpClient = new GuzzleClient([
                'handler' => $stack,
                'timeout' => $options['timeout'] ?? 30.0,
            ]);
        }
    }

    public function getConfig(): Configuration
    {
        return $this->config;
    }

    public function getHttpClient(): \GuzzleHttp\ClientInterface
    {
        return $this->httpClient;
    }

    public function meta(): MetaApi
    {
        return $this->meta ??= new MetaApi($this->httpClient, $this->config);
    }

    public function contacts(): ContactsApi
    {
        return $this->contacts ??= new ContactsApi($this->httpClient, $this->config);
    }

    public function messages(): MessagesApi
    {
        return $this->messages ??= new MessagesApi($this->httpClient, $this->config);
    }

    public function scenarios(): ScenariosApi
    {
        return $this->scenarios ??= new ScenariosApi($this->httpClient, $this->config);
    }

    public function chats(): ChatsApi
    {
        return $this->chats ??= new ChatsApi($this->httpClient, $this->config);
    }

    public function channels(): ChannelsApi
    {
        return $this->channels ??= new ChannelsApi($this->httpClient, $this->config);
    }

    public function webhooks(): WebhooksApi
    {
        return $this->webhooks ??= new WebhooksApi($this->httpClient, $this->config);
    }

    /**
     * Проверить HMAC-SHA256 подпись webhook-доставки BOTIX.
     *
     * Алгоритм: HMAC-SHA256(secret, raw_body) → hex. Сервер шлёт результат
     * в заголовке X-Botix-Signature. Сравнение через hash_equals для защиты
     * от timing-атак.
     *
     * @param string $payload   Сырое тело HTTP-запроса (file_get_contents('php://input'))
     * @param string $signature Значение заголовка X-Botix-Signature
     * @param string $secret    Секрет подписки (выдан один раз при POST /webhooks)
     */
    public static function verifyWebhook(string $payload, string $signature, string $secret): bool
    {
        if ($secret === '' || $signature === '') {
            return false;
        }
        $expected = hash_hmac('sha256', $payload, $secret);
        return hash_equals($expected, $signature);
    }
}
