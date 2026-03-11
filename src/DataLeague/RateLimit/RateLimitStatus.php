<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\RateLimit;

final class RateLimitStatus
{
    public function __construct(
        public readonly ?string $appLimit,
        public readonly ?string $appLimitCount,
        public readonly ?string $methodLimit,
        public readonly ?string $methodLimitCount,
    ) {
    }

    /**
     * @param array<string, list<string>> $headers
     */
    public static function fromHeaders(array $headers): self
    {
        return new self(
            appLimit: $headers['x-app-rate-limit'][0] ?? null,
            appLimitCount: $headers['x-app-rate-limit-count'][0] ?? null,
            methodLimit: $headers['x-method-rate-limit'][0] ?? null,
            methodLimitCount: $headers['x-method-rate-limit-count'][0] ?? null,
        );
    }

    /**
     * Returns true if any rate limit interval is at or above the given threshold (default 80%).
     *
     * Example: appLimit="20:1,100:120", appLimitCount="18:1,95:120", threshold=0.9
     * → 18/20 = 0.90 >= 0.9 → true
     */
    public function isNearLimit(float $threshold = 0.8): bool
    {
        return $this->checkNearLimit($this->appLimit, $this->appLimitCount, $threshold)
            || $this->checkNearLimit($this->methodLimit, $this->methodLimitCount, $threshold);
    }

    private function checkNearLimit(?string $limit, ?string $count, float $threshold): bool
    {
        if (null === $limit || null === $count) {
            return false;
        }

        $limits = $this->parseLimitHeader($limit);
        $counts = $this->parseLimitHeader($count);

        foreach ($counts as $interval => $current) {
            $max = $limits[$interval] ?? null;
            if (null !== $max && $max > 0 && ($current / $max) >= $threshold) {
                return true;
            }
        }

        return false;
    }

    /**
     * Parses "20:1,100:120" into [1 => 20, 120 => 100].
     *
     * @return array<int, int>
     */
    private function parseLimitHeader(string $header): array
    {
        $result = [];

        foreach (explode(',', $header) as $part) {
            $segments = explode(':', $part);
            if (2 !== \count($segments)) {
                continue;
            }
            $result[(int) $segments[1]] = (int) $segments[0];
        }

        return $result;
    }
}
