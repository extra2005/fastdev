<?php
#Настройка маршрутизатора

#Публичная часть
$LK->route(array('GET /'), 'controllers\controller_public->action_index'); //Главная (Личный кабинет)
$LK->route(array('GET|POST /@name'), 'controllers\controller_public->@name');
$LK->route(array('GET|POST /public/@name'), 'controllers\controller_public->text');//Текстовые страницы
$LK->route(array('GET /news_@id'), 'controllers\controller_public->news_id'); //Публичные новости
$LK->route(array('GET|POST /window/@name'), 'controllers\controller_window->@name');
$LK->route(array('GET /window/@name/@id'), 'controllers\controller_window->@name');
$LK->route(array('GET /window/@name/@id/@date'), 'controllers\controller_window->@name');
$LK->route(array('GET|POST /rbkapi'), 'controllers\controller_public->notification_rbk');

#Приватная часть
$LK->route(array('GET|POST /private'), 'controllers\controller_private->action_index'); //Личный кабинет абонента частного лица
$LK->route(array('GET|POST /private/@name'), 'controllers\controller_private->@name');
$LK->route(array('GET|POST /private/@name/@id'), 'controllers\controller_private->@name');
$LK->route(array('GET /private/news_@id'), 'controllers\controller_private->news_id');

#Административная часть
$LK->route(array("GET|POST /" . $LK->get('AdminPanel.URLPrefix') . "admin"), 'controllers\controller->loginAdmin'); //Страница ввода логина пароля администратора
$LK->route(array("GET /" . $LK->get('AdminPanel.URLPrefix') . "admin/logoutAdmin"), 'controllers\controller->logoutAdmin'); //выход администратора
//$LK->route(array("POST /".$LK->get('AdminPanel.URLPrefix')."admin/favorites_add"), 'controllers\controller_admin->FavoritesAdd'); //кнопка избранное
$LK->route(array("GET|POST /" . $LK->get('AdminPanel.URLPrefix') . "admin/@name"), 'controllers\controller_admin->@name');
$LK->route(array("GET|POST /" . $LK->get('AdminPanel.URLPrefix') . "admin/@name/@id"), 'controllers\controller_admin->@name');
$LK->route(array("GET|POST /" . $LK->get('AdminPanel.URLPrefix') . "admin/@name/@name2/@id"), 'controllers\controller_admin->@name');
#Другие URL
//$LK->set('ONERROR',function($LK){ \FlashMessage::instance()->addMessage("Ошибка ".$LK->get('ERROR.code').""); $LK->reroute('/');}); // Страница ошибок

$LK->set('ONERROR', function ($LK) {
      $db = new \models\Model_DB();
       $db->setconfig();
		   $logger = new \Log($LK->get('ErrorLogFile'));
           $logger->write("\r\n\r\nCode:" . $LK->get('ERROR.code') ."\r\n". $LK->get('ERROR.text')."\r\n");
            \FlashMessage::instance()->msg($LK->get('ERROR.code'), '/logout'); 
}); // Страница ошибок 
