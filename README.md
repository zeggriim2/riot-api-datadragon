# Riot Api Data Dragon Bundle


# [Introduction](https://github.com/dolejska-daniel/riot-api/wiki/Home#introduction)

Bienvenue sur le repo de la bibliothèque PHP DataDragon ! Le but de cette bibliothèque est de créer une bibliothèque facile à utiliser pour tous ceux qui en ont besoin.

Ce bundle Symfony 6 fournit une intégration simple et efficace avec l'API Riot Games notamment les données Data Dragon pour le jeu League of Legends. **(D'autres API arrivent)**.
Il permet d'accéder facilement aux informations sur les champions, les objets, les sorts et bien plus encore, directement depuis votre application Symfony.

## Installation
Pour installer ce bundle, utilisez Composer :

```bash
composer require zeggriim/riot-api-data-dragon-bundle
```
### Ajouter le bundle

```php
// config/bundles.php
return [
    // Other Bundles
    Zeggriim\RiotApiDataDragon\RiotApiDataDragonBundle::class => ['all' => true],
];
```


### Configuration

Ajouter le scope client de http_Client dans la config `framework.yaml`.


```yaml
framework:
    http_client:
        scoped_clients:
            riot.api: '%api.riot.base.uri%'
```

Dans ta config `services.yaml` tu peux mettre cette config qui te permettre de adapter ton base uri en fonction des différents environnement :

```yaml
parameters:
    api.riot.base.uri: '%env(string:API_RIO_BASE_URI)%'
```

# Exemple 

```php
    namespace App\Controller;
    
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Zeggriim\RiotApiDataDragon\Endpoint\VersionApiInterface;
    
    class HomeController
    {
        #[Route('/home', name: 'app_home')]
        public function index(VersionApiInterface $versionApi): Response
        {
            dd($versionApi->getVersions());
            // ['14.8.1','14.7.1','14.6.1','14.5.1','14.4.1'....]
        }
    }
```


# Liste Endpoints

| Endpoint                                                                               | Interface               |
|----------------------------------------------------------------------------------------|-------------------------|
| [Champions & Champion](https://developer.riotgames.com/docs/lol#data-dragon_champions) | ChampionApiInterface    |
| [Items](https://developer.riotgames.com/docs/lol#data-dragon_items)                    | ItemApiInterface        |
| [Languages](https://developer.riotgames.com/docs/lol#data-dragon_data-assets)          | LanguagesApiInterface   |
| [Profile Icon](https://developer.riotgames.com/docs/lol#data-dragon_other)             | ProfileIconApiInterface |
| [Versions](https://developer.riotgames.com/docs/lol#data-dragon_versions)              | VersionApiInterface     |