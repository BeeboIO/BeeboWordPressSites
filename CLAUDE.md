# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a WordPress Bedrock project - a modern WordPress boilerplate that uses Composer for dependency management and follows twelve-factor app methodology. It includes the Ollie theme as the active theme.

### Key Architecture

- **Bedrock Structure**: WordPress core is isolated in `web/wp/`, content in `web/app/`
- **Composer Management**: All dependencies managed via composer.json, including WordPress core and plugins
- **Environment Configuration**: Uses `.env` files with environment-specific configs in `config/environments/`
- **Multisite**: Pre-configured for WordPress multisite with subdomain installation
- **Theme**: Ollie block theme with extensive pattern library and block style variations

### Directory Structure

```
├── config/                    # Application configuration
│   ├── application.php        # Main config file
│   └── environments/          # Environment-specific overrides
├── web/                       # Document root
│   ├── app/                   # WordPress content directory
│   │   ├── themes/ollie/      # Active theme
│   │   ├── plugins/           # WordPress plugins
│   │   └── mu-plugins/        # Must-use plugins
│   ├── wp/                    # WordPress core (managed by Composer)
│   └── index.php             # WordPress bootstrap
├── composer.json              # PHP dependencies
└── .env                       # Environment variables (not in repo)
```

## Development Commands

### Code Quality
- `composer run lint` - Run PHP linting with Pint (test mode)
- `composer run lint:fix` - Fix PHP code style issues with Pint

### Environment Setup
1. Copy `.env.example` to `.env` and configure:
   - Database credentials (DB_NAME, DB_USER, DB_PASSWORD)
   - Site URLs (WP_HOME, WP_SITEURL)
   - Generate WordPress salts from https://roots.io/salts.html
   - Set WP_ENV (development/staging/production)
   - Configure multisite settings (DOMAIN_CURRENT_SITE, etc.)

2. Install dependencies: `composer install`

### Pint Configuration
- Uses PER (PHP Evolving Recommendations) preset
- Excludes WordPress core, plugins, and default theme from linting
- Configuration in `pint.json`

## WordPress Configuration Notes

### Multisite Settings
- Pre-configured for subdomain multisite installation
- Key constants: MULTISITE, SUBDOMAIN_INSTALL, DOMAIN_CURRENT_SITE
- Includes multisite URL fixer for proper subdomain handling

### Security & Performance
- File editing disabled in admin (DISALLOW_FILE_EDIT)
- Plugin/theme modifications disabled (DISALLOW_FILE_MODS)
- Script concatenation disabled
- HTTPS detection for reverse proxy setups

### Content Management
- Custom content directory: `/app` instead of `/wp-content`
- Automatic updates disabled
- Post revisions configurable via WP_POST_REVISIONS

## Ollie Theme

Modern block theme with:
- Extensive pattern library in `/patterns/`
- Custom block styles for core blocks
- WooCommerce integration
- Multiple color schemes and typography presets
- Template parts for header, footer, sidebar

### Theme Development
- Main theme logic in `functions.php` with namespaced functions
- Block styles automatically enqueued when blocks are used
- Pattern categories registered for better organization
- Custom template part areas including sidebar