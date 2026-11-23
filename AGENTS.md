# Project guidance

## Development in Amp orbs

- `.agents/setup` installs PHP 8.5, Composer, Node 22.23.4, locked dependencies, and production assets when preparing an orb snapshot. Reuse the snapshot; `.agents/resume` does not reinstall dependencies or start services.
- Setup preserves an existing `.env` and app key. The default orb uses a disposable SQLite database with sample users and posts, file-based sessions/cache, and synchronous queues. No external credentials, MySQL, Redis, or background daemons are required for the app or test suite.
- Run `php artisan test`; tests use a separate in-memory SQLite database.
- For a preview, run `php artisan serve --host=0.0.0.0 --port=8000` through `amp orb service start` with `--portal`.

## Deployment and compatibility

- Production runs on Laravel Cloud. Keep the original Forge site and database intact until the user explicitly requests their removal.
- Preserve the existing production `APP_KEY`, session cookie name, PHP session serialization, cache/Redis prefixes, and `storage/app` local disk root. These retain compatibility with existing sessions and data.
- Let Cloud inject its managed environment variables; do not add custom overrides for `APP_NAME`, `APP_URL`, `APP_ENV`, or `APP_DEBUG`.
- Build frontend assets with `npm ci && npm run production` and include `public/build` in the deployment. The layout uses Vite's manifest, not Mix's manifest; `npm run hot` starts Vite's development server.
- The Laravel 13 migration changed ResponseCache to JSON serialization. If replaying that migration, clear the old response cache rather than carrying serialized responses across it. The old upgrade's cache-clearing steps are not routine Cloud deployment commands.

## Database backups

- Keep Cloud-managed snapshots enabled alongside Spatie backups. This site's database is `driesvints` in the shared MySQL cluster `personal`; do not back up or restore other schemas as part of this app's backup job.
- Backup configuration lives in `config/backup.php`, the `backups` disk in `config/filesystems.php`, and `routes/console.php`. Cloud archives belong in `s3://backups.driesvints.com/laravel-cloud/driesvints/`; preserve the separate prefix so cleanup cannot affect existing Forge backups or other sites.
- Enable `BACKUP_ENABLED` only in the environment responsible for backups, enable that Cloud App cluster's scheduler, and deploy schedule changes. Keep the one-minute sleep timeout unless testing demonstrates that a backup needs longer; verify scheduled execution while sleeping before relying on it.
- Configure `BACKUP_AWS_ACCESS_KEY_ID`, `BACKUP_AWS_SECRET_ACCESS_KEY`, and `BACKUP_ARCHIVE_PASSWORD` securely in Cloud. Existing Forge S3 credentials may be reused if they permit bucket listing and object upload, download, and deletion in the new prefix; Forge's API does not reveal the keys.
- Keep the archive password separately in a password manager. New encrypted archives require it for restoration; existing unencrypted Forge backups do not. Do not include code or environment secrets in the backup archive.
- Failure alerts use Mailgun and go to `dries@vints.be`. Reuse the original Forge site's Mailgun settings through `MAIL_MAILER=mailgun`, `MAILGUN_DOMAIN`, `MAILGUN_SECRET`, `MAILGUN_ENDPOINT`, `MAIL_FROM_ADDRESS`, and `MAIL_FROM_NAME`; verify delivery rather than assuming configured notifications send email.
- The runtime needs `mysqldump` and PHP's ZIP extension. After deployment, run `php artisan backup:run --only-db`, `php artisan backup:list`, and `php artisan backup:monitor`; verify S3 upload, archive decryption, and restoration into a disposable database, never production. Local tests do not establish that S3 credentials, email delivery, or Cloud wake scheduling work.
