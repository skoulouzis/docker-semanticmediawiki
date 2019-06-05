# docker-semanticmediawiki
## Prerequisites
* docker 
* docker stack 
## Build
```
git clone https://github.com/skoulouzis/docker-semanticmediawiki.git
```
```
cd smw
```
```
docker build -t smw .
```

## Deploy
```
docker stack deploy -c docker-compose.yml wiki
```
The wiki may take some time to start.

* Go to jena-fuseki http://localhost:3030/
* Create new dataset named 'db'

    
    


