## About
Simple blog build using Symfony 4.4.* and makes use of the following bundles:
- doctrine/doctrine-bundle
- doctrine/doctrine-fixtures-bundle
- doctrine/doctrine-migrations-bundle
- doctrine/orm
- friendsofsymfony/user-bundle
- knplabs/knp-time-bundle
- sensio/framework-extra-bundle
- stof/doctrine-extensions-bundle
- symfony/swiftmailer-bundle
- symfony/translation
- symfony/twig-bundle
- symfony/validator
- symfony/web-profiler-bundle
- symfony/webpack-encore-bundle
- symfony/yaml
- twig/extra-bundle
- twig/twig

## Instalation Steps:
1. ``git clone https://github.com/lartisan/symfony-simple-blog.git``;
2. After you ``cd`` into the directory, run ``composer install``;
3. Make a copy of the environment fils ``cp .env .env.local``;
4. Modify the ``.env.local`` file with your database details; 
5. Run ``bin/console doctrine:database:create`` and then ``bin/console doctrine:schema:update --force``;
6. Install the frontend dependencies with ``npm install && npm run dev``;
7. Run ``bin/console doctrine:fixtures:load`` and , finally, run ``symfony server:start -d`` and then navigate to your site.

## Demo users:
- Admin: admin@example.com
- Moderator: moderator@example.com
- User: user@example.com

***One password for all: parola123***
