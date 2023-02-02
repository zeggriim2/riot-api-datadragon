<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Tests\DataDragonApi;

use Zeggriim\RiotApiDatadragon\Enum\TypeReturn;
use Zeggriim\RiotApiDatadragon\Model\Champion\ChampionData;
use Zeggriim\RiotApiDatadragon\Model\Champion\ChampionDetail;
use Zeggriim\RiotApiDatadragon\Model\Champion\ChampionMetadata;
use Zeggriim\RiotApiDatadragon\Model\Champion\Champions;
use Zeggriim\RiotApiDatadragon\Model\Champion\Leveltip;
use Zeggriim\RiotApiDatadragon\Model\Champion\Passive;
use Zeggriim\RiotApiDatadragon\Model\Champion\Skin;
use Zeggriim\RiotApiDatadragon\Model\Champion\Spell;
use Zeggriim\RiotApiDatadragon\Model\Champion\Stats;
use Zeggriim\RiotApiDatadragon\Model\General\Info;
use Zeggriim\RiotApiDatadragon\Tests\BaseApiTest;
use Zeggriim\RiotApiDatadragon\Tests\Traits\AssertImageTrait;

class ChampionApiTest extends BaseApiTest
{
    use AssertImageTrait;

    public function testGetChampionsArray()
    {
        $champions = $this->api->getChampions();
        $this->assertIsArray($champions);
    }

    public function testGetChampionsObjet()
    {
        $champions = $this->api->getChampions(TypeReturn::RETURN_OBJET);
        $this->assertInstanceOf(ChampionMetadata::class, $champions);
        $this->assertChampionMetadata($champions);
    }

    private function assertChampionMetadata(ChampionMetadata $championMetadata)
    {
        $this->assertIsString($championMetadata->getType());
        $this->assertIsString($championMetadata->getFormat());
        $this->assertIsString($championMetadata->getVersion());
        $this->assertChampions($championMetadata->getData());
    }

    private function assertChampions(Champions $champions)
    {
        $this->assertChampionData($champions->getAatrox());
        $this->assertChampionData($champions->getAhri());
        $this->assertChampionData($champions->getAkali());
        $this->assertChampionData($champions->getAkshan());
        $this->assertChampionData($champions->getAlistar());
        $this->assertChampionData($champions->getAmumu());
        $this->assertChampionData($champions->getAnivia());
        $this->assertChampionData($champions->getAnnie());
        $this->assertChampionData($champions->getAphelios());
        $this->assertChampionData($champions->getAshe());
        $this->assertChampionData($champions->getAurelionSol());
        $this->assertChampionData($champions->getAzir());
        $this->assertChampionData($champions->getBard());
        $this->assertChampionData($champions->getBelveth());
        $this->assertChampionData($champions->getBlitzcrank());
        $this->assertChampionData($champions->getBrand());
        $this->assertChampionData($champions->getBraum());
        $this->assertChampionData($champions->getCaitlyn());
        $this->assertChampionData($champions->getCamille());
        $this->assertChampionData($champions->getCassiopeia());
        $this->assertChampionData($champions->getChogath());
        $this->assertChampionData($champions->getCorki());
        $this->assertChampionData($champions->getDarius());
        $this->assertChampionData($champions->getDiana());
        $this->assertChampionData($champions->getDraven());
        $this->assertChampionData($champions->getDrMundo());
        $this->assertChampionData($champions->getEkko());
        $this->assertChampionData($champions->getElise());
        $this->assertChampionData($champions->getEvelynn());
        $this->assertChampionData($champions->getEzreal());
        $this->assertChampionData($champions->getFiddlesticks());
        $this->assertChampionData($champions->getFiora());
        $this->assertChampionData($champions->getFizz());
        $this->assertChampionData($champions->getGalio());
        $this->assertChampionData($champions->getGangplank());
        $this->assertChampionData($champions->getGaren());
        $this->assertChampionData($champions->getGnar());
        $this->assertChampionData($champions->getGragas());
        $this->assertChampionData($champions->getGraves());
        $this->assertChampionData($champions->getGwen());
        $this->assertChampionData($champions->getHecarim());
        $this->assertChampionData($champions->getHeimerdinger());
        $this->assertChampionData($champions->getIllaoi());
        $this->assertChampionData($champions->getIrelia());
        $this->assertChampionData($champions->getIvern());
        $this->assertChampionData($champions->getJanna());
        $this->assertChampionData($champions->getJarvanIV());
        $this->assertChampionData($champions->getJax());
        $this->assertChampionData($champions->getJayce());
        $this->assertChampionData($champions->getJhin());
        $this->assertChampionData($champions->getJinx());
        $this->assertChampionData($champions->getKaisa());
        $this->assertChampionData($champions->getKalista());
        $this->assertChampionData($champions->getKarma());
        $this->assertChampionData($champions->getKarthus());
        $this->assertChampionData($champions->getKassadin());
        $this->assertChampionData($champions->getKatarina());
        $this->assertChampionData($champions->getKayle());
        $this->assertChampionData($champions->getKayn());
        $this->assertChampionData($champions->getKennen());
        $this->assertChampionData($champions->getKhazix());
        $this->assertChampionData($champions->getKindred());
        $this->assertChampionData($champions->getKled());
        $this->assertChampionData($champions->getKogMaw());
        $this->assertChampionData($champions->getKSante());
        $this->assertChampionData($champions->getLeblanc());
        $this->assertChampionData($champions->getLeeSin());
        $this->assertChampionData($champions->getLeona());
        $this->assertChampionData($champions->getLillia());
        $this->assertChampionData($champions->getLissandra());
        $this->assertChampionData($champions->getLucian());
        $this->assertChampionData($champions->getLulu());
        $this->assertChampionData($champions->getLux());
        $this->assertChampionData($champions->getMalphite());
        $this->assertChampionData($champions->getMalzahar());
        $this->assertChampionData($champions->getMaokai());
        $this->assertChampionData($champions->getMasterYi());
        $this->assertChampionData($champions->getMissFortune());
        $this->assertChampionData($champions->getMonkeyKing());
        $this->assertChampionData($champions->getMordekaiser());
        $this->assertChampionData($champions->getMorgana());
        $this->assertChampionData($champions->getNami());
        $this->assertChampionData($champions->getNasus());
        $this->assertChampionData($champions->getNautilus());
        $this->assertChampionData($champions->getNeeko());
        $this->assertChampionData($champions->getNidalee());
        $this->assertChampionData($champions->getNilah());
        $this->assertChampionData($champions->getNocturne());
        $this->assertChampionData($champions->getNunu());
        $this->assertChampionData($champions->getOlaf());
        $this->assertChampionData($champions->getOrianna());
        $this->assertChampionData($champions->getOrnn());
        $this->assertChampionData($champions->getPantheon());
        $this->assertChampionData($champions->getPoppy());
        $this->assertChampionData($champions->getPyke());
        $this->assertChampionData($champions->getQiyana());
        $this->assertChampionData($champions->getQuinn());
        $this->assertChampionData($champions->getRakan());
        $this->assertChampionData($champions->getRammus());
        $this->assertChampionData($champions->getRekSai());
        $this->assertChampionData($champions->getRell());
        $this->assertChampionData($champions->getRenata());
        $this->assertChampionData($champions->getRenekton());
        $this->assertChampionData($champions->getRengar());
        $this->assertChampionData($champions->getRiven());
        $this->assertChampionData($champions->getRumble());
        $this->assertChampionData($champions->getRyze());
        $this->assertChampionData($champions->getSamira());
        $this->assertChampionData($champions->getSejuani());
        $this->assertChampionData($champions->getSenna());
        $this->assertChampionData($champions->getSeraphine());
        $this->assertChampionData($champions->getSett());
        $this->assertChampionData($champions->getShaco());
        $this->assertChampionData($champions->getShen());
        $this->assertChampionData($champions->getShyvana());
        $this->assertChampionData($champions->getSinged());
        $this->assertChampionData($champions->getSion());
        $this->assertChampionData($champions->getSivir());
        $this->assertChampionData($champions->getSkarner());
        $this->assertChampionData($champions->getSona());
        $this->assertChampionData($champions->getSoraka());
        $this->assertChampionData($champions->getSwain());
        $this->assertChampionData($champions->getSylas());
        $this->assertChampionData($champions->getSyndra());
        $this->assertChampionData($champions->getTahmKench());
        $this->assertChampionData($champions->getTaliyah());
        $this->assertChampionData($champions->getTalon());
        $this->assertChampionData($champions->getTaric());
        $this->assertChampionData($champions->getTeemo());
        $this->assertChampionData($champions->getThresh());
        $this->assertChampionData($champions->getTristana());
        $this->assertChampionData($champions->getTrundle());
        $this->assertChampionData($champions->getTryndamere());
        $this->assertChampionData($champions->getTwistedFate());
        $this->assertChampionData($champions->getTwitch());
        $this->assertChampionData($champions->getUdyr());
        $this->assertChampionData($champions->getUrgot());
        $this->assertChampionData($champions->getVarus());
        $this->assertChampionData($champions->getVayne());
        $this->assertChampionData($champions->getVeigar());
        $this->assertChampionData($champions->getVelkoz());
        $this->assertChampionData($champions->getVex());
        $this->assertChampionData($champions->getVi());
        $this->assertChampionData($champions->getViego());
        $this->assertChampionData($champions->getViktor());
        $this->assertChampionData($champions->getVladimir());
        $this->assertChampionData($champions->getVolibear());
        $this->assertChampionData($champions->getWarwick());
        $this->assertChampionData($champions->getXayah());
        $this->assertChampionData($champions->getXerath());
        $this->assertChampionData($champions->getXinZhao());
        $this->assertChampionData($champions->getYasuo());
        $this->assertChampionData($champions->getYone());
        $this->assertChampionData($champions->getYorick());
        $this->assertChampionData($champions->getYuumi());
        $this->assertChampionData($champions->getZac());
        $this->assertChampionData($champions->getZed());
        $this->assertChampionData($champions->getZeri());
        $this->assertChampionData($champions->getZiggs());
        $this->assertChampionData($champions->getZilean());
        $this->assertChampionData($champions->getZoe());
        $this->assertChampionData($champions->getZyra());
    }

    /**
     * @dataProvider nameChampionProvider
     */
    public function testGetChampionArray($name)
    {
        $champion = $this->api->getChampion($name);
        $this->assertIsArray($champion);
    }
    /**
     * @dataProvider nameChampionProvider
     */
    public function testGetChampionObjet($name)
    {
        $champion = $this->api->getChampion($name, TypeReturn::RETURN_OBJET);
        $this->assertIsArray($champion);
        $this->assertInstanceOf(ChampionDetail::class, $champion[ucfirst($name)]);
        $this->assertChampionDetail($champion[ucfirst($name)]);
    }

    private function assertChampionDetail(ChampionDetail $championDetail)
    {
        $this->assertIsString($championDetail->getId());
        $this->assertIsInt($championDetail->getKey());
        $this->assertIsString($championDetail->getName());
        $this->assertIsString($championDetail->getTitle());
        $this->assertImage($championDetail->getImage());
        foreach ($championDetail->getSkins() as $skin) {
            $this->assertSkin($skin);
        }
        $this->assertIsString($championDetail->getLore());
        $this->assertIsString($championDetail->getBlurb());
        $this->assertIsArray($championDetail->getAllytips());
        $this->assertIsArray($championDetail->getEnemytips());
        $this->assertIsArray($championDetail->getTags());
        $this->assertIsString($championDetail->getPartype());
        $this->assertInfo($championDetail->getInfo());
        $this->assertStats($championDetail->getStats());
        foreach ($championDetail->getSpells() as $spell) {
            $this->assertSpell($spell);
        }
        $this->assertPassive($championDetail->getPassive());
    }

    private function assertSkin(Skin $skin)
    {
        $this->assertIsString($skin->getId());
        $this->assertIsInt($skin->getNum());
        $this->assertIsString($skin->getName());
        $this->assertIsBool($skin->isChromas());
    }

    private function assertSpell(Spell $spell)
    {
        $this->assertIsString($spell->getId());
        $this->assertIsString($spell->getName());
        $this->assertIsString($spell->getDescription());
        $this->assertIsString($spell->getTooltip());
        $this->assertLevelTip($spell->getLeveltip());
        $this->assertIsInt($spell->getMaxrank());
        $this->assertIsArray($spell->getCooldown());
        $this->assertIsString($spell->getCooldownBurn());
        $this->assertIsArray($spell->getCost());
        $this->assertIsString($spell->getCostBurn());
        $this->assertIsArray($spell->getDatavalues());
        $this->assertIsArray($spell->getEffect());
        $this->assertIsArray($spell->getEffectBurn());
        $this->assertIsArray($spell->getVars());
        $this->assertIsString($spell->getCostType());
        $this->assertIsString($spell->getMaxammo());
        $this->assertIsArray($spell->getRange());
        $this->assertIsString($spell->getRangeBurn());
        $this->assertImage($spell->getImage());
        $this->assertIsString($spell->getResource());
    }

    private function assertLevelTip(Leveltip $leveltip)
    {
        $this->assertIsArray($leveltip->getLabel());
        $this->assertIsArray($leveltip->getEffect());
    }

    private function assertPassive(Passive $passive)
    {
        $this->assertIsString($passive->getName());
        $this->assertIsString($passive->getDescription());
        $this->assertImage($passive->getImage());
    }


    public function nameChampionProvider()
    {
        return [
            "Aatrox with capitalization" => ["Aatrox"],
            "garen without capitalization" => ["garen"],
            "Lux with capitalization" => ["Lux"],
            "Qiyana without capitalization" => ["qiyana"],
            "TwistedFate with capitalization" => ["TwistedFate"],
        ];
    }


    private function assertChampionData(ChampionData $champion)
    {
        $this->assertIsString($champion->getVersion());
        $this->assertIsString($champion->getId());
        $this->assertIsInt($champion->getKey());
        $this->assertIsString($champion->getName());
        $this->assertIsString($champion->getTitle());
        $this->assertIsString($champion->getBlurb());
        $this->assertInfo($champion->getInfo());
        $this->assertImage($champion->getImage());
        $this->assertIsArray($champion->getTags());
        $this->assertIsString($champion->getPartype());
        $this->assertStats($champion->getStats());
    }

    private function assertInfo(Info $info)
    {
        $this->assertIsInt($info->getAttack());
        $this->assertIsInt($info->getDefense());
        $this->assertIsInt($info->getMagic());
        $this->assertIsInt($info->getDifficulty());
    }

    private function assertStats(Stats $stats)
    {
        $this->assertIsInt($stats->getHp());
        $this->assertIsInt($stats->getHpperlevel());
        $this->assertIsNumeric($stats->getMp());
        $this->assertIsNumeric($stats->getMpperlevel());
        $this->assertIsInt($stats->getMovespeed());
        $this->assertIsInt($stats->getArmor());
        $this->assertIsNumeric($stats->getArmorperlevel());
        $this->assertIsInt($stats->getSpellblock());
        $this->assertIsFloat($stats->getSpellblockperlevel());
        $this->assertIsInt($stats->getAttackrange());
        $this->assertIsNumeric($stats->getHpregen());
        $this->assertIsNumeric($stats->getHpregenperlevel());
        $this->assertIsNumeric($stats->getMpregen());
        $this->assertIsNumeric($stats->getMpregenperlevel());
        $this->assertIsInt($stats->getCrit());
        $this->assertIsInt($stats->getCritperlevel());
        $this->assertIsInt($stats->getAttackdamage());
        $this->assertIsNumeric($stats->getAttackdamageperlevel());
        $this->assertIsNumeric($stats->getAttackspeedperlevel());
        $this->assertIsFloat($stats->getAttackspeed());
    }
}
