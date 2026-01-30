<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\DataLeague\Filter;

use PHPUnit\Framework\TestCase;
use Zeggriim\RiotApiDataDragon\DataLeague\Filter\MatchFilter;
use Zeggriim\RiotApiDataDragon\Enum\MatchType;
use Zeggriim\RiotApiDataDragon\Enum\QueueId;

/**
 * @group filter
 *
 * @internal
 *
 * @coversDefaultClass \Zeggriim\RiotApiDataDragon\DataLeague\Filter\MatchFilter
 */
final class MatchFilterTest extends TestCase
{
    public function testEmptyFilterReturnsEmptyQueryString(): void
    {
        $filter = new MatchFilter();

        self::assertSame('', $filter->toQueryString());
        self::assertSame([], $filter->toQueryParams());
    }

    public function testSetQueue(): void
    {
        $filter = (new MatchFilter())->setQueue(QueueId::RANKED_SOLO_DUO);

        $params = $filter->toQueryParams();

        self::assertArrayHasKey('queue', $params);
        self::assertSame(420, $params['queue']);
    }

    public function testSetQueueId(): void
    {
        $filter = (new MatchFilter())->setQueueId(450);

        $params = $filter->toQueryParams();

        self::assertArrayHasKey('queue', $params);
        self::assertSame(450, $params['queue']);
    }

    public function testSetType(): void
    {
        $filter = (new MatchFilter())->setType(MatchType::RANKED);

        $params = $filter->toQueryParams();

        self::assertArrayHasKey('type', $params);
        self::assertSame('ranked', $params['type']);
    }

    public function testSetCount(): void
    {
        $filter = (new MatchFilter())->setCount(50);

        $params = $filter->toQueryParams();

        self::assertArrayHasKey('count', $params);
        self::assertSame(50, $params['count']);
    }

    public function testSetCountMaxIs100(): void
    {
        $filter = (new MatchFilter())->setCount(200);

        $params = $filter->toQueryParams();

        self::assertSame(100, $params['count']);
    }

    public function testSetCountMinIs1(): void
    {
        $filter = (new MatchFilter())->setCount(0);

        $params = $filter->toQueryParams();

        self::assertSame(1, $params['count']);
    }

    public function testSetStart(): void
    {
        $filter = (new MatchFilter())->setStart(10);

        $params = $filter->toQueryParams();

        self::assertArrayHasKey('start', $params);
        self::assertSame(10, $params['start']);
    }

    public function testSetStartMinIs0(): void
    {
        $filter = (new MatchFilter())->setStart(-5);

        $params = $filter->toQueryParams();

        // start=0 is default, so it's not included in params
        self::assertArrayNotHasKey('start', $params);
    }

    public function testDefaultStartIsNotIncluded(): void
    {
        $filter = (new MatchFilter())->setStart(0);

        $params = $filter->toQueryParams();

        self::assertArrayNotHasKey('start', $params);
    }

    public function testDefaultCountIsNotIncluded(): void
    {
        $filter = (new MatchFilter())->setCount(20);

        $params = $filter->toQueryParams();

        self::assertArrayNotHasKey('count', $params);
    }

    public function testSetStartTime(): void
    {
        $date = new \DateTimeImmutable('2024-01-01 00:00:00');
        $filter = (new MatchFilter())->setStartTime($date);

        $params = $filter->toQueryParams();

        self::assertArrayHasKey('startTime', $params);
        self::assertSame($date->getTimestamp(), $params['startTime']);
    }

    public function testSetStartTimeTimestamp(): void
    {
        $timestamp = 1704067200;
        $filter = (new MatchFilter())->setStartTimeTimestamp($timestamp);

        $params = $filter->toQueryParams();

        self::assertArrayHasKey('startTime', $params);
        self::assertSame($timestamp, $params['startTime']);
    }

    public function testSetEndTime(): void
    {
        $date = new \DateTimeImmutable('2024-12-31 23:59:59');
        $filter = (new MatchFilter())->setEndTime($date);

        $params = $filter->toQueryParams();

        self::assertArrayHasKey('endTime', $params);
        self::assertSame($date->getTimestamp(), $params['endTime']);
    }

    public function testSetEndTimeTimestamp(): void
    {
        $timestamp = 1735689599;
        $filter = (new MatchFilter())->setEndTimeTimestamp($timestamp);

        $params = $filter->toQueryParams();

        self::assertArrayHasKey('endTime', $params);
        self::assertSame($timestamp, $params['endTime']);
    }

    public function testCompleteFilter(): void
    {
        $startDate = new \DateTimeImmutable('2024-01-01');
        $endDate = new \DateTimeImmutable('2024-12-31');

        $filter = (new MatchFilter())
            ->setStartTime($startDate)
            ->setEndTime($endDate)
            ->setQueue(QueueId::RANKED_SOLO_DUO)
            ->setType(MatchType::RANKED)
            ->setStart(0)
            ->setCount(50)
        ;

        $params = $filter->toQueryParams();

        // 5 params: startTime, endTime, queue, type, count (start=0 is default so not included)
        self::assertCount(5, $params);
        self::assertSame($startDate->getTimestamp(), $params['startTime']);
        self::assertSame($endDate->getTimestamp(), $params['endTime']);
        self::assertSame(420, $params['queue']);
        self::assertSame('ranked', $params['type']);
        self::assertSame(50, $params['count']);
    }

    public function testToQueryString(): void
    {
        $filter = (new MatchFilter())
            ->setQueue(QueueId::ARAM)
            ->setCount(10)
        ;

        $queryString = $filter->toQueryString();

        self::assertStringStartsWith('?', $queryString);
        self::assertStringContainsString('queue=450', $queryString);
        self::assertStringContainsString('count=10', $queryString);
    }

    public function testFluentInterface(): void
    {
        $filter = new MatchFilter();

        $result = $filter
            ->setQueue(QueueId::RANKED_SOLO_DUO)
            ->setType(MatchType::RANKED)
            ->setCount(50)
            ->setStart(10)
            ->setStartTime(new \DateTimeImmutable())
            ->setEndTime(new \DateTimeImmutable())
        ;

        self::assertSame($filter, $result);
    }
}
