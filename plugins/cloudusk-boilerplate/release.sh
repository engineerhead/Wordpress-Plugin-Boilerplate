#!/bin/bash

PLUGIN_SLUG="cloudusk-2fa-two-factor-authentication"

# Clean previous builds
rm -rf ${PLUGIN_SLUG}-release ${PLUGIN_SLUG}.zip

# Install production dependencies only (no dev packages)
echo "Installing production dependencies..."
composer install --no-dev --optimize-autoloader

# Build frontend
echo "Building frontend assets..."
npm run build

# Copy files
echo "Copying files..."
mkdir ${PLUGIN_SLUG}-release
rsync -av --progress ./ ./${PLUGIN_SLUG}-release/ \
  --exclude-from=build-ignore.txt

# Zip it
echo "Creating zip archive..."
cd ${PLUGIN_SLUG}-release
zip -r ../${PLUGIN_SLUG}.zip .
cd ..
rm -rf ${PLUGIN_SLUG}-release

# Restore dev dependencies for local development
echo "Restoring dev dependencies..."
composer install

echo "✅ Build complete: ${PLUGIN_SLUG}.zip"
