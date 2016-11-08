@setup
    function env(string $key) {
      $dotenv = file_get_contents('.env');
      $rows   = explode("\n", $dotenv);

      $search = array_filter($rows, function ($row) use ($key) {
          if (strstr($row, $key)) {
              return $row;
          }
      });

      $variable = reset($search);
      $segments = explode('=', $variable);
      $value = end($segments);

      return $value;
    }

    $server = isset($server) ? $server : 'staging';

    $defaultConfig = [
        'repo' => env('GIT_REPO'),
        'releasesDir' => 'releases',
        'currentDir' => 'current',
        'sharedDir' => 'shared'
    ];

    $config = [
        'staging' => [
            'ssh' => env('STAGING_SSH'),
            'path' => env('STAGING_PATH'),
            'branch' => env('STAGING_BRANCH'),
            'user' => env('STAGING_USER'),
        ],
        'production' => [
            'ssh' => env('PRODUCTION_SSH'),
            'path' => env('PRODUCTION_PATH'),
            'branch' => env('PRODUCTION_BRANCH'),
            'user' => env('PRODUCTION_USER'),
        ],
    ];

    extract(array_merge($defaultConfig, $config[$server]));

    $release = date('YmdHis');
@endsetup

@servers(['deploy' => $ssh])

@macro('deploy')
    clone_repository
    install_dependencies
    run_gulp
    symlink_shared
    run_migrations
    symlink_new_release
    optimize
    remove_old_releases
@endmacro

@macro('setup')
    create_directories
    clone_repository
    copy_shared
    remove_release
@endmacro

@task('create_directories')
    cd {{ $path }};
    [ -d {{ $releasesDir }} ] || mkdir {{ $releasesDir }};
    [ -d {{ $sharedDir }} ] || mkdir {{ $sharedDir }};
    echo 'Directories created'
@endtask

@task('copy_shared')
    cd {{ $path }}/{{ $releasesDir }}/{{ $release }};
    cp .env.example {{ $path }}/{{ $sharedDir }}/.env
    cp -Rp storage {{ $path }}/{{ $sharedDir }}/
    echo 'Shared files copied'
@endtask

@task('remove_release')
    rm -rf {{ $path }}/{{ $releasesDir }}/{{ $release }};
    echo 'Release {{ $release }} removed'
@endtask

@task('clone_repository')
    cd {{ $path }}/{{ $releasesDir }};
    git clone {{ $repo }} --branch={{ $branch }} --depth=1 {{ $release }};
    echo 'Repository cloned';
@endtask

@task('install_dependencies')
    cd {{ $path }}/{{ $releasesDir }}/{{ $release }};
    composer install --no-ansi --no-dev --no-interaction --no-progress --optimize-autoloader;
    npm install --no-spin
    echo 'Dependencies installed'
@endtask

@task('run_gulp')
    cd {{ $path }}/{{ $releasesDir }}/{{ $release }};
    gulp --production
    echo 'Assets compiled'
@endtask

@task('run_migrations')
    cd {{ $path }}/{{ $releasesDir }}/{{ $release }};
    php artisan migrate --no-interaction
    echo 'Migrations complete'
@endtask

@task('symlink_shared')
    cd {{ $path }}/{{ $releasesDir }}/{{ $release }};
    rm -rf storage .env
    ln -nfs ../../{{ $sharedDir }}/storage storage
    ln -nfs ../../{{ $sharedDir }}/.env .env
    echo 'Symlinking complete'
@endtask

@task('symlink_new_release')
    cd {{ $path }};
    ln -nfs {{ $releasesDir }}/{{ $release }} {{ $currentDir }}
@endtask

@task('optimize')
    cd {{ $path }}/{{ $currentDir }};
    php artisan cache:clear
    php artisan optimize --no-interaction
    php artisan route:cache --no-interaction
    php artisan queue:restart
    echo 'Finished optimising'
@endtask

@task('remove_old_releases')
    cd {{ $path }}/{{ $releasesDir }};
    find . -maxdepth 1 -type d -name "2*" | sort | head -n -3 | xargs -d "\n" rm -Rf;
    echo 'Cleaned up old deployments';
@endtask
