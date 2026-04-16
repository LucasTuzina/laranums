<?php

namespace Lucastuzina\Laranums\Enums;

use Lucastuzina\Laranums\Laranum;

enum HttpMethod: string
{
    use Laranum;

    case GET     = 'GET';
    case POST    = 'POST';
    case PUT     = 'PUT';
    case PATCH   = 'PATCH';
    case DELETE  = 'DELETE';
    case HEAD    = 'HEAD';
    case OPTIONS = 'OPTIONS';
    case TRACE   = 'TRACE';
    case CONNECT = 'CONNECT';

    /**
     * Safe methods don't alter server state (RFC 7231 §4.2.1).
     */
    public function isSafe(): bool
    {
        return in_array($this, [self::GET, self::HEAD, self::OPTIONS, self::TRACE], true);
    }

    /**
     * Idempotent methods produce the same effect no matter how often they're repeated
     * (RFC 7231 §4.2.2).
     */
    public function isIdempotent(): bool
    {
        return in_array(
            $this,
            [self::GET, self::HEAD, self::OPTIONS, self::TRACE, self::PUT, self::DELETE],
            true
        );
    }

    /**
     * Whether this method typically carries a request body.
     */
    public function hasRequestBody(): bool
    {
        return in_array($this, [self::POST, self::PUT, self::PATCH], true);
    }
}
