#!/bin/bash
set -e

# Wait for Postgres to be ready
echo "Waiting for Postgres to start..."
# until pg_isready -h $POSTGRES_HOST -p 5432 -U $POSTGRES_USER; do
#   sleep 2
# done

echo "Postgres is ready, running migrations..."

# Run migrations
echo "Running migrations..."
php bin/console doctrine:migrations:migrate --no-interaction

# Load fixtures
echo "Loading fixtures..."
php bin/console doctrine:fixtures:load --no-interaction

# Start Symfony built-in server
echo "Starting Symfony built-in server..."
exec php -S 0.0.0.0:8000 -t public
