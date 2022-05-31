## Time Logger foreach Task
- install project 10 min
- Write migrations about 30 min
- Write seeders about 10 min
- Handle layout directory about 1H and 30 min
- Get all tasks API 30 min
- Create Task form and logic 1H
- Get Statistics 30 min
- Create Job for Statistics about 10 min
- Install and configure supervisor about 30 min
- Setup workflow GitHub actions 1H

## supervisor installation && configurations

- Make sure that you installed supervisor 
- sudo apt-get install supervisor
- copy laravel-worker.conf file to your machine if ubuntu you find it in /etc/supervisor/conf.d dir
- make sure in .env QUEUE_CONNECTION  variable is = database
- laravel-worker.conf consent
- you need to change path in config file with your local project path
```bash 
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php {change with your local project path}/task-manager/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=forge
numprocs=8
redirect_stderr=true
stdout_logfile={change with your local project path}/storage/worker.log
stopwaitsecs=3600 
```
- to make sure that supervisor working
- `sudo supervisorctl reread`
- `sudo supervisorctl update`
- `sudo supervisorctl restart all`


## steps to run the project


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
