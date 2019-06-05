# docker-semanticmediawiki
```
git clone https://github.com/skoulouzis/docker-semanticmediawiki.git
```
```
cd smw
```
```
docker build -t smw .
```
```
docker stack deploy -c docker-compose.yml wiki
```
The wiki may take some time to start.

* Go to jena-fuseki http://localhost:3030/
* Create new dataset named 'db'

    
    


