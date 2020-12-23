# Web2A

RSS flux project

## Subject

**Projet B: _Site de news automatisé par lecture RSS_**  
Vous avez pour objectif de créer un site récapitulant l'actualité de plusieurs sites (des news), en lisant le flux RSS d'actualité de ces mêmes sites.  
Ce projet doit bien sûr être fait en MVC.  

Le site doit se décomposer en 3 parties:
> - la partie admin: elle permet d'ajouter/supprimer la lecture de flux RSS d'un site et de lister les sites référencés. Elle permet de paramètrer le nombre de news à garder sur la page principale. Cette partie doit être protégée par mot de passe.
> - la partie page principale du site: C'est sur cette paqe que sont listées les news par heure. Y sont indiqués l'heure, le site de référencement, le titre, une description. Le titre doit correspondre à un lien HTML. Le nombre de news est limité par rapport au pramètre précédent. Attention à ne pas allourdir la BD inutilement.
> - La partie lecture RSS: cette partie est optionnelle (si vous la faites, vous serez mieux noté). Elle prend 2h. Il s'agit d'un autre programme en PHP qui périodiquement, 1. lit en BD la liste des sites référencés, 2. se connecte sur le flux RSS et récupère le contenu XML. 3. parse le contenu XML pour mettre à jour la liste des news dans la BD. Pour cette dernière partie, vous pouvez utilisez la méthode que vous souhaitez, notamment utiliser un parseur XML (lien1, lien2). C'est un moteur qui permet de scanner et d'extraire les contenus d'un fichier ou d'une ressource XML (voir l'enseignant).

Voici un exemple de news dans un flux RSS:

```xml
<item>
    <title>La Xbox 360 noire avec HDMI et disque dur 120 Go ?</title>
    <description>Le 11 janvier dernier, une nouvelle rumeur concernant une possible &#171; nouvelle Xbox 360 &#187; am&#233;lior&#233;e &#224; vue le jour. Connue sous le nom de code &#171; Zephyr &#187;, cette Xbox de couleur noire pourrait inclure un [...]</description>
    <link>http://www.clubic.com/actualite-69593-xbox-360-hdmi-120-go-noire.html</link>
    <guid>http://www.clubic.com/actualite-69593-xbox-360-hdmi-120-go-noire.html</guid>
    <pubDate>Mon, 12 Feb 2007 14:01:28 +0100</pubDate>
    <category>Console</category>
</item> 
```

## Creators

- Romain OLIVIER G1
- Augustin LABORIE G1

## Repartition

- LABORIE Augustin:
    1. Création des vues
    2. Création de la base de données
    
- OLIVIER Romain:
    1. Mise en place du MVC
    2. Création de la DAL
    3. Création de l'extraction XML