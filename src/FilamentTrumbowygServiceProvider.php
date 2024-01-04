<?php

namespace Webuti\FilamentTrumbowyg;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Webuti\FilamentTrumbowyg\Commands\FilamentTrumbowygCommand;
use Webuti\FilamentTrumbowyg\Testing\TestsFilamentTrumbowyg;

class FilamentTrumbowygServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-trumbowyg';

    public static string $viewNamespace = 'filament-trumbowyg';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('webuti/filament-trumbowyg');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void
    {
    }

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/filament-trumbowyg/{$file->getFilename()}"),
                ], 'filament-trumbowyg-stubs');
            }
        }

        // Testing
        Testable::mixin(new TestsFilamentTrumbowyg());
    }

    protected function getAssetPackageName(): ?string
    {
        return 'webuti/filament-trumbowyg';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('filament-trumbowyg', __DIR__ . '/../resources/dist/components/filament-trumbowyg.js'),
            Css::make('filament-trumbowyg-styles', __DIR__ . '/../resources/dist/filament-trumbowyg.css'),
            Css::make('filament-trumbowyg-styles', 'https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.26.0/ui/trumbowyg.min.css'),
            Js::make('filament-trumbowyg-scripts', __DIR__ . '/../resources/dist/filament-trumbowyg.js'),
            Js::make('jquery', 'https://code.jquery.com/jquery-3.6.1.min.js'),
            Js::make('trumbowyg-core', 'https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.26.0/trumbowyg.min.js'),
        ];
    }





    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            FilamentTrumbowygCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_filament-trumbowyg_table',
        ];
    }
}
