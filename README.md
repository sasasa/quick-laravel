```
composer global require laravel/installer
laravel new quick-laravel

CREATE DATABASE quick_laravel CHARACTER SET utf8;
GRANT ALL PRIVILEGES ON quick_laravel.* TO quickusr@localhost IDENTIFIED BY 'quickpass';
USE quick_laravel;
# source C:\Users\user07\php\quick-laravel\quick.sql
source C:\Users\sae\php\quick-laravel\quick.sql

# source C:\Users\user07\php\quick-laravel\article.sql
source C:\Users\sae\php\quick-laravel\article.sql

DROP TABLE books;
SHOW TABLES FROM quick_laravel;
```

```
 php artisan make:controller ArticleController --resource --model=Ariticle
 php artisan make:controller ReviewsController --resource
 php artisan make:controller SkillUserController

 php artisan make:controller StateController

 php artisan make:provider HelloServiceProvider

-mオプションでマイグレーションファイルが同時に作成
 php artisan make:model Book -m
 php artisan make:model Review -m
 php artisan make:model Skill -m

 php artisan make:request HelloRequest

 php artisan make:rule NumberRule

 php artisan make:middleware LogMiddleware
 php artisan make:middleware ElapsedTimeMiddleware
 php artisan make:middleware LogSQLMiddleware

 php artisan session:table
 php artisan migrate

 php artisan make:migration create_books_table
 php artisan make:migration create_reviews_table

 php artisan make:migration create_skills_table
 php artisan make:migration create_skill_user_table


カラム追加
 php artisan make:migration add_deleted_to_reviews_table --table=reviews

 php artisan make:seeder BooksTableSeeder
 php artisan make:seeder ReviewsTableSeeder
 php artisan make:seeder SkillsTableSeeder

 php artisan migrate
 一つロールバック
 php artisan migrate:rollback
 php artisan migrate:rollback --step=1

 一旦全てのテーブルを削除してマイグレーションし直す
 php artisan migrate:fresh

 全ロールバック
 php artisan migrate:reset
 全ロールバックしてマイグレート
 php artisan migrate:refresh
 全ロールバックしてマイグレートしてシードを投入
 php artisan migrate:refresh --seed
 
 php artisan db:seed --class=BooksTableSeeder
 php artisan db:seed --class=SkillsTableSeeder

 php artisan vendor:publish --tag=laravel-pagination

 composer require "laravelcollective/html"
 composer require "laravel/ui"
 php artisan ui vue --auth
 npm install
 npm run dev

 php artisan vendor:publish --tag=laravel-notifications

 php artisan storage:link


 composer require laravel/scout
 composer require algolia/algoliasearch-client-php
 php.iniでextension=sqlite3のコメントアウト
 composer require teamtnt/tntsearch
 composer require teamtnt/laravel-scout-tntsearch-driver

 php artisan vendor:publish --provider=Laravel\Scout\ScoutServiceProvider
 php artisan scout:import "App\Review"
 php artisan scout:flush "App\Review"

 php artisan make:job MyJob
 php artisan make:provider MyJobProvider

 php artisan queue:table
 php artisan queue:work
 php artisan queue:work --once
 php artisan queue:work --stop-when-empty
 php artisan queue:work --queue=name1,name2
 .env変更
 QUEUE_CONNECTION=database
 QUEUE_DRIVER=database


 php artisan vendor:publish --tag=laravel-errors


```


<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
