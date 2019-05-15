<?
	//sp - фасад для вызова sellPlus v3
	//lg,md,sm - создание ячейки для разных устройств (1,"1-6") где 1 это первая строка 1-6 это объединение ячеек с 1-6, всего ячеек в строке всегда 12.   
	
	//Пример 1 шапка с формой поиска и с меню
	//logo
	sp::lg(1,"1-3")->img($patch);
	sp::sm(1,"1-12")->img($patch);
	//search
	sp::lg(1,"4-10")->form(array("input,hidden,name='test',val='1'","input,text,name='search',val='поиск'"));
	sp::sm(2,"1-12")->form(array("input,hidden,name='test',val='1'","input,text,name='search',val='поиск'"));
	//soc
	sp::lg(1,"11-12")->lg(1,"1-6")->img($patch);
	sp::lg(1,"11-12")->lg(1,"6-12")->img($patch);
	//menu
	sp::lg(2,"1-12")->menu_horizontal(array("name1"=>"link","name2"=>"link","name3"=>"link",));
	sp::sm(3,"1-12")->menu_vertical(array("name1"=>"link","name2"=>"link","name3"=>"link",));
	
	sp::container->lg(array(1,2,3),"slideRight");//для возможности группировки строк (1,2,3....) и наложения анимации например slideRight
	sp::render();//Преобразует sp в bootstrap html код
	
	
	//Пример 2 размещение картинок в шахмотном порядке
	sp::lg(1,"1-6")->img($patch);
	sp::lg(2,"6-12")->img($patch);
	sp::lg(3,"1-6")->img($patch);
	sp::lg(4,"6-12")->img($patch);
	
	
	//Пример 3 шаблон по принцыпу админки, первая вертикальная колонка с меню и вторая большая колонка с контентом 
	sp::lg(1,"1-2")->lg(1,"1-12")->img($patch);//logo
	sp::lg(1,"1-2")->lg(2,"1-12")->menu_vertical(array("name1"=>"link","name2"=>"link","name3"=>"link"));
	sp::lg(1,"3-12")->lg(1,"1-12")->html($html);
	sp::lg(1,"3-12")->lg(2,"1-12")->html($html);
	sp::lg(1,"3-12")->lg(3,"1-12")->html($html);