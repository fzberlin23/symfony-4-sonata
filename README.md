# Symfony 4 + Sonata Admin Bundle test application

A little test application based on Symfony 4 + Sonata Admin Bundle.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

What things you need to install the software and how to install them

```
docker + docker-compose
```

### Installing

```
git clone git@github.com:fzberlin23/symfony-4.2-sonata.git .
Modify docker-compose.yml and set the "volumes" path appropriately
docker-compose up -d
docker exec -it symfony4-apache bash
composer install
Visit http://localhost:8001
```

### Installing Symfony 4 + Sonata admin bundle from scratch

```
composer create-project symfony/website-skeleton .
composer require symfony/apache-pack
composer require sonata-project/admin-bundle
composer require sonata-project/doctrine-orm-admin-bundle
composer require symfony/orm-pack
composer require symfony/maker-bundle --dev
composer require stof/doctrine-extensions-bundle
```
