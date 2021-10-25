# Image Parser
## This is a simple component to parse images from html page.
This component was developed to demonstrate  developing approaches only!!!

This functionality contains separate independent components:
* https://github.com/sipsystemgm/reader
* https://github.com/sipsystemgm/image-parser
* https://github.com/sipsystemgm/reader-manager 

# Installation

## clone this repository

```ssh
git clone git@github.com:sipsystemgm/image-parser-symfony.git
cd image-parser-symfony
```

## docker
```ssh
docker-compose up -d
docker exec -it sip-php-cli composer install
docker exec -it sip-php-cli php bin/console doctrine:database:create
docker exec -it sip-php-cli php bin/console doctrine:migration:migrate
docker exec -it sip-php-fpm npm install
docker exec -it sip-php-fpm npm run build
```
# Run

```ssh
# This parser escapes urls with subdomains but a lot of popular portals use ones for images. 
# Try to avoid portals which use subdomain.
# Sites with subdomains won't be saved!!!

# example docker exec -it sip-php-cli php bin/console app:parser https://some-site.com 4 20

docker exec -it sip-php-cli php bin/console app:parser <url> [<deep> [<max-page>]]
```

```ssh
# Run queue manager

docker exec -it sip-php-cli php bin/console messenger:consume reader
```

# Run web reports
open in your web browser
http://127.0.0.1:8081
