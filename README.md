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
 php artisan make:controller ChunkController

 php artisan make:provider HelloServiceProvider
 php artisan make:provider MyServiceProvider

-mオプションでマイグレーションファイルが同時に作成
 php artisan make:model Book -m
 php artisan make:model Review -m
 php artisan make:model Skill -m
 php artisan make:model Review -m
 php artisan make:model SkillUser -m


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
 php artisan make:migration add_proficiency_to_skill_user_table --table=skill_user

 php artisan make:seeder BooksTableSeeder
 php artisan make:seeder ReviewsTableSeeder
 php artisan make:seeder SkillsTableSeeder
 php artisan make:seeder UsersTableSeeder

 php artisan make:factory UserFactory

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
