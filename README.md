# Image Parser
## This is a simple component to parse images from html page.
This component was developed to demonstrate  developing approaches only!!!

#Install

```ssh
docker-compose up -d
docker exec -it sip-php-cli php bin/console doctrine:database:create
docker exec -it sip-php-cli php bin/console doctrine:migration:migrate
```
#Run

```ssh
# This parser escapes urls with subdomains but a lot of popular portals use ones for images. 
# Try to avoid portals which use subdomain.
# Sites with subdomains won't be saved!!!

# example docker exec -it sip-php-cli php bin/console app:parser https://rozetka.com.ua 4 20

docker exec -it sip-php-cli php bin/console app:parser <url> [<deep> [<max-page>]]
```

```ssh
#Run queue manager

docker exec -it sip-php-cli php bin/console messenger:consume reader
```

#Run web reports
open in your web browser
http://127.0.0.1:8081