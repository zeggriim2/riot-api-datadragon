<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\DataLeague\Endpoint;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Component\HttpClient\Exception\ServerException as ServerExceptionHttpClient;
use Symfony\Component\HttpFoundation\Response;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\ChampionMastery;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\NextSeasonMilestones;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\RewardConfig;
use Zeggriim\RiotApiDataDragon\Enum\Platform;
use Zeggriim\RiotApiDataDragon\Exception\DataNotFoundException;
use Zeggriim\RiotApiDataDragon\Exception\ForbiddenException;
use Zeggriim\RiotApiDataDragon\Exception\RequestException;
use Zeggriim\RiotApiDataDragon\Exception\ServerException;
use Zeggriim\RiotApiDataDragon\Exception\ServerLimitException;
use Zeggriim\RiotApiDataDragon\Exception\UnauthorizedException;
use Zeggriim\RiotApiDataDragon\Exception\UnsupportedMediaTypeException;
use Zeggriim\RiotApiDataDragon\Tests\Traits\RiotApiDataLeagueTrait;

/**
 * @group league
 *
 * @internal
 *
 * @coversDefaultClass \Zeggriim\RiotApiDataDragon\DataLeague\Endpoint\ChampionMasteryApi
 */
final class ChampionMasteryApiTest extends KernelTestCase
{
    use RiotApiDataLeagueTrait;

    public function testGetAllChampionMasteries(): void
    {
        $dataResponse = [
            [
                'puuid' => 'test-puuid-12345',
                'championId' => 23,
                'championLevel' => 55,
                'championPoints' => 602248,
                'lastPlayTime' => 1762987142000,
                'championPointsSinceLastLevel' => 31648,
                'championPointsUntilNextLevel' => -20648,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 1,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
            [
                'puuid' => 'test-puuid-12345',
                'championId' => 36,
                'championLevel' => 32,
                'championPoints' => 345918,
                'lastPlayTime' => 1765817276000,
                'championPointsSinceLastLevel' => 28318,
                'championPointsUntilNextLevel' => -17318,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 1,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
        ];

        $championMasteryApi = $this->getChampionMasteryApi($dataResponse);
        $masteries = $championMasteryApi->getAllChampionMasteries('test-puuid-12345', Platform::EUW1);

        self::assertCount(2, $masteries);
    }

    public function testGetAllChampionMasteriesAsCollection(): void
    {
        $dataResponse = [
            [
                'puuid' => 'test-puuid-12345',
                'championId' => 23,
                'championLevel' => 55,
                'championPoints' => 602248,
                'lastPlayTime' => 1762987142000,
                'championPointsSinceLastLevel' => 31648,
                'championPointsUntilNextLevel' => -20648,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 1,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
            [
                'puuid' => 'test-puuid-12345',
                'championId' => 36,
                'championLevel' => 32,
                'championPoints' => 345918,
                'lastPlayTime' => 1765817276000,
                'championPointsSinceLastLevel' => 28318,
                'championPointsUntilNextLevel' => -17318,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 1,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
        ];

        $championMasteryApi = $this->getChampionMasteryApi($dataResponse);
        $masteries = $championMasteryApi->getAllChampionMasteriesAsCollection('test-puuid-12345', Platform::EUW1);

        self::assertCount(2, $masteries);

        $masteriesArrayCollection = $masteries->getIterator();
        $firstMastery = $masteriesArrayCollection->current();
        $dataFirst = $dataResponse[0];
        self::assertInstanceOf(ChampionMastery::class, $firstMastery);
        self::assertSame($dataFirst['championId'], $firstMastery->championId);
        self::assertSame($dataFirst['championLevel'], $firstMastery->championLevel);
        self::assertSame($dataFirst['championPoints'], $firstMastery->championPoints);

        $masteriesArrayCollection->next();
        $secondMastery = $masteriesArrayCollection->current();
        $dataSecond = $dataResponse[1];
        self::assertInstanceOf(ChampionMastery::class, $secondMastery);
        self::assertSame($dataSecond['championId'], $secondMastery->championId);
        self::assertSame($dataSecond['championLevel'], $secondMastery->championLevel);
        self::assertSame($dataSecond['championPoints'], $secondMastery->championPoints);
    }

    public function testGetChampionMastery(): void
    {
        $dataResponse = [
            'puuid' => 'test-puuid-67890',
            'championId' => 20,
            'championLevel' => 2,
            'championPoints' => 2486,
            'lastPlayTime' => 1698874951000,
            'championPointsSinceLastLevel' => 686,
            'championPointsUntilNextLevel' => 3514,
            'markRequiredForNextLevel' => 0,
            'tokensEarned' => 0,
            'championSeasonMilestone' => 0,
            'nextSeasonMilestone' => [
                'requireGradeCounts' => [
                    'A-' => 1,
                ],
                'rewardMarks' => 1,
                'bonus' => false,
                'totalGamesRequires' => 1,
                'rewardConfig' => [
                    'rewardValue' => 'value',
                    'rewardType' => 'type',
                    'maximumReward' => 1,
                ],
            ],
        ];

        $championMasteryApi = $this->getChampionMasteryApi($dataResponse);
        $mastery = $championMasteryApi->getChampionMastery('test-puuid-67890', 157, Platform::EUW1);

        self::assertSame($dataResponse['puuid'], $mastery['puuid']);
        self::assertSame($dataResponse['championPointsUntilNextLevel'], $mastery['championPointsUntilNextLevel']);
        self::assertSame($dataResponse['championId'], $mastery['championId']);
        self::assertSame($dataResponse['championLevel'], $mastery['championLevel']);
        self::assertSame($dataResponse['championPoints'], $mastery['championPoints']);
        self::assertSame($dataResponse['championPointsSinceLastLevel'], $mastery['championPointsSinceLastLevel']);
        self::assertSame($dataResponse['markRequiredForNextLevel'], $mastery['markRequiredForNextLevel']);
        self::assertSame($dataResponse['championSeasonMilestone'], $mastery['championSeasonMilestone']);
        self::assertSame($dataResponse['tokensEarned'], $mastery['tokensEarned']);
        self::assertArrayNotHasKey('milestoneGrades', $mastery);
        self::assertArrayNotHasKey('chestGranted', $mastery);

        self::assertArrayHasKey('nextSeasonMilestone', $mastery);
        $masteryNextSeasonMilestone = $mastery['nextSeasonMilestone'];
        self::assertSame($dataResponse['nextSeasonMilestone']['requireGradeCounts'], $masteryNextSeasonMilestone['requireGradeCounts']);
        self::assertSame($dataResponse['nextSeasonMilestone']['rewardMarks'], $masteryNextSeasonMilestone['rewardMarks']);
        self::assertSame($dataResponse['nextSeasonMilestone']['bonus'], $masteryNextSeasonMilestone['bonus']);

        self::assertArrayHasKey('rewardConfig', $masteryNextSeasonMilestone);
        $masteryNextSeasonMilestoneRewardConfig = $masteryNextSeasonMilestone['rewardConfig'];
        self::assertSame($dataResponse['nextSeasonMilestone']['rewardConfig']['rewardValue'], $masteryNextSeasonMilestoneRewardConfig['rewardValue']);
        self::assertSame($dataResponse['nextSeasonMilestone']['rewardConfig']['rewardType'], $masteryNextSeasonMilestoneRewardConfig['rewardType']);
        self::assertSame($dataResponse['nextSeasonMilestone']['rewardConfig']['maximumReward'], $masteryNextSeasonMilestoneRewardConfig['maximumReward']);
    }

    public function testGetChampionMasteryAsObject(): void
    {
        $dataResponse = [
            'puuid' => 'test-puuid-67890',
            'championId' => 20,
            'championLevel' => 2,
            'championPoints' => 2486,
            'lastPlayTime' => 1698874951000,
            'championPointsSinceLastLevel' => 686,
            'championPointsUntilNextLevel' => 3514,
            'markRequiredForNextLevel' => 0,
            'tokensEarned' => 0,
            'championSeasonMilestone' => 0,
            'nextSeasonMilestone' => [
                'requireGradeCounts' => [
                    'A-' => 1,
                ],
                'rewardMarks' => 1,
                'bonus' => false,
                'totalGamesRequires' => 1,
                'rewardConfig' => [
                    'rewardValue' => 'value',
                    'rewardType' => 'type',
                    'maximumReward' => 1,
                ],
            ],
        ];

        $championMasteryApi = $this->getChampionMasteryApi($dataResponse);
        $mastery = $championMasteryApi->getChampionMasteryAsObject('test-puuid-67890', 157, Platform::EUW1);

        self::assertSame($dataResponse['puuid'], $mastery->puuid);
        self::assertSame($dataResponse['championPointsUntilNextLevel'], $mastery->championPointsUntilNextLevel);
        self::assertSame($dataResponse['championId'], $mastery->championId);
        self::assertSame($dataResponse['championLevel'], $mastery->championLevel);
        self::assertSame($dataResponse['championPoints'], $mastery->championPoints);
        self::assertSame($dataResponse['championPointsSinceLastLevel'], $mastery->championPointsSinceLastLevel);
        self::assertSame($dataResponse['markRequiredForNextLevel'], $mastery->markRequiredForNextLevel);
        self::assertSame($dataResponse['championSeasonMilestone'], $mastery->championSeasonMilestone);
        self::assertSame($dataResponse['tokensEarned'], $mastery->tokensEarned);
        self::assertSame([], $mastery->milestoneGrades);
        self::assertFalse($mastery->chestGranted);

        self::assertInstanceOf(NextSeasonMilestones::class, $mastery->nextSeasonMilestone);
        self::assertSame($dataResponse['nextSeasonMilestone']['requireGradeCounts'], $mastery->nextSeasonMilestone->requireGradeCounts);
        self::assertSame($dataResponse['nextSeasonMilestone']['rewardMarks'], $mastery->nextSeasonMilestone->rewardMarks);
        self::assertSame($dataResponse['nextSeasonMilestone']['bonus'], $mastery->nextSeasonMilestone->bonus);

        self::assertInstanceOf(RewardConfig::class, $mastery->nextSeasonMilestone->rewardConfig);
        self::assertSame($dataResponse['nextSeasonMilestone']['rewardConfig']['rewardValue'], $mastery->nextSeasonMilestone->rewardConfig->rewardValue);
        self::assertSame($dataResponse['nextSeasonMilestone']['rewardConfig']['rewardType'], $mastery->nextSeasonMilestone->rewardConfig->rewardType);
        self::assertSame($dataResponse['nextSeasonMilestone']['rewardConfig']['maximumReward'], $mastery->nextSeasonMilestone->rewardConfig->maximumReward);
    }

    public function testGetTopChampionMasteriesWithoutCount(): void
    {
        $dataResponse = [
            [
                'puuid' => 'test-puuid-abc',
                'championId' => 23,
                'championLevel' => 55,
                'championPoints' => 602248,
                'lastPlayTime' => 1762987142000,
                'championPointsSinceLastLevel' => 31648,
                'championPointsUntilNextLevel' => -20648,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 1,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
            [
                'puuid' => 'test-puuid-abc',
                'championId' => 36,
                'championLevel' => 32,
                'championPoints' => 345918,
                'lastPlayTime' => 1765817276000,
                'championPointsSinceLastLevel' => 28318,
                'championPointsUntilNextLevel' => -17318,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 1,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
        ];

        $championMasteryApi = $this->getChampionMasteryApi($dataResponse);
        $topMasteries = $championMasteryApi->getTopChampionMasteries('test-puuid-abc', Platform::EUW1);

        self::assertCount(\count($dataResponse), $topMasteries);
        $dataTopMasteryFirst = $dataResponse[0];
        $topMasteriesFirst = $topMasteries[0];

        self::assertSame($dataTopMasteryFirst['championId'], $topMasteriesFirst['championId']);
        self::assertSame($dataTopMasteryFirst['championPoints'], $topMasteriesFirst['championPoints']);
    }

    public function testGetTopChampionMasteriesAsCollectionWithoutCount(): void
    {
        $dataResponse = [
            [
                'puuid' => 'test-puuid-abc',
                'championId' => 23,
                'championLevel' => 55,
                'championPoints' => 602248,
                'lastPlayTime' => 1762987142000,
                'championPointsSinceLastLevel' => 31648,
                'championPointsUntilNextLevel' => -20648,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 1,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
            [
                'puuid' => 'test-puuid-abc',
                'championId' => 36,
                'championLevel' => 32,
                'championPoints' => 345918,
                'lastPlayTime' => 1765817276000,
                'championPointsSinceLastLevel' => 28318,
                'championPointsUntilNextLevel' => -17318,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 1,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
        ];

        $championMasteryApi = $this->getChampionMasteryApi($dataResponse);
        $topMasteries = $championMasteryApi->getTopChampionMasteriesAsCollection('test-puuid-abc', Platform::EUW1);

        self::assertCount(\count($dataResponse), $topMasteries);
        $topMasteriesFirst = $topMasteries->getIterator()->current();
        $dataTopMasteryFirst = $dataResponse[0];

        self::assertInstanceOf(ChampionMastery::class, $topMasteriesFirst);
        self::assertSame($dataTopMasteryFirst['championId'], $topMasteriesFirst->championId);
        self::assertSame($dataTopMasteryFirst['championPoints'], $topMasteriesFirst->championPoints);
    }

    public function testGetTopChampionMasteriesWithCount(): void
    {
        $dataResponse = [
            [
                'puuid' => 'test-puuid-xyz',
                'championId' => 23,
                'championLevel' => 55,
                'championPoints' => 602248,
                'lastPlayTime' => 1762987142000,
                'championPointsSinceLastLevel' => 31648,
                'championPointsUntilNextLevel' => -20648,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 1,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
            [
                'puuid' => 'test-puuid-xyz',
                'championId' => 36,
                'championLevel' => 32,
                'championPoints' => 345918,
                'lastPlayTime' => 1765817276000,
                'championPointsSinceLastLevel' => 28318,
                'championPointsUntilNextLevel' => -17318,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 1,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
            [
                'puuid' => 'test-puuid-xyz',
                'championId' => 21,
                'championLevel' => 22,
                'championPoints' => 208417,
                'lastPlayTime' => 1765983471000,
                'championPointsSinceLastLevel' => 817,
                'championPointsUntilNextLevel' => 10183,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 11,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
        ];

        $championMasteryApi = $this->getChampionMasteryApi($dataResponse);
        $topMasteries = $championMasteryApi->getTopChampionMasteries('test-puuid-xyz', Platform::EUW1, 3);

        self::assertCount(\count($dataResponse), $topMasteries);
        $topMasteryFirst = $topMasteries[0];
        $dataMasteryFirst = $dataResponse[0];

        self::assertSame($dataMasteryFirst['puuid'], $topMasteryFirst['puuid']);
        self::assertSame($dataMasteryFirst['championPointsUntilNextLevel'], $topMasteryFirst['championPointsUntilNextLevel']);
        self::assertSame($dataMasteryFirst['championId'], $topMasteryFirst['championId']);
    }

    public function testGetTopChampionMasteriesAsCollectionWithCount(): void
    {
        $dataResponse = [
            [
                'puuid' => 'NFLqmQ-TfqzILQI1aYhPTIBn6FG1Ox3QYT2sCGDRQNlEQC8MVIzkOjw2VAncGE70VF-L4ptfaUxEUw',
                'championId' => 23,
                'championLevel' => 55,
                'championPoints' => 602248,
                'lastPlayTime' => 1762987142000,
                'championPointsSinceLastLevel' => 31648,
                'championPointsUntilNextLevel' => -20648,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 1,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
            [
                'puuid' => 'NFLqmQ-TfqzILQI1aYhPTIBn6FG1Ox3QYT2sCGDRQNlEQC8MVIzkOjw2VAncGE70VF-L4ptfaUxEUw',
                'championId' => 36,
                'championLevel' => 32,
                'championPoints' => 345918,
                'lastPlayTime' => 1765817276000,
                'championPointsSinceLastLevel' => 28318,
                'championPointsUntilNextLevel' => -17318,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 1,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
            [
                'puuid' => 'NFLqmQ-TfqzILQI1aYhPTIBn6FG1Ox3QYT2sCGDRQNlEQC8MVIzkOjw2VAncGE70VF-L4ptfaUxEUw',
                'championId' => 21,
                'championLevel' => 22,
                'championPoints' => 208417,
                'lastPlayTime' => 1765983471000,
                'championPointsSinceLastLevel' => 817,
                'championPointsUntilNextLevel' => 10183,
                'markRequiredForNextLevel' => 2,
                'tokensEarned' => 11,
                'championSeasonMilestone' => 0,
                'nextSeasonMilestone' => [
                    'requireGradeCounts' => [
                        'A-' => 1,
                    ],
                    'rewardMarks' => 1,
                    'bonus' => false,
                    'totalGamesRequires' => 1,
                ],
            ],
        ];

        $championMasteryApi = $this->getChampionMasteryApi($dataResponse);
        $topMasteries = $championMasteryApi->getTopChampionMasteriesAsCollection('test-puuid-xyz', Platform::EUW1, 3);

        $topMasteryFirst = $topMasteries->getIterator()->current();
        $dataMasteryFirst = $dataResponse[0];

        self::assertCount(\count($dataResponse), $topMasteries);
        self::assertInstanceOf(ChampionMastery::class, $topMasteryFirst);
        self::assertSame($dataMasteryFirst['puuid'], $topMasteryFirst->puuid);
        self::assertSame($dataMasteryFirst['championPointsUntilNextLevel'], $topMasteryFirst->championPointsUntilNextLevel);
        self::assertSame($dataMasteryFirst['championId'], $topMasteryFirst->championId);
    }

    public function testGetTotalMasteryScore(): void
    {
        // Note: Riot API returns just a number for this endpoint, not an object
        $dataResponse = [342];

        // @phpstan-ignore-next-line - Intentionally passing int instead of array for this specific endpoint
        $championMasteryApi = $this->getChampionMasteryApi($dataResponse);
        $totalScore = $championMasteryApi->getTotalMasteryScore('test-puuid-score', Platform::EUW1);

        self::assertSame(342, $totalScore);
    }

    /**
     * @dataProvider provideGetBadRequestCases
     *
     * @param class-string<\Throwable> $exceptionClass
     */
    public function testGetBadRequest(int $codeStatus, string $exceptionClass, string $exceptionMessage): void
    {
        $championMasteryApi = $this->getChampionMasteryApi(['test' => 'test'], ['http_code' => $codeStatus]);
        self::expectException($exceptionClass);
        self::expectExceptionMessage($exceptionMessage);
        $res = $championMasteryApi->getAllChampionMasteries('test-puuid', Platform::EUW1);
        self::assertCount(0, $res);
    }

    public static function provideGetBadRequestCases(): iterable
    {
        return [
            [Response::HTTP_BAD_REQUEST, RequestException::class, 'LeagueAPI: Request is invalid'],
            [Response::HTTP_UNAUTHORIZED, UnauthorizedException::class, 'LeagueAPI: Unauthorized request.'],
            [Response::HTTP_FORBIDDEN, ForbiddenException::class, 'LeagueAPI: Forbidden.'],
            [Response::HTTP_NOT_FOUND, DataNotFoundException::class, 'LeagueAPI: Data not found'],
            [Response::HTTP_UNSUPPORTED_MEDIA_TYPE, UnsupportedMediaTypeException::class, 'LeagueAPI: Unsupported media type'],
            [Response::HTTP_NOT_ACCEPTABLE, ClientException::class, 'HTTP 406 returned for "https://euw1.api.riotgames.com/lol/champion-mastery/v4/champion-masteries/by-puuid/test-puuid".'],
            [Response::HTTP_TOO_MANY_REQUESTS, ServerLimitException::class, 'LeagueAPI: Rate limit exceeded request.'],
            [Response::HTTP_INTERNAL_SERVER_ERROR, ServerException::class, 'LeagueAPI: Internal server error occured.'],
            [Response::HTTP_SERVICE_UNAVAILABLE, ServerException::class, 'LeagueAPI: Service is temporarily unavailable.'],
            [Response::HTTP_GATEWAY_TIMEOUT, ServerExceptionHttpClient::class, 'HTTP 504 returned for "https://euw1.api.riotgames.com/lol/champion-mastery/v4/champion-masteries/by-puuid/test-puuid".'],
        ];
    }
}
