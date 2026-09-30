<?php
$array_ids = $modx->getParentIds($modx->resource->id,6,array('context' => 'web'));
if (in_array(3, $array_ids)) { // это по любому города. здесь может быть главная страница города и ее вложенные
    if(count($array_ids) > 2) { // это вложенные страницы города
        $servicesParent =  $array_ids[count($array_ids) -3]; 
    }else if(count($array_ids) == 2){ // это главная страница города
        $servicesParent =  $modx->resource->id;
    }
}else if (in_array(0, $array_ids)) {
    $servicesParent = 1;
}
return $servicesParent;
/****** 
Потом в head делаешь 
{var $city_id = $_modx->runSnippet("mainParent", [])}
{var $copyResource = $_modx->resource.idContent}
и получаешь поля города
Города лежат в одной плоскости с главной страницей
*******/
