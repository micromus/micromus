# Шаблон микросервисной архитектуры

Этот репозиторий служит для шаблона создания микросервиса

## Локальное развертывание микросервиса

Для запуска микросервиса требуется Docker, Docker Compose Plugin V2 и Laravel Sail

```bash
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
