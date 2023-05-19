<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model\Champion;

class Champions
{
    private ?ChampionData $Aatrox = null;
    private ?ChampionData $Ahri = null;
    private ?ChampionData $Akali = null;
    private ?ChampionData $Akshan = null;
    private ?ChampionData $Alistar = null;
    private ?ChampionData $Amumu = null;
    private ?ChampionData $Anivia = null;
    private ?ChampionData $Annie = null;
    private ?ChampionData $Aphelios = null;
    private ?ChampionData $Ashe = null;
    private ?ChampionData $AurelionSol = null;
    private ?ChampionData $Azir = null;
    private ?ChampionData $Bard = null;
    private ?ChampionData $Belveth = null;
    private ?ChampionData $Blitzcrank = null;
    private ?ChampionData $Brand = null;
    private ?ChampionData $Braum = null;
    private ?ChampionData $Caitlyn = null;
    private ?ChampionData $Camille = null;
    private ?ChampionData $Cassiopeia = null;
    private ?ChampionData $Chogath = null;
    private ?ChampionData $Corki = null;
    private ?ChampionData $Darius = null;
    private ?ChampionData $Diana = null;
    private ?ChampionData $Draven = null;
    private ?ChampionData $DrMundo = null;
    private ?ChampionData $Ekko = null;
    private ?ChampionData $Elise = null;
    private ?ChampionData $Evelynn = null;
    private ?ChampionData $Ezreal = null;
    private ?ChampionData $Fiddlesticks = null;
    private ?ChampionData $Fiora = null;
    private ?ChampionData $Fizz = null;
    private ?ChampionData $Galio = null;
    private ?ChampionData $Gangplank = null;
    private ?ChampionData $Garen = null;
    private ?ChampionData $Gnar = null;
    private ?ChampionData $Gragas = null;
    private ?ChampionData $Graves = null;
    private ?ChampionData $Gwen = null;
    private ?ChampionData $Hecarim = null;
    private ?ChampionData $Heimerdinger = null;
    private ?ChampionData $Illaoi = null;
    private ?ChampionData $Irelia = null;
    private ?ChampionData $Ivern = null;
    private ?ChampionData $Janna = null;
    private ?ChampionData $JarvanIV = null;
    private ?ChampionData $Jax = null;
    private ?ChampionData $Jayce = null;
    private ?ChampionData $Jhin = null;
    private ?ChampionData $Jinx = null;
    private ?ChampionData $Kaisa = null;
    private ?ChampionData $Kalista = null;
    private ?ChampionData $Karma = null;
    private ?ChampionData $Karthus = null;
    private ?ChampionData $Kassadin = null;
    private ?ChampionData $Katarina = null;
    private ?ChampionData $Kayle = null;
    private ?ChampionData $Kayn = null;
    private ?ChampionData $Kennen = null;
    private ?ChampionData $Khazix = null;
    private ?ChampionData $Kindred = null;
    private ?ChampionData $Kled = null;
    private ?ChampionData $KogMaw = null;
    private ?ChampionData $KSante = null;
    private ?ChampionData $Leblanc = null;
    private ?ChampionData $LeeSin = null;
    private ?ChampionData $Leona = null;
    private ?ChampionData $Lillia = null;
    private ?ChampionData $Lissandra = null;
    private ?ChampionData $Lucian = null;
    private ?ChampionData $Lulu = null;
    private ?ChampionData $Lux = null;
    private ?ChampionData $Malphite = null;
    private ?ChampionData $Malzahar = null;
    private ?ChampionData $Maokai = null;
    private ?ChampionData $MasterYi = null;
    private ?ChampionData $MissFortune = null;
    private ?ChampionData $MonkeyKing = null;
    private ?ChampionData $Mordekaiser = null;
    private ?ChampionData $Morgana = null;
    private ?ChampionData $Nami = null;
    private ?ChampionData $Nasus = null;
    private ?ChampionData $Nautilus = null;
    private ?ChampionData $Neeko = null;
    private ?ChampionData $Nidalee = null;
    private ?ChampionData $Nilah = null;
    private ?ChampionData $Nocturne = null;
    private ?ChampionData $Nunu = null;
    private ?ChampionData $Olaf = null;
    private ?ChampionData $Orianna = null;
    private ?ChampionData $Ornn = null;
    private ?ChampionData $Pantheon = null;
    private ?ChampionData $Poppy = null;
    private ?ChampionData $Pyke = null;
    private ?ChampionData $Qiyana = null;
    private ?ChampionData $Quinn = null;
    private ?ChampionData $Rakan = null;
    private ?ChampionData $Rammus = null;
    private ?ChampionData $RekSai = null;
    private ?ChampionData $Rell = null;
    private ?ChampionData $Renata = null;
    private ?ChampionData $Renekton = null;
    private ?ChampionData $Rengar = null;
    private ?ChampionData $Riven = null;
    private ?ChampionData $Rumble = null;
    private ?ChampionData $Ryze = null;
    private ?ChampionData $Samira = null;
    private ?ChampionData $Sejuani = null;
    private ?ChampionData $Senna = null;
    private ?ChampionData $Seraphine = null;
    private ?ChampionData $Sett = null;
    private ?ChampionData $Shaco = null;
    private ?ChampionData $Shen = null;
    private ?ChampionData $Shyvana = null;
    private ?ChampionData $Singed = null;
    private ?ChampionData $Sion = null;
    private ?ChampionData $Sivir = null;
    private ?ChampionData $Skarner = null;
    private ?ChampionData $Sona = null;
    private ?ChampionData $Soraka = null;
    private ?ChampionData $Swain = null;
    private ?ChampionData $Sylas = null;
    private ?ChampionData $Syndra = null;
    private ?ChampionData $TahmKench = null;
    private ?ChampionData $Taliyah = null;
    private ?ChampionData $Talon = null;
    private ?ChampionData $Taric = null;
    private ?ChampionData $Teemo = null;
    private ?ChampionData $Thresh = null;
    private ?ChampionData $Tristana = null;
    private ?ChampionData $Trundle = null;
    private ?ChampionData $Tryndamere = null;
    private ?ChampionData $TwistedFate = null;
    private ?ChampionData $Twitch = null;
    private ?ChampionData $Udyr = null;
    private ?ChampionData $Urgot = null;
    private ?ChampionData $Varus = null;
    private ?ChampionData $Vayne = null;
    private ?ChampionData $Veigar = null;
    private ?ChampionData $Velkoz = null;
    private ?ChampionData $Vex = null;
    private ?ChampionData $Vi = null;
    private ?ChampionData $Viego = null;
    private ?ChampionData $Viktor = null;
    private ?ChampionData $Vladimir = null;
    private ?ChampionData $Volibear = null;
    private ?ChampionData $Warwick = null;
    private ?ChampionData $Xayah = null;
    private ?ChampionData $Xerath = null;
    private ?ChampionData $XinZhao = null;
    private ?ChampionData $Yasuo = null;
    private ?ChampionData $Yone = null;
    private ?ChampionData $Yorick = null;
    private ?ChampionData $Yuumi = null;
    private ?ChampionData $Zac = null;
    private ?ChampionData $Zed = null;
    private ?ChampionData $Zeri = null;
    private ?ChampionData $Ziggs = null;
    private ?ChampionData $Zilean = null;
    private ?ChampionData $Zoe = null;
    private ?ChampionData $Zyra = null;

    public function getAatrox(): ?ChampionData
    {
        return $this->Aatrox;
    }

    public function setAatrox(?ChampionData $Aatrox): void
    {
        $this->Aatrox = $Aatrox;
    }

    public function getAhri(): ?ChampionData
    {
        return $this->Ahri;
    }

    public function setAhri(?ChampionData $Ahri): void
    {
        $this->Ahri = $Ahri;
    }

    public function getAkali(): ?ChampionData
    {
        return $this->Akali;
    }

    public function setAkali(?ChampionData $Akali): void
    {
        $this->Akali = $Akali;
    }

    public function getAkshan(): ?ChampionData
    {
        return $this->Akshan;
    }

    public function setAkshan(?ChampionData $Akshan): void
    {
        $this->Akshan = $Akshan;
    }

    public function getAlistar(): ?ChampionData
    {
        return $this->Alistar;
    }

    public function setAlistar(?ChampionData $Alistar): void
    {
        $this->Alistar = $Alistar;
    }

    public function getAmumu(): ?ChampionData
    {
        return $this->Amumu;
    }

    public function setAmumu(?ChampionData $Amumu): void
    {
        $this->Amumu = $Amumu;
    }

    public function getAnivia(): ?ChampionData
    {
        return $this->Anivia;
    }

    public function setAnivia(?ChampionData $Anivia): void
    {
        $this->Anivia = $Anivia;
    }

    public function getAnnie(): ?ChampionData
    {
        return $this->Annie;
    }

    public function setAnnie(?ChampionData $Annie): void
    {
        $this->Annie = $Annie;
    }

    public function getAphelios(): ?ChampionData
    {
        return $this->Aphelios;
    }

    public function setAphelios(?ChampionData $Aphelios): void
    {
        $this->Aphelios = $Aphelios;
    }

    public function getAshe(): ?ChampionData
    {
        return $this->Ashe;
    }

    public function setAshe(?ChampionData $Ashe): void
    {
        $this->Ashe = $Ashe;
    }

    public function getAurelionSol(): ?ChampionData
    {
        return $this->AurelionSol;
    }

    public function setAurelionSol(?ChampionData $AurelionSol): void
    {
        $this->AurelionSol = $AurelionSol;
    }

    public function getAzir(): ?ChampionData
    {
        return $this->Azir;
    }

    public function setAzir(?ChampionData $Azir): void
    {
        $this->Azir = $Azir;
    }

    public function getBard(): ?ChampionData
    {
        return $this->Bard;
    }

    public function setBard(?ChampionData $Bard): void
    {
        $this->Bard = $Bard;
    }

    public function getBelveth(): ?ChampionData
    {
        return $this->Belveth;
    }

    public function setBelveth(?ChampionData $Belveth): void
    {
        $this->Belveth = $Belveth;
    }

    public function getBlitzcrank(): ?ChampionData
    {
        return $this->Blitzcrank;
    }

    public function setBlitzcrank(?ChampionData $Blitzcrank): void
    {
        $this->Blitzcrank = $Blitzcrank;
    }

    public function getBrand(): ?ChampionData
    {
        return $this->Brand;
    }

    public function setBrand(?ChampionData $Brand): void
    {
        $this->Brand = $Brand;
    }

    public function getBraum(): ?ChampionData
    {
        return $this->Braum;
    }

    public function setBraum(?ChampionData $Braum): void
    {
        $this->Braum = $Braum;
    }

    public function getCaitlyn(): ?ChampionData
    {
        return $this->Caitlyn;
    }

    public function setCaitlyn(?ChampionData $Caitlyn): void
    {
        $this->Caitlyn = $Caitlyn;
    }

    public function getCamille(): ?ChampionData
    {
        return $this->Camille;
    }

    public function setCamille(?ChampionData $Camille): void
    {
        $this->Camille = $Camille;
    }

    public function getCassiopeia(): ?ChampionData
    {
        return $this->Cassiopeia;
    }

    public function setCassiopeia(?ChampionData $Cassiopeia): void
    {
        $this->Cassiopeia = $Cassiopeia;
    }

    public function getChogath(): ?ChampionData
    {
        return $this->Chogath;
    }

    public function setChogath(?ChampionData $Chogath): void
    {
        $this->Chogath = $Chogath;
    }

    public function getCorki(): ?ChampionData
    {
        return $this->Corki;
    }

    public function setCorki(?ChampionData $Corki): void
    {
        $this->Corki = $Corki;
    }

    public function getDarius(): ?ChampionData
    {
        return $this->Darius;
    }

    public function setDarius(?ChampionData $Darius): void
    {
        $this->Darius = $Darius;
    }

    public function getDiana(): ?ChampionData
    {
        return $this->Diana;
    }

    public function setDiana(?ChampionData $Diana): void
    {
        $this->Diana = $Diana;
    }

    public function getDraven(): ?ChampionData
    {
        return $this->Draven;
    }

    public function setDraven(?ChampionData $Draven): void
    {
        $this->Draven = $Draven;
    }

    public function getDrMundo(): ?ChampionData
    {
        return $this->DrMundo;
    }

    public function setDrMundo(?ChampionData $DrMundo): void
    {
        $this->DrMundo = $DrMundo;
    }

    public function getEkko(): ?ChampionData
    {
        return $this->Ekko;
    }

    public function setEkko(?ChampionData $Ekko): void
    {
        $this->Ekko = $Ekko;
    }

    public function getElise(): ?ChampionData
    {
        return $this->Elise;
    }

    public function setElise(?ChampionData $Elise): void
    {
        $this->Elise = $Elise;
    }

    public function getEvelynn(): ?ChampionData
    {
        return $this->Evelynn;
    }

    public function setEvelynn(?ChampionData $Evelynn): void
    {
        $this->Evelynn = $Evelynn;
    }

    public function getEzreal(): ?ChampionData
    {
        return $this->Ezreal;
    }

    public function setEzreal(?ChampionData $Ezreal): void
    {
        $this->Ezreal = $Ezreal;
    }

    public function getFiddlesticks(): ?ChampionData
    {
        return $this->Fiddlesticks;
    }

    public function setFiddlesticks(?ChampionData $Fiddlesticks): void
    {
        $this->Fiddlesticks = $Fiddlesticks;
    }

    public function getFiora(): ?ChampionData
    {
        return $this->Fiora;
    }

    public function setFiora(?ChampionData $Fiora): void
    {
        $this->Fiora = $Fiora;
    }

    public function getFizz(): ?ChampionData
    {
        return $this->Fizz;
    }

    public function setFizz(?ChampionData $Fizz): void
    {
        $this->Fizz = $Fizz;
    }

    public function getGalio(): ?ChampionData
    {
        return $this->Galio;
    }

    public function setGalio(?ChampionData $Galio): void
    {
        $this->Galio = $Galio;
    }

    public function getGangplank(): ?ChampionData
    {
        return $this->Gangplank;
    }

    public function setGangplank(?ChampionData $Gangplank): void
    {
        $this->Gangplank = $Gangplank;
    }

    public function getGaren(): ?ChampionData
    {
        return $this->Garen;
    }

    public function setGaren(?ChampionData $Garen): void
    {
        $this->Garen = $Garen;
    }

    public function getGnar(): ?ChampionData
    {
        return $this->Gnar;
    }

    public function setGnar(?ChampionData $Gnar): void
    {
        $this->Gnar = $Gnar;
    }

    public function getGragas(): ?ChampionData
    {
        return $this->Gragas;
    }

    public function setGragas(?ChampionData $Gragas): void
    {
        $this->Gragas = $Gragas;
    }

    public function getGraves(): ?ChampionData
    {
        return $this->Graves;
    }

    public function setGraves(?ChampionData $Graves): void
    {
        $this->Graves = $Graves;
    }

    public function getGwen(): ?ChampionData
    {
        return $this->Gwen;
    }

    public function setGwen(?ChampionData $Gwen): void
    {
        $this->Gwen = $Gwen;
    }

    public function getHecarim(): ?ChampionData
    {
        return $this->Hecarim;
    }

    public function setHecarim(?ChampionData $Hecarim): void
    {
        $this->Hecarim = $Hecarim;
    }

    public function getHeimerdinger(): ?ChampionData
    {
        return $this->Heimerdinger;
    }

    public function setHeimerdinger(?ChampionData $Heimerdinger): void
    {
        $this->Heimerdinger = $Heimerdinger;
    }

    public function getIllaoi(): ?ChampionData
    {
        return $this->Illaoi;
    }

    public function setIllaoi(?ChampionData $Illaoi): void
    {
        $this->Illaoi = $Illaoi;
    }

    public function getIrelia(): ?ChampionData
    {
        return $this->Irelia;
    }

    public function setIrelia(?ChampionData $Irelia): void
    {
        $this->Irelia = $Irelia;
    }

    public function getIvern(): ?ChampionData
    {
        return $this->Ivern;
    }

    public function setIvern(?ChampionData $Ivern): void
    {
        $this->Ivern = $Ivern;
    }

    public function getJanna(): ?ChampionData
    {
        return $this->Janna;
    }

    public function setJanna(?ChampionData $Janna): void
    {
        $this->Janna = $Janna;
    }

    public function getJarvanIV(): ?ChampionData
    {
        return $this->JarvanIV;
    }

    public function setJarvanIV(?ChampionData $JarvanIV): void
    {
        $this->JarvanIV = $JarvanIV;
    }

    public function getJax(): ?ChampionData
    {
        return $this->Jax;
    }

    public function setJax(?ChampionData $Jax): void
    {
        $this->Jax = $Jax;
    }

    public function getJayce(): ?ChampionData
    {
        return $this->Jayce;
    }

    public function setJayce(?ChampionData $Jayce): void
    {
        $this->Jayce = $Jayce;
    }

    public function getJhin(): ?ChampionData
    {
        return $this->Jhin;
    }

    public function setJhin(?ChampionData $Jhin): void
    {
        $this->Jhin = $Jhin;
    }

    public function getJinx(): ?ChampionData
    {
        return $this->Jinx;
    }

    public function setJinx(?ChampionData $Jinx): void
    {
        $this->Jinx = $Jinx;
    }

    public function getKaisa(): ?ChampionData
    {
        return $this->Kaisa;
    }

    public function setKaisa(?ChampionData $Kaisa): void
    {
        $this->Kaisa = $Kaisa;
    }

    public function getKalista(): ?ChampionData
    {
        return $this->Kalista;
    }

    public function setKalista(?ChampionData $Kalista): void
    {
        $this->Kalista = $Kalista;
    }

    public function getKarma(): ?ChampionData
    {
        return $this->Karma;
    }

    public function setKarma(?ChampionData $Karma): void
    {
        $this->Karma = $Karma;
    }

    public function getKarthus(): ?ChampionData
    {
        return $this->Karthus;
    }

    public function setKarthus(?ChampionData $Karthus): void
    {
        $this->Karthus = $Karthus;
    }

    public function getKassadin(): ?ChampionData
    {
        return $this->Kassadin;
    }

    public function setKassadin(?ChampionData $Kassadin): void
    {
        $this->Kassadin = $Kassadin;
    }

    public function getKatarina(): ?ChampionData
    {
        return $this->Katarina;
    }

    public function setKatarina(?ChampionData $Katarina): void
    {
        $this->Katarina = $Katarina;
    }

    public function getKayle(): ?ChampionData
    {
        return $this->Kayle;
    }

    public function setKayle(?ChampionData $Kayle): void
    {
        $this->Kayle = $Kayle;
    }

    public function getKayn(): ?ChampionData
    {
        return $this->Kayn;
    }

    public function setKayn(?ChampionData $Kayn): void
    {
        $this->Kayn = $Kayn;
    }

    public function getKennen(): ?ChampionData
    {
        return $this->Kennen;
    }

    public function setKennen(?ChampionData $Kennen): void
    {
        $this->Kennen = $Kennen;
    }

    public function getKhazix(): ?ChampionData
    {
        return $this->Khazix;
    }

    public function setKhazix(?ChampionData $Khazix): void
    {
        $this->Khazix = $Khazix;
    }

    public function getKindred(): ?ChampionData
    {
        return $this->Kindred;
    }

    public function setKindred(?ChampionData $Kindred): void
    {
        $this->Kindred = $Kindred;
    }

    public function getKled(): ?ChampionData
    {
        return $this->Kled;
    }

    public function setKled(?ChampionData $Kled): void
    {
        $this->Kled = $Kled;
    }

    public function getKogMaw(): ?ChampionData
    {
        return $this->KogMaw;
    }

    public function setKogMaw(?ChampionData $KogMaw): void
    {
        $this->KogMaw = $KogMaw;
    }

    public function getKSante(): ?ChampionData
    {
        return $this->KSante;
    }

    public function setKSante(?ChampionData $KSante): void
    {
        $this->KSante = $KSante;
    }

    public function getLeblanc(): ?ChampionData
    {
        return $this->Leblanc;
    }

    public function setLeblanc(?ChampionData $Leblanc): void
    {
        $this->Leblanc = $Leblanc;
    }

    public function getLeeSin(): ?ChampionData
    {
        return $this->LeeSin;
    }

    public function setLeeSin(?ChampionData $LeeSin): void
    {
        $this->LeeSin = $LeeSin;
    }

    public function getLeona(): ?ChampionData
    {
        return $this->Leona;
    }

    public function setLeona(?ChampionData $Leona): void
    {
        $this->Leona = $Leona;
    }

    public function getLillia(): ?ChampionData
    {
        return $this->Lillia;
    }

    public function setLillia(?ChampionData $Lillia): void
    {
        $this->Lillia = $Lillia;
    }

    public function getLissandra(): ?ChampionData
    {
        return $this->Lissandra;
    }

    public function setLissandra(?ChampionData $Lissandra): void
    {
        $this->Lissandra = $Lissandra;
    }

    public function getLucian(): ?ChampionData
    {
        return $this->Lucian;
    }

    public function setLucian(?ChampionData $Lucian): void
    {
        $this->Lucian = $Lucian;
    }

    public function getLulu(): ?ChampionData
    {
        return $this->Lulu;
    }

    public function setLulu(?ChampionData $Lulu): void
    {
        $this->Lulu = $Lulu;
    }

    public function getLux(): ?ChampionData
    {
        return $this->Lux;
    }

    public function setLux(?ChampionData $Lux): void
    {
        $this->Lux = $Lux;
    }

    public function getMalphite(): ?ChampionData
    {
        return $this->Malphite;
    }

    public function setMalphite(?ChampionData $Malphite): void
    {
        $this->Malphite = $Malphite;
    }

    public function getMalzahar(): ?ChampionData
    {
        return $this->Malzahar;
    }

    public function setMalzahar(?ChampionData $Malzahar): void
    {
        $this->Malzahar = $Malzahar;
    }

    public function getMaokai(): ?ChampionData
    {
        return $this->Maokai;
    }

    public function setMaokai(?ChampionData $Maokai): void
    {
        $this->Maokai = $Maokai;
    }

    public function getMasterYi(): ?ChampionData
    {
        return $this->MasterYi;
    }

    public function setMasterYi(?ChampionData $MasterYi): void
    {
        $this->MasterYi = $MasterYi;
    }

    public function getMissFortune(): ?ChampionData
    {
        return $this->MissFortune;
    }

    public function setMissFortune(?ChampionData $MissFortune): void
    {
        $this->MissFortune = $MissFortune;
    }

    public function getMonkeyKing(): ?ChampionData
    {
        return $this->MonkeyKing;
    }

    public function setMonkeyKing(?ChampionData $MonkeyKing): void
    {
        $this->MonkeyKing = $MonkeyKing;
    }

    public function getMordekaiser(): ?ChampionData
    {
        return $this->Mordekaiser;
    }

    public function setMordekaiser(?ChampionData $Mordekaiser): void
    {
        $this->Mordekaiser = $Mordekaiser;
    }

    public function getMorgana(): ?ChampionData
    {
        return $this->Morgana;
    }

    public function setMorgana(?ChampionData $Morgana): void
    {
        $this->Morgana = $Morgana;
    }

    public function getNami(): ?ChampionData
    {
        return $this->Nami;
    }

    public function setNami(?ChampionData $Nami): void
    {
        $this->Nami = $Nami;
    }

    public function getNasus(): ?ChampionData
    {
        return $this->Nasus;
    }

    public function setNasus(?ChampionData $Nasus): void
    {
        $this->Nasus = $Nasus;
    }

    public function getNautilus(): ?ChampionData
    {
        return $this->Nautilus;
    }

    public function setNautilus(?ChampionData $Nautilus): void
    {
        $this->Nautilus = $Nautilus;
    }

    public function getNeeko(): ?ChampionData
    {
        return $this->Neeko;
    }

    public function setNeeko(?ChampionData $Neeko): void
    {
        $this->Neeko = $Neeko;
    }

    public function getNidalee(): ?ChampionData
    {
        return $this->Nidalee;
    }

    public function setNidalee(?ChampionData $Nidalee): void
    {
        $this->Nidalee = $Nidalee;
    }

    public function getNilah(): ?ChampionData
    {
        return $this->Nilah;
    }

    public function setNilah(?ChampionData $Nilah): void
    {
        $this->Nilah = $Nilah;
    }

    public function getNocturne(): ?ChampionData
    {
        return $this->Nocturne;
    }

    public function setNocturne(?ChampionData $Nocturne): void
    {
        $this->Nocturne = $Nocturne;
    }

    public function getNunu(): ?ChampionData
    {
        return $this->Nunu;
    }

    public function setNunu(?ChampionData $Nunu): void
    {
        $this->Nunu = $Nunu;
    }

    public function getOlaf(): ?ChampionData
    {
        return $this->Olaf;
    }

    public function setOlaf(?ChampionData $Olaf): void
    {
        $this->Olaf = $Olaf;
    }

    public function getOrianna(): ?ChampionData
    {
        return $this->Orianna;
    }

    public function setOrianna(?ChampionData $Orianna): void
    {
        $this->Orianna = $Orianna;
    }

    public function getOrnn(): ?ChampionData
    {
        return $this->Ornn;
    }

    public function setOrnn(?ChampionData $Ornn): void
    {
        $this->Ornn = $Ornn;
    }

    public function getPantheon(): ?ChampionData
    {
        return $this->Pantheon;
    }

    public function setPantheon(?ChampionData $Pantheon): void
    {
        $this->Pantheon = $Pantheon;
    }

    public function getPoppy(): ?ChampionData
    {
        return $this->Poppy;
    }

    public function setPoppy(?ChampionData $Poppy): void
    {
        $this->Poppy = $Poppy;
    }

    public function getPyke(): ?ChampionData
    {
        return $this->Pyke;
    }

    public function setPyke(?ChampionData $Pyke): void
    {
        $this->Pyke = $Pyke;
    }

    public function getQiyana(): ?ChampionData
    {
        return $this->Qiyana;
    }

    public function setQiyana(?ChampionData $Qiyana): void
    {
        $this->Qiyana = $Qiyana;
    }

    public function getQuinn(): ?ChampionData
    {
        return $this->Quinn;
    }

    public function setQuinn(?ChampionData $Quinn): void
    {
        $this->Quinn = $Quinn;
    }

    public function getRakan(): ?ChampionData
    {
        return $this->Rakan;
    }

    public function setRakan(?ChampionData $Rakan): void
    {
        $this->Rakan = $Rakan;
    }

    public function getRammus(): ?ChampionData
    {
        return $this->Rammus;
    }

    public function setRammus(?ChampionData $Rammus): void
    {
        $this->Rammus = $Rammus;
    }

    public function getRekSai(): ?ChampionData
    {
        return $this->RekSai;
    }

    public function setRekSai(?ChampionData $RekSai): void
    {
        $this->RekSai = $RekSai;
    }

    public function getRell(): ?ChampionData
    {
        return $this->Rell;
    }

    public function setRell(?ChampionData $Rell): void
    {
        $this->Rell = $Rell;
    }

    public function getRenata(): ?ChampionData
    {
        return $this->Renata;
    }

    public function setRenata(?ChampionData $Renata): void
    {
        $this->Renata = $Renata;
    }

    public function getRenekton(): ?ChampionData
    {
        return $this->Renekton;
    }

    public function setRenekton(?ChampionData $Renekton): void
    {
        $this->Renekton = $Renekton;
    }

    public function getRengar(): ?ChampionData
    {
        return $this->Rengar;
    }

    public function setRengar(?ChampionData $Rengar): void
    {
        $this->Rengar = $Rengar;
    }

    public function getRiven(): ?ChampionData
    {
        return $this->Riven;
    }

    public function setRiven(?ChampionData $Riven): void
    {
        $this->Riven = $Riven;
    }

    public function getRumble(): ?ChampionData
    {
        return $this->Rumble;
    }

    public function setRumble(?ChampionData $Rumble): void
    {
        $this->Rumble = $Rumble;
    }

    public function getRyze(): ?ChampionData
    {
        return $this->Ryze;
    }

    public function setRyze(?ChampionData $Ryze): void
    {
        $this->Ryze = $Ryze;
    }

    public function getSamira(): ?ChampionData
    {
        return $this->Samira;
    }

    public function setSamira(?ChampionData $Samira): void
    {
        $this->Samira = $Samira;
    }

    public function getSejuani(): ?ChampionData
    {
        return $this->Sejuani;
    }

    public function setSejuani(?ChampionData $Sejuani): void
    {
        $this->Sejuani = $Sejuani;
    }

    public function getSenna(): ?ChampionData
    {
        return $this->Senna;
    }

    public function setSenna(?ChampionData $Senna): void
    {
        $this->Senna = $Senna;
    }

    public function getSeraphine(): ?ChampionData
    {
        return $this->Seraphine;
    }

    public function setSeraphine(?ChampionData $Seraphine): void
    {
        $this->Seraphine = $Seraphine;
    }

    public function getSett(): ?ChampionData
    {
        return $this->Sett;
    }

    public function setSett(?ChampionData $Sett): void
    {
        $this->Sett = $Sett;
    }

    public function getShaco(): ?ChampionData
    {
        return $this->Shaco;
    }

    public function setShaco(?ChampionData $Shaco): void
    {
        $this->Shaco = $Shaco;
    }

    public function getShen(): ?ChampionData
    {
        return $this->Shen;
    }

    public function setShen(?ChampionData $Shen): void
    {
        $this->Shen = $Shen;
    }

    public function getShyvana(): ?ChampionData
    {
        return $this->Shyvana;
    }

    public function setShyvana(?ChampionData $Shyvana): void
    {
        $this->Shyvana = $Shyvana;
    }

    public function getSinged(): ?ChampionData
    {
        return $this->Singed;
    }

    public function setSinged(?ChampionData $Singed): void
    {
        $this->Singed = $Singed;
    }

    public function getSion(): ?ChampionData
    {
        return $this->Sion;
    }

    public function setSion(?ChampionData $Sion): void
    {
        $this->Sion = $Sion;
    }

    public function getSivir(): ?ChampionData
    {
        return $this->Sivir;
    }

    public function setSivir(?ChampionData $Sivir): void
    {
        $this->Sivir = $Sivir;
    }

    public function getSkarner(): ?ChampionData
    {
        return $this->Skarner;
    }

    public function setSkarner(?ChampionData $Skarner): void
    {
        $this->Skarner = $Skarner;
    }

    public function getSona(): ?ChampionData
    {
        return $this->Sona;
    }

    public function setSona(?ChampionData $Sona): void
    {
        $this->Sona = $Sona;
    }

    public function getSoraka(): ?ChampionData
    {
        return $this->Soraka;
    }

    public function setSoraka(?ChampionData $Soraka): void
    {
        $this->Soraka = $Soraka;
    }

    public function getSwain(): ?ChampionData
    {
        return $this->Swain;
    }

    public function setSwain(?ChampionData $Swain): void
    {
        $this->Swain = $Swain;
    }

    public function getSylas(): ?ChampionData
    {
        return $this->Sylas;
    }

    public function setSylas(?ChampionData $Sylas): void
    {
        $this->Sylas = $Sylas;
    }

    public function getSyndra(): ?ChampionData
    {
        return $this->Syndra;
    }

    public function setSyndra(?ChampionData $Syndra): void
    {
        $this->Syndra = $Syndra;
    }

    public function getTahmKench(): ?ChampionData
    {
        return $this->TahmKench;
    }

    public function setTahmKench(?ChampionData $TahmKench): void
    {
        $this->TahmKench = $TahmKench;
    }

    public function getTaliyah(): ?ChampionData
    {
        return $this->Taliyah;
    }

    public function setTaliyah(?ChampionData $Taliyah): void
    {
        $this->Taliyah = $Taliyah;
    }

    public function getTalon(): ?ChampionData
    {
        return $this->Talon;
    }

    public function setTalon(?ChampionData $Talon): void
    {
        $this->Talon = $Talon;
    }

    public function getTaric(): ?ChampionData
    {
        return $this->Taric;
    }

    public function setTaric(?ChampionData $Taric): void
    {
        $this->Taric = $Taric;
    }

    public function getTeemo(): ?ChampionData
    {
        return $this->Teemo;
    }

    public function setTeemo(?ChampionData $Teemo): void
    {
        $this->Teemo = $Teemo;
    }

    public function getThresh(): ?ChampionData
    {
        return $this->Thresh;
    }

    public function setThresh(?ChampionData $Thresh): void
    {
        $this->Thresh = $Thresh;
    }

    public function getTristana(): ?ChampionData
    {
        return $this->Tristana;
    }

    public function setTristana(?ChampionData $Tristana): void
    {
        $this->Tristana = $Tristana;
    }

    public function getTrundle(): ?ChampionData
    {
        return $this->Trundle;
    }

    public function setTrundle(?ChampionData $Trundle): void
    {
        $this->Trundle = $Trundle;
    }

    public function getTryndamere(): ?ChampionData
    {
        return $this->Tryndamere;
    }

    public function setTryndamere(?ChampionData $Tryndamere): void
    {
        $this->Tryndamere = $Tryndamere;
    }

    public function getTwistedFate(): ?ChampionData
    {
        return $this->TwistedFate;
    }

    public function setTwistedFate(?ChampionData $TwistedFate): void
    {
        $this->TwistedFate = $TwistedFate;
    }

    public function getTwitch(): ?ChampionData
    {
        return $this->Twitch;
    }

    public function setTwitch(?ChampionData $Twitch): void
    {
        $this->Twitch = $Twitch;
    }

    public function getUdyr(): ?ChampionData
    {
        return $this->Udyr;
    }

    public function setUdyr(?ChampionData $Udyr): void
    {
        $this->Udyr = $Udyr;
    }

    public function getUrgot(): ?ChampionData
    {
        return $this->Urgot;
    }

    public function setUrgot(?ChampionData $Urgot): void
    {
        $this->Urgot = $Urgot;
    }

    public function getVarus(): ?ChampionData
    {
        return $this->Varus;
    }

    public function setVarus(?ChampionData $Varus): void
    {
        $this->Varus = $Varus;
    }

    public function getVayne(): ?ChampionData
    {
        return $this->Vayne;
    }


    public function setVayne(?ChampionData $Vayne): void
    {
        $this->Vayne = $Vayne;
    }

    public function getVeigar(): ?ChampionData
    {
        return $this->Veigar;
    }

    public function setVeigar(?ChampionData $Veigar): void
    {
        $this->Veigar = $Veigar;
    }

    public function getVelkoz(): ?ChampionData
    {
        return $this->Velkoz;
    }

    public function setVelkoz(?ChampionData $Velkoz): void
    {
        $this->Velkoz = $Velkoz;
    }

    public function getVex(): ?ChampionData
    {
        return $this->Vex;
    }

    public function setVex(?ChampionData $Vex): void
    {
        $this->Vex = $Vex;
    }

    public function getVi(): ?ChampionData
    {
        return $this->Vi;
    }

    public function setVi(?ChampionData $Vi): void
    {
        $this->Vi = $Vi;
    }

    public function getViego(): ?ChampionData
    {
        return $this->Viego;
    }

    public function setViego(?ChampionData $Viego): void
    {
        $this->Viego = $Viego;
    }

    public function getViktor(): ?ChampionData
    {
        return $this->Viktor;
    }

    public function setViktor(?ChampionData $Viktor): void
    {
        $this->Viktor = $Viktor;
    }

    public function getVladimir(): ?ChampionData
    {
        return $this->Vladimir;
    }

    public function setVladimir(?ChampionData $Vladimir): void
    {
        $this->Vladimir = $Vladimir;
    }

    public function getVolibear(): ?ChampionData
    {
        return $this->Volibear;
    }

    public function setVolibear(?ChampionData $Volibear): void
    {
        $this->Volibear = $Volibear;
    }

    public function getWarwick(): ?ChampionData
    {
        return $this->Warwick;
    }

    public function setWarwick(?ChampionData $Warwick): void
    {
        $this->Warwick = $Warwick;
    }

    public function getXayah(): ?ChampionData
    {
        return $this->Xayah;
    }

    public function setXayah(?ChampionData $Xayah): void
    {
        $this->Xayah = $Xayah;
    }

    public function getXerath(): ?ChampionData
    {
        return $this->Xerath;
    }

    public function setXerath(?ChampionData $Xerath): void
    {
        $this->Xerath = $Xerath;
    }

    public function getXinZhao(): ?ChampionData
    {
        return $this->XinZhao;
    }

    public function setXinZhao(?ChampionData $XinZhao): void
    {
        $this->XinZhao = $XinZhao;
    }

    public function getYasuo(): ?ChampionData
    {
        return $this->Yasuo;
    }

    public function setYasuo(?ChampionData $Yasuo): void
    {
        $this->Yasuo = $Yasuo;
    }

    public function getYone(): ?ChampionData
    {
        return $this->Yone;
    }

    public function setYone(?ChampionData $Yone): void
    {
        $this->Yone = $Yone;
    }

    public function getYorick(): ?ChampionData
    {
        return $this->Yorick;
    }

    public function setYorick(?ChampionData $Yorick): void
    {
        $this->Yorick = $Yorick;
    }

    public function getYuumi(): ?ChampionData
    {
        return $this->Yuumi;
    }

    public function setYuumi(?ChampionData $Yuumi): void
    {
        $this->Yuumi = $Yuumi;
    }

    public function getZac(): ?ChampionData
    {
        return $this->Zac;
    }

    public function setZac(?ChampionData $Zac): void
    {
        $this->Zac = $Zac;
    }

    public function getZed(): ?ChampionData
    {
        return $this->Zed;
    }

    public function setZed(?ChampionData $Zed): void
    {
        $this->Zed = $Zed;
    }

    public function getZeri(): ?ChampionData
    {
        return $this->Zeri;
    }

    public function setZeri(?ChampionData $Zeri): void
    {
        $this->Zeri = $Zeri;
    }

    public function getZiggs(): ?ChampionData
    {
        return $this->Ziggs;
    }

    public function setZiggs(?ChampionData $Ziggs): void
    {
        $this->Ziggs = $Ziggs;
    }

    public function getZilean(): ?ChampionData
    {
        return $this->Zilean;
    }

    public function setZilean(?ChampionData $Zilean): void
    {
        $this->Zilean = $Zilean;
    }

    public function getZoe(): ?ChampionData
    {
        return $this->Zoe;
    }

    public function setZoe(?ChampionData $Zoe): void
    {
        $this->Zoe = $Zoe;
    }

    public function getZyra(): ?ChampionData
    {
        return $this->Zyra;
    }

    public function setZyra(?ChampionData $Zyra): void
    {
        $this->Zyra = $Zyra;
    }
}
