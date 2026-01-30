<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Filter;

use Zeggriim\RiotApiDataDragon\Enum\MatchType;
use Zeggriim\RiotApiDataDragon\Enum\QueueId;

final class MatchFilter
{
    private const DEFAULT_START = 0;
    private const DEFAULT_COUNT = 20;
    private const MAX_COUNT = 100;

    private ?int $startTime = null;
    private ?int $endTime = null;
    private ?int $queue = null;
    private ?string $type = null;
    private int $start = self::DEFAULT_START;
    private int $count = self::DEFAULT_COUNT;

    public function setStartTime(\DateTimeInterface $startTime): self
    {
        $this->startTime = $startTime->getTimestamp();

        return $this;
    }

    public function setStartTimeTimestamp(int $timestamp): self
    {
        $this->startTime = $timestamp;

        return $this;
    }

    public function setEndTime(\DateTimeInterface $endTime): self
    {
        $this->endTime = $endTime->getTimestamp();

        return $this;
    }

    public function setEndTimeTimestamp(int $timestamp): self
    {
        $this->endTime = $timestamp;

        return $this;
    }

    public function setQueue(QueueId $queue): self
    {
        $this->queue = $queue->value;

        return $this;
    }

    public function setQueueId(int $queueId): self
    {
        $this->queue = $queueId;

        return $this;
    }

    public function setType(MatchType $type): self
    {
        $this->type = $type->value;

        return $this;
    }

    public function setStart(int $start): self
    {
        $this->start = max(0, $start);

        return $this;
    }

    public function setCount(int $count): self
    {
        $this->count = min(max(1, $count), self::MAX_COUNT);

        return $this;
    }

    /**
     * Convert filter to query parameters array.
     *
     * @return array<string, int|string>
     */
    public function toQueryParams(): array
    {
        $params = [];

        if (null !== $this->startTime) {
            $params['startTime'] = $this->startTime;
        }

        if (null !== $this->endTime) {
            $params['endTime'] = $this->endTime;
        }

        if (null !== $this->queue) {
            $params['queue'] = $this->queue;
        }

        if (null !== $this->type) {
            $params['type'] = $this->type;
        }

        if (self::DEFAULT_START !== $this->start) {
            $params['start'] = $this->start;
        }

        if (self::DEFAULT_COUNT !== $this->count) {
            $params['count'] = $this->count;
        }

        return $params;
    }

    /**
     * Build query string from filter.
     */
    public function toQueryString(): string
    {
        $params = $this->toQueryParams();

        if ([] === $params) {
            return '';
        }

        return \sprintf('%s%s', '?', http_build_query($params));
    }
}
