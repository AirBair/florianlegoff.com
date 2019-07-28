# Florian LE GOFF Website

Source code of my personal Website

<https://www.florianlegoff.com>

## System Requirement

- [PHP](https://secure.php.net)
- [Composer](https://getcomposer.org)
- [Node.js](https://nodejs.org) or [Yarn](https://yarnpkg.com) to compile assets.

## Installation

### 1 - Configure environment variables

Copy the `.env` file to `.env.local` and complete it with required credentials (database, mailer) & the correct working environment.

### 2 - Install project dependencies

- In **production** environment:

`composer install --no-dev --optimize-autoloader && composer dump-env prod`

- In **development** or **testing** environment:

`composer install`

### 3 - Generate static resources (css, javascript, ..)

`yarn install && yarn build`

### 4 - Grant write access on log & uploads directories to the web user

```
HTTPDUSER=$(ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1)
setfacl -dR -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX var/log public/images/{projects,skills}
setfacl -R -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX var/log public/images/{projects,skills}
```

### 5 - Protect sensitive files

Since the `.env.local` (and `.env.local.php` if you are in production environment) contains sensitive information, consider protecting it in read/write mode.
Only the **web user** and **developers** are supposed to be able to access it.

## License

This software is published under the [MIT License](LICENSE)
