# docker-semanticmediawiki
```
docker build -t smw .
```
```
docker stack deploy -c docker-compose.yml wiki
```

Go to http://localhost and setup the wiki. Use the following values:
* Database host:mariadb
* Database name:my_wiki
* Database username:wikiuser
* Database password:example

Enable the following Gadgets: 

* LocalisationUpdate
* MultimediaViewer
* SemanticBreadcrumbLinks
* SemanticCite
* SemanticCompoundQueries
* SemanticExtraSpecialProperties
* SemanticGlossary
* SemanticMediaWiki
* SemanticMetaTags
* SemanticResultFormats 

Finich the set up and cancel the  LocalSettings.php download. 
Stop the stack:
```
docker stack rm wiki
```
In docker-compose.yml uncomment the line:
```
: - ./LocalSettings.php:/var/www/html/LocalSettings.php
```
Start the stack again:
```
docker stack deploy -c docker-compose.yml wiki
```
Go to http://localhost if you get the error:
```
Error

Semantic MediaWiki was installed and enabled but is missing an appropriate upgrade key that matches: smw:2018-09-01.
Why Do I see this error?

Semantic MediaWiki's internal database structure has changed and requires some adjustments to be fully functional. There can be several reasons including:

    Additional fixed properties (requires additional table setup) were added
    An upgrade contains some changes to tables or indices making an interception obligatory before accessing the data

How Do I fix this error?

An administrator (or any person with administrator rights) has to run either MediaWiki's update.php or Semantic MediaWiki's setupStore.php maintenance script. You may also consult the following pages for further assistance:

    Installation instructions
    Troubleshooting help page
```
Log in wiki container:
```
sudo docker exec -it $(sudo docker ps | grep wiki_mediawiki | awk '{print $1}') /bin/bash
```
In the container execute:
```
cd /var/www/html/extensions/SemanticMediaWiki/maintenance && php setupStore.php
```
    
    


