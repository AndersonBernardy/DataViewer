// <?php

//     require_once(__DIR__ . "\..\src\model\Database.php");
//     require_once(__DIR__ . "\..\src\model\Permission.php");
//     require_once(__DIR__ . "\..\src\model\PermissionType.php");
//     require_once(__DIR__ . "\..\src\model\Profile.php");
//     require_once(__DIR__ . "\..\src\model\Server.php");
//     require_once(__DIR__ . "\..\src\model\ServerType.php");
//     require_once(__DIR__ . "\..\src\model\User.php");

    
    
    
    
//     $serverType = new ServerType("mysql");
    
//     $server = new Server("localhost", "root", "", $serverType, 3306);
    
//     $database = new Database("Pessoa", $server);
    
//     $permissionType = new PermissionType("admin");
    
//     $permission = new Permission($database, $permissionType);
    
//     $profile = new Profile("admin");
    
//     $user = new User($profile, "Login");
//     $user->addPermission($permission);
    
    
//     echo $serverType . "<br>";
//     echo $server . "<br>";
//     echo $database . "<br>";
//     echo $permissionType . "<br>";
//     echo $permission . "<br>";
//     echo $profile . "<br>";
//     echo "_______________________________________________________________________________________<br><br>";
//     echo $user . "<br>";

// ?>