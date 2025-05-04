# Step by step installation:

# Setting up files:
1. Create directories
    - docker/php
    - docker/nginx
    - src

2. Create files
    - docker/php/Dockerfile <- no extension
    - docker/nginx/default.conf
    - docker-compose.yml

3. Write some code
    - docker/php/Dockerfile
    - 
        FROM php:8.2-fpm
      
        RUN apt-get update && apt-get install -y \
            git curl libpng-dev libonig-dev libxml2-dev zip unzip \
            && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl

        RUN mkdir -p /var/www/storage /var/www/bootstrap/cache \
            && chown -R www-data:www-data /var/www \
            && chmod -R 775 /var/www/storage /var/www/bootstrap/cache 

        RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
            && apt-get install -y nodejs
      
        COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

        WORKDIR /var/www


    - docker/nginx/default.conf
    -
        server {
            listen 80;
            index index.php index.html;
            server_name localhost;
            root /var/www/public;

            location / {
                try_files $uri $uri/ /index.php?$query_string;
            }

            location ~ \.php$ {
                include fastcgi_params;
                fastcgi_pass app:9000;
                fastcgi_index index.php;
                fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            }

            location ~* \.(css|js|jpg|jpeg|png|gif|ico|svg|woff|woff2|ttf|eot)$ {
                try_files $uri =404;
                access_log off;
                log_not_found off;
            }

            location ~ /\.ht {
                deny all;
            }
        }
        
    
    - docker-compose.yml (Note: change values of container_name)
    - 
        services:
            app:
                build:
                context: .
                dockerfile: docker/php/Dockerfile
                container_name: mark-II-app
                working_dir: /var/www
                volumes:
                - ./src:/var/www
                # - ./src/public:/var/www/public
                networks:
                - laravel
                depends_on:
                - mysql

            nginx:
                image: nginx:alpine
                container_name: mark-II-nginx
                ports:
                - "8000:80"
                volumes:
                - ./src:/var/www
                - ./docker/nginx/default.conf:/etc/nginx/conf.d/default.conf
                networks:
                - laravel
                depends_on:
                - app

            mysql:
                image: mysql:8
                container_name: mark-II-mysql
                ports:
                - "3306:3306"
                environment:
                MYSQL_DATABASE: todo_app
                MYSQL_ROOT_PASSWORD: root
                MYSQL_USER: admin
                MYSQL_PASSWORD: admin123
                volumes:
                - mysql_data:/var/lib/mysql
                networks:
                - laravel

            networks:
            laravel:

            volumes:
            mysql_data:




4. Run command in src directory
    - docker-compose run --rm app composer create-project laravel/laravel:^11.0 .
    - docker-compose up -d

5. Configure database connection at .env
6. Migrate database
7. Clear cache 
    - docker-compose exec app php artisan cache:Clear       
