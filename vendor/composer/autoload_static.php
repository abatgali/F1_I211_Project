<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit121436999bb9b3c836c61b7ae444eb4d
{
    public static $classMap = array (
        'Car' => __DIR__ . '/../..' . '/models/car/car.class.php',
        'CarController' => __DIR__ . '/../..' . '/controllers/car_controller.class.php',
        'CarModel' => __DIR__ . '/../..' . '/models/car/car_model.class.php',
        'CarView' => __DIR__ . '/../..' . '/views/car/index/car_view.class.php',
        'ComposerAutoloaderInit121436999bb9b3c836c61b7ae444eb4d' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit121436999bb9b3c836c61b7ae444eb4d' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Database' => __DIR__ . '/../..' . '/application/database.class.php',
        'Dispatcher' => __DIR__ . '/../..' . '/application/dispatcher.class.php',
        'Driver' => __DIR__ . '/../..' . '/models/driver/driver.class.php',
        'DriverController' => __DIR__ . '/../..' . '/controllers/driver_controller.class.php',
        'DriverDetail' => __DIR__ . '/../..' . '/views/driver/detail/driver_detail.class.php',
        'DriverEdit' => __DIR__ . '/../..' . '/views/driver/edit/driver_edit.class.php',
        'DriverIndex' => __DIR__ . '/../..' . '/views/driver/index/driver_index.class.php',
        'DriverIndexView' => __DIR__ . '/../..' . '/views/driver/driver_index_view.class.php',
        'DriverModel' => __DIR__ . '/../..' . '/models/driver/driver_model.class.php',
        'HomeController' => __DIR__ . '/../..' . '/controllers/home_controller.class.php',
        'Index' => __DIR__ . '/../..' . '/views/index/index.class.php',
        'IndexView' => __DIR__ . '/../..' . '/views/index_view.class.php',
        'Login' => __DIR__ . '/../..' . '/views/user/login/login.class.php',
        'Logout' => __DIR__ . '/../..' . '/views/user/logout/logout.class.php',
        'ProfileView' => __DIR__ . '/../..' . '/views/user/profile/profile_view.class.php',
        'Register' => __DIR__ . '/../..' . '/views/user/register/register.class.php',
        'Reset' => __DIR__ . '/../..' . '/views/user/reset/reset.class.php',
        'ResetConfirm' => __DIR__ . '/../..' . '/views/user/reset/reset_confirm.php',
        'ResultView' => __DIR__ . '/../..' . '/views/driver/search/result_view.class.php',
        'Team' => __DIR__ . '/../..' . '/models/team/team.class.php',
        'TeamController' => __DIR__ . '/../..' . '/controllers/team_controller.class.php',
        'TeamModel' => __DIR__ . '/../..' . '/models/team/team_model.class.php',
        'TeamView' => __DIR__ . '/../..' . '/views/team/index/team_view.class.php',
        'User' => __DIR__ . '/../..' . '/models/users/user.class.php',
        'UserController' => __DIR__ . '/../..' . '/controllers/user_controller.class.php',
        'UserError' => __DIR__ . '/../..' . '/views/error/user_error.class.php',
        'UserModel' => __DIR__ . '/../..' . '/models/users/user_model.class.php',
        'Verify' => __DIR__ . '/../..' . '/views/user/login/verify.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit121436999bb9b3c836c61b7ae444eb4d::$classMap;

        }, null, ClassLoader::class);
    }
}
