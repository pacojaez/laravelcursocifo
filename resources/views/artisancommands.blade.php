@extends('layout.master')

@section('titulo', 'Instalación de Larabikes')

@section('contenido')
    <div class="flex flex-col w-full bg-gray-100">
        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <h2 class="text-xl font-bold">ARTISAN COMMANDS</h2>
            <br>
            <a href="https://laravel.com/docs/9.x/artisan" target="blank" class="">
                https://laravel.com/docs/9.x/artisan
            </a>
        </div>

        <div class="flex flex-col items-center justify-center p-2 m-2 bg-gray-100 min-w-screen">
            <p class="">
                LISTADO DE COMANDOS DE ARTISAN
            </p>
        </div>
        <x-code>
            <p>
                Options:<br>
                -h, --help Display help for the given command. When no command is given display help for the list
                command<br>
                -q, --quiet Do not output any message<br>
                -V, --version Display this application version<br>
                --ansi|--no-ansi Force (or disable --no-ansi) ANSI output<br>
                -n, --no-interaction Do not ask any interactive question<br>
                --env[=ENV] The environment the command should run under<br>
                -v|vv|vvv, --verbose Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and
                3 for debug<br>
                <br>
                <br>
                Available commands:<br>
                about Display basic information about your application<br>
                <hr>
                clear-compiled <br>Remove the compiled class file<br>
                completion <br>Dump the shell completion script<br>
                db <br>Start a new database CLI session<br>
                docs <br>Access the Laravel documentation<br>
                down <br>Put the application into maintenance / demo mode<br>
                env <br>Display the current framework environment<br>
                help <br>Display help for a command<br>
                inspire <br>Display an inspiring quote<br>
                list <br>List commands<br>
                migrate <br>Run the database migrations<br>
                optimize <br>Cache the framework bootstrap files<br>
                serve <br>Serve the application on the PHP development server<br>
                test <br>Run the application tests<br>
                tinker <br>Interact with your application<br>
                up <br>Bring the application out of maintenance mode<br>
                <br>
                auth<br>
                auth:clear-resets Flush expired password reset tokens<br>
                <br>
                breeze<br>
                breeze:install Install the Breeze controllers and resources<br>
                <br>
                cache<br>
                cache:clear Flush the application cache<br>
                cache:forget Remove an item from the cache<br>
                cache:table Create a migration for the cache database table<br>
                <br>
                config<br>
                config:cache Create a cache file for faster configuration loading<br>
                config:clear Remove the configuration cache file<br>
                <br>
                db<br>
                db:monitor Monitor the number of connections on the specified database<br>
                db:seed Seed the database with records<br>
                db:show Display information about the given database<br>
                db:table Display information about the given database table<br>
                db:wipe Drop all tables, views, and types<br>
                <br>
                debugbar<br>
                debugbar:clear Clear the Debugbar Storage<br>
                <br>
                env<br>
                env:decrypt Decrypt an environment file<br>
                env:encrypt Encrypt an environment file<br>
                <br>
                event<br>
                event:cache Discover and cache the application's events and listeners<br>
                event:clear Clear all cached events and listeners<br>
                event:generate Generate the missing events and listeners based on registration<br>
                event:list List the application's events and listeners<br>
                <br>
                ide-helper<br>
                ide-helper:eloquent Add \Eloquent helper to \Eloquent\Model<br>
                ide-helper:generate Generate a new IDE Helper file.<br>
                ide-helper:meta Generate metadata for PhpStorm<br>
                ide-helper:models Generate autocompletion for models<br>
                <br>
                key<br>
                key:generate Set the application key<br>
                <br>
                make<br>
                make:cast Create a new custom Eloquent cast class<br>
                make:channel Create a new channel class<br>
                make:command Create a new Artisan command<br>
                make:component Create a new view component class<br>
                make:controller Create a new controller class<br>
                make:event Create a new event class<br>
                make:exception Create a new custom exception class<br>
                make:factory Create a new model factory<br>
                make:job Create a new job class<br>
                make:listener Create a new event listener class<br>
                make:mail Create a new email class<br>
                make:middleware Create a new middleware class<br>
                make:migration Create a new migration file<br>
                make:model Create a new Eloquent model class<br>
                make:notification Create a new notification class<br>
                make:observer Create a new observer class<br>
                make:policy Create a new policy class<br>
                make:provider Create a new service provider class<br>
                make:request Create a new form request class<br>
                make:resource Create a new resource<br>
                make:rule Create a new validation rule<br>
                make:scope Create a new scope class<br>
                make:seeder Create a new seeder class<br>
                make:test Create a new test class<br>
                <br>
                migrate<br>
                migrate:fresh Drop all tables and re-run all migrations<br>
                migrate:install Create the migration repository<br>
                migrate:refresh Reset and re-run all migrations<br>
                migrate:reset Rollback all database migrations<br>
                migrate:rollback Rollback the last database migration<br>
                migrate:status Show the status of each migration<br>
                <br>
                model<br>
                model:prune Prune models that are no longer needed<br>
                model:show Show information about an Eloquent model<br>
                <br>
                notifications<br>
                notifications:table Create a migration for the notifications table<br>
                <br>
                optimize<br>
                optimize:clear Remove the cached bootstrap files<br>
                <br>
                package<br>
                package:discover Rebuild the cached package manifest<br>
                <br>
                queue<br>
                queue:batches-table Create a migration for the batches database table<br>
                queue:clear Delete all of the jobs from the specified queue<br>
                queue:failed List all of the failed queue jobs<br>
                queue:failed-table Create a migration for the failed queue jobs database table<br>
                queue:flush Flush all of the failed queue jobs<br>
                queue:forget Delete a failed queue job<br>
                queue:listen Listen to a given queue<br>
                queue:monitor Monitor the size of the specified queues<br>
                queue:prune-batches Prune stale entries from the batches database<br>
                queue:prune-failed Prune stale entries from the failed jobs table<br>
                queue:restart Restart queue worker daemons after their current job<br>
                queue:retry Retry a failed queue job<br>
                queue:retry-batch Retry the failed jobs for a batch<br>
                queue:table Create a migration for the queue jobs database table<br>
                queue:work Start processing jobs on the queue as a daemon<br>
                <br>
                route<br>
                route:cache Create a route cache file for faster route registration<br>
                route:clear Remove the route cache file<br>
                route:list List all registered routes<br>
                <br>
                sail<br>
                sail:install Install Laravel Sail's default Docker Compose file<br>
                sail:publish Publish the Laravel Sail Docker files<br>
                <br>
                sanctum<br>
                sanctum:prune-expired Prune tokens expired for more than specified number of hours.<br>
                <br>
                schedule<br>
                schedule:clear-cache Delete the cached mutex files created by scheduler<br>
                schedule:list List the scheduled commands<br>
                schedule:run Run the scheduled commands<br>
                schedule:test Run a scheduled command<br>
                schedule:work Start the schedule worker<br>
                <br>
                schema<br>
                schema:dump Dump the given database schema<br>
                <br>
                session<br>
                session:table Create a migration for the session database table<br>
                <br>
                spatie-stub<br>
                spatie-stub:publish Publish all opinionated stubs that are available for customization<br>
                <br>
                storage<br>
                storage:link Create the symbolic links configured for the application<br>
                <br>
                stub<br>
                stub:publish Publish all stubs that are available for customization<br>
                <br>
                vendor<br>
                vendor:publish Publish any publishable assets from vendor packages<br>
                <br>
                view<br>
                view:cache Compile all of the application's Blade templates<br>
                view:clear Clear all compiled view files<br>
            </p>
        </x-code>
    </div>

@endsection
