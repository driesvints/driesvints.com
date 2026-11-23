<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class BackupTest extends TestCase
{
    #[Test]
    public function monitoring_reports_backup_health_without_sending_email(): void
    {
        config(['mail.default' => 'array']);
        $disk = Storage::fake('backups');

        $this->artisan('backup:monitor')
            ->expectsOutputToContain('considered unhealthy')
            ->assertExitCode(1);

        $disk->put('driesvints/'.now()->format('Y-m-d-H-i-s').'.zip', 'fresh backup');

        $this->artisan('backup:monitor')
            ->expectsOutputToContain('considered healthy')
            ->assertSuccessful();

        $this->assertCount(0, Mail::mailer()->getSymfonyTransport()->messages());
    }

    #[Test]
    public function cleanup_keeps_seven_days_of_cloud_backups_without_touching_other_backups(): void
    {
        $this->travelTo(now()->setDate(2026, 11, 23)->setTime(12, 0));

        $bucket = Storage::fake('bucket');
        config(['filesystems.disks.backups' => [
            'driver' => 'local',
            'root' => $bucket->path(config('filesystems.disks.backups.root')),
            'throw' => true,
        ]]);

        $bucket->put('forge/old-backup.zip', 'forge backup');
        $bucket->put('laravel-cloud/another-site/2026-10-01-00-00-00.zip', 'another site');
        $bucket->put('laravel-cloud/driesvints/2026-11-23-02-00-00.zip', 'latest');
        $bucket->put('laravel-cloud/driesvints/2026-11-16-12-00-01.zip', 'just inside retention');
        $bucket->put('laravel-cloud/driesvints/2026-11-16-11-59-59.zip', 'just outside retention');

        $this->artisan('backup:clean')->assertSuccessful();

        $bucket->assertExists([
            'forge/old-backup.zip',
            'laravel-cloud/another-site/2026-10-01-00-00-00.zip',
            'laravel-cloud/driesvints/2026-11-23-02-00-00.zip',
            'laravel-cloud/driesvints/2026-11-16-12-00-01.zip',
        ]);
        $bucket->assertMissing('laravel-cloud/driesvints/2026-11-16-11-59-59.zip');
    }
}
