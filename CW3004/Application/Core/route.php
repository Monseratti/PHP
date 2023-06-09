<?php
class Route{
    static function start(){
        // контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		
		// $routes = explode('/', $_SERVER['REQUEST_URI']);

		// // получаем имя контроллера
		// if ( !empty($routes[1]) )
		// {	
		// 	$controller_name = $routes[1];
		// }
		
		// // получаем имя экшена
		// if ( !empty($routes[2]) )
		// {
		// 	$action_name = $routes[2];
		// }

		// добавляем префиксы
		// $model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;
        
        // подцепляем файл с классом модели (файла модели может и не быть)

		// $model_file = strtolower($model_name).'.php';
		// $model_path = "application/models/".$model_file;
		// if(file_exists($model_path))
		// {
		// 	include "application/models/".$model_file;
		// }

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "Application/Controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include $controller_path;
			$controller_main = new Controller_Main();
			$controller_main->action_index();
		}
		else
		{
			Route::error();
		}
    }
    static function error(){
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}
?>