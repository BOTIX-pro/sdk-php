<?php
/**
 * Guzzle middleware: автогенерация заголовка Idempotency-Key
 * для мутирующих методов (POST/PUT/DELETE), если разработчик
 * явно его не передал.
 *
 * Стандарт Stripe: BOTIX-сервер кеширует ответ на 24 часа по
 * связке (api_key_id, Idempotency-Key) и возвращает тот же
 * результат на повтор с заголовком Idempotent-Replayed: 1.
 */

declare(strict_types=1);

namespace BotixPro\Sdk\Middleware;

use Psr\Http\Message\RequestInterface;

final class IdempotencyMiddleware
{
    private const MUTATING_METHODS = ['POST', 'PUT', 'DELETE'];

    /**
     * Фабрика middleware для HandlerStack::push().
     */
    public static function create(): callable
    {
        return static function (callable $handler): callable {
            return static function (RequestInterface $request, array $options) use ($handler) {
                if (
                    in_array(strtoupper($request->getMethod()), self::MUTATING_METHODS, true)
                    && !$request->hasHeader('Idempotency-Key')
                ) {
                    $request = $request->withHeader('Idempotency-Key', self::uuidV4());
                }
                return $handler($request, $options);
            };
        };
    }

    /**
     * UUID v4 без зависимости от ramsey/uuid (PHP 8.0+ random_bytes).
     */
    public static function uuidV4(): string
    {
        $data = random_bytes(16);
        $data[6] = chr((ord($data[6]) & 0x0f) | 0x40);
        $data[8] = chr((ord($data[8]) & 0x3f) | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
