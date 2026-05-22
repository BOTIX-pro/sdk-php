# Changelog

Все значимые изменения в этом проекте документируются здесь.
Формат — [Keep a Changelog](https://keepachangelog.com/ru/1.1.0/),
версионирование — [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] — 2026-05-22

### Added
- Первый публичный релиз PHP SDK для BOTIX.
- Поддержка всех 21 endpoint Public API V1 (контакты, сообщения, чаты, сценарии, каналы, webhooks, служебные).
- Удобный класс-обёртка `BotixPro\Sdk\Client` с инициализацией в одну строку.
- Helper `Client::verifyWebhook()` — HMAC-SHA256 проверка подписи доставки с timing-safe сравнением.
- Guzzle middleware `BotixPro\Sdk\Middleware\IdempotencyMiddleware` — автогенерация `Idempotency-Key` (UUID v4) для POST/PUT/DELETE.
- Примеры использования в `examples/` (первый запрос, отправка сообщения, проверка webhook).
- Unit-тесты на хелперы (PHPUnit, матрица PHP 8.0 / 8.1 / 8.2 / 8.3).
- GitHub Actions CI.
