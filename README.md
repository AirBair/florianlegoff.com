# Florian LE GOFF Website

Source code of my personal Website

<https://www.florianlegoff.com>

## System Requirement

- [PHP](https://secure.php.net) (7.2 or higher).
- [Composer](https://getcomposer.org)
- [Node.js](https://nodejs.org) (10 or higher) & [Yarn](https://yarnpkg.com) to compile assets.

## Installation

### 1 - Install dependencies

Install project dependencies from composer : `composer install`

Install yarn dependencies & build assets : `yarn install && yarn build`

### 2 - Configure the .env file

Edit the file .env.local and complete it with required credentials (database, mailer, admin password) & the correct working environment.

### 3 - Create/Update the database

`php bin/console doctrine:migrations:migrate` (Be careful to not lose any data in case of update)

### 4 - Grant write access on uploads directories to the web user

```
HTTPDUSER=$(ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1)
setfacl -dR -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX public/images/{projects,skills}
setfacl -R -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX public/images/{projects,skills}
```


## License

This software is published under the [MIT License](LICENSE)
