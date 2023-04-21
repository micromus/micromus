# Шаблон микросервисной архитектуры

Этот репозиторий служит для шаблона создания микросервиса

## Локальное развертывание микросервиса

Для запуска микросервиса требуется Docker, Docker Compose Plugin V2 и Laravel Sail

```bash
# Переходим в папку приложения локальной сборки
cd src

# Копирование ENV переменных
cp .env.example .env

# Установка зависимостей
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
    
# Запуск приложения
./vendor/bin/sail up -d

# Генерация ключа приложения
./vendor/bin/sail artisan key:generate
```

Локальное развертывание завершено! [Развернутое приложение](http://localhost)

## Продуктовое развертывание

Для продуктового развертывания подготовлен файл Dockerfile. Для его запуска
достаточно передать необходимые ENV переменные. Такие
как доступы к базе данных, редис и т.д.

```bash
# Копирование ENV переменных
cp .env.example .env

# Запуск продуктового приложения
docker compose up -d
```


### Важно после первой сборки

После первой сборки рекомендуется заменить `APP_KEY` в файле Dockerfile, после
первой сборки вызовите команду в контейнере приложения:

```bash
docker compose exec app php artisan key:generate
```

После вызова этой команду нужно подставить полученный ключ в Dockerfile
