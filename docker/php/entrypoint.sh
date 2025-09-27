#!/bin/bash
set -e

echo "🚀 Laravel Entrypoint iniciado..."

echo "🔧 Ajustando permissões..."
chown -R www-data:www-data storage bootstrap/cache
chmod -R 777 storage bootstrap/cache

echo "📦 Instalando dependências do Composer..."
php artisan package:discover --ansi || true

php artisan config:clear
php artisan cache:clear

echo "🔑 Gerando APP_KEY..."
php artisan key:generate --force

echo "📂 Criando symlink de storage..."
php artisan storage:link --relative || true

echo "⏳ Aguardando o banco de dados..."
until php -r "new PDO('mysql:host=$DB_HOST;dbname=$DB_DATABASE', '$DB_USERNAME', '$DB_PASSWORD');" >/dev/null 2>&1; do
    sleep 2
done
echo "✅ Banco pronto para conexão."

echo "🗄️ Rodando migrations..."
php artisan migrate --force || true

echo "🌱 Rodando seeders..."
php artisan db:seed --force

echo "✅ Setup concluído!"

exec "$@"
