
## steps to run the project

- Make sure that you installed supervisor 
- sudo apt-get install supervisor
- copy laravel-worker.conf file to your machine if ubuntu you find it in /etc/supervisor/conf.d dir
- make sure in .env QUEUE_CONNECTION  variable is = database


- run composer install
- copy `.env.example` file to `.env` file to get proper .env valid data
- make sure that you update .env variables
- run php artisan migrate
- run php artisan db:seed
- if you use valet then park and link 
- go to http://task-manager.test/tasks

## about the project
in this project I used
- php8.0
- laravel 9.0
- mysql 8.0
- nginx
- composer

used for architecture
- SAO
- repository design pattern

the project has 3 main pages
--------------------------------------
- name `all tasks`
- url `http://task-manager.test/tasks`
- method `GET`
-----------------------------------------
- name `create task`
- url `http://task-manager.test/tasks/cerate`
- method `POST`
-----------------------------------------
- name `users statistics`
- url `http://task-manager.test/statistics`
- method `GET`
-----------------------------------------
