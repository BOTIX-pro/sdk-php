# Changelog

Все значимые изменения в этом проекте документируются здесь.
Формат — [Keep a Changelog](https://keepachangelog.com/ru/1.1.0/),
версионирование — [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.1.0] — 2026-05-22

### Added
- 3 новых bulk-endpoint: `contactsBulkCreate`, `contactsBulkUpdate`, `messagesBulkSend` (до 100 операций за запрос, частичный успех).
- Параметр `cursor` в 12 list-методах (cursor-based пагинация параллельно с существующим `page`/`per_page`, обратно-совместимо).
- Поле `meta.next_cursor` и `meta.has_more` в response list-методов (cursor-режим).
- Описание заголовков `X-RateLimit-Limit`, `X-RateLimit-Remaining`, `X-RateLimit-Reset` и `Retry-After` в спецификации.

### Changed
- Регенерация автогенерируемой части (`lib/`) на openapi.yaml v1.1.0.
- `Client::VERSION` и User-Agent → `1.1.0`.

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
