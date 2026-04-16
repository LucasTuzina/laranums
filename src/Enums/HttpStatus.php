<?php

namespace Lucastuzina\Laranums\Enums;

use Lucastuzina\Laranums\Attributes\Label;
use Lucastuzina\Laranums\Laranum;

enum HttpStatus: int
{
    use Laranum;

    // 1xx — Informational
    #[Label('Continue')]
    case CONTINUE = 100;
    #[Label('Switching Protocols')]
    case SWITCHING_PROTOCOLS = 101;
    #[Label('Processing')]
    case PROCESSING = 102;
    #[Label('Early Hints')]
    case EARLY_HINTS = 103;

    // 2xx — Success
    #[Label('OK')]
    case OK = 200;
    #[Label('Created')]
    case CREATED = 201;
    #[Label('Accepted')]
    case ACCEPTED = 202;
    #[Label('Non-Authoritative Information')]
    case NON_AUTHORITATIVE_INFORMATION = 203;
    #[Label('No Content')]
    case NO_CONTENT = 204;
    #[Label('Reset Content')]
    case RESET_CONTENT = 205;
    #[Label('Partial Content')]
    case PARTIAL_CONTENT = 206;

    // 3xx — Redirection
    #[Label('Multiple Choices')]
    case MULTIPLE_CHOICES = 300;
    #[Label('Moved Permanently')]
    case MOVED_PERMANENTLY = 301;
    #[Label('Found')]
    case FOUND = 302;
    #[Label('See Other')]
    case SEE_OTHER = 303;
    #[Label('Not Modified')]
    case NOT_MODIFIED = 304;
    #[Label('Temporary Redirect')]
    case TEMPORARY_REDIRECT = 307;
    #[Label('Permanent Redirect')]
    case PERMANENT_REDIRECT = 308;

    // 4xx — Client Error
    #[Label('Bad Request')]
    case BAD_REQUEST = 400;
    #[Label('Unauthorized')]
    case UNAUTHORIZED = 401;
    #[Label('Payment Required')]
    case PAYMENT_REQUIRED = 402;
    #[Label('Forbidden')]
    case FORBIDDEN = 403;
    #[Label('Not Found')]
    case NOT_FOUND = 404;
    #[Label('Method Not Allowed')]
    case METHOD_NOT_ALLOWED = 405;
    #[Label('Not Acceptable')]
    case NOT_ACCEPTABLE = 406;
    #[Label('Request Timeout')]
    case REQUEST_TIMEOUT = 408;
    #[Label('Conflict')]
    case CONFLICT = 409;
    #[Label('Gone')]
    case GONE = 410;
    #[Label('Length Required')]
    case LENGTH_REQUIRED = 411;
    #[Label('Precondition Failed')]
    case PRECONDITION_FAILED = 412;
    #[Label('Payload Too Large')]
    case PAYLOAD_TOO_LARGE = 413;
    #[Label('URI Too Long')]
    case URI_TOO_LONG = 414;
    #[Label('Unsupported Media Type')]
    case UNSUPPORTED_MEDIA_TYPE = 415;
    #[Label('Unprocessable Entity')]
    case UNPROCESSABLE_ENTITY = 422;
    #[Label('Locked')]
    case LOCKED = 423;
    #[Label('Too Many Requests')]
    case TOO_MANY_REQUESTS = 429;

    // 5xx — Server Error
    #[Label('Internal Server Error')]
    case INTERNAL_SERVER_ERROR = 500;
    #[Label('Not Implemented')]
    case NOT_IMPLEMENTED = 501;
    #[Label('Bad Gateway')]
    case BAD_GATEWAY = 502;
    #[Label('Service Unavailable')]
    case SERVICE_UNAVAILABLE = 503;
    #[Label('Gateway Timeout')]
    case GATEWAY_TIMEOUT = 504;
    #[Label('HTTP Version Not Supported')]
    case HTTP_VERSION_NOT_SUPPORTED = 505;

    /**
     * Numeric category: 1, 2, 3, 4 or 5.
     */
    public function category(): int
    {
        return intdiv($this->value, 100);
    }

    public function isInformational(): bool
    {
        return $this->category() === 1;
    }

    public function isSuccess(): bool
    {
        return $this->category() === 2;
    }

    public function isRedirection(): bool
    {
        return $this->category() === 3;
    }

    public function isClientError(): bool
    {
        return $this->category() === 4;
    }

    public function isServerError(): bool
    {
        return $this->category() === 5;
    }

    /**
     * Whether this status indicates any kind of error (4xx or 5xx).
     */
    public function isError(): bool
    {
        return $this->isClientError() || $this->isServerError();
    }

    /**
     * The IANA reason phrase for this status code.
     */
    public function reasonPhrase(): string
    {
        return $this->label();
    }
}
