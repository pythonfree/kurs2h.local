<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>

<?php
global $APPLICATION;

if(!CModule::IncludeModule("iblock")) {
    $APPLICATION->throwException('Ошибка загрузки модуля iblock');
    return false;
}
$res = CIBlockElement::GetByID(44);
if($ar_res = $res->GetNext()) {
    dump($ar_res);die;
//    if (intval($ar_res["SHOW_COUNTER"]) >= 1) {
//        //деактивируем товар по заданию
//        $el = new CIBlockElement;
//        $arLoadProductArray = ["ACTIVE" => "N"];
//        if (!$el->Update(intval($ar_res['ID']), $arLoadProductArray)) {
//            $APPLICATION->throwException("Ошибка деактивации товара с ID = {$ar_res['ID']}");
//            return false;
//        };
//    }
}
?>


<?php
/*
if (!CModule::IncludeModule('iblock')) {
    die('Ошибка загрузки модуля iblock');
};

//Получаем Активные акции с истекшей датой активности
$arSelect = ["ID", "NAME", "DATE_ACTIVE_FROM", 'DATE_ACTIVE_TO'];
$arFilter = [
    'IBLOCK_ID' => 5, //Акции
    "!ACTIVE_DATE" => "Y", //магия!  Чтобы выбрать все не активные по датам элементы, используется такой синтаксис
    "ACTIVE" => "Y"
];
$BDRes = CIBlockElement::GetList(false, $arFilter, false, false, $arSelect);
$arResult['FINISHED_ACTIONS'] = [];
while ($finishedActionsCount = $BDRes->GetNext()) {
    $arResult['FINISHED_ACTIONS'][$finishedActionsCount['ID']] = $finishedActionsCount;
}
//Получаем Активные акции с истекшей датой активности


//Изменяем активность для акции с истекшей датой активности
if (!empty($arResult['FINISHED_ACTIONS'])) {
    foreach ($arResult['FINISHED_ACTIONS'] as $Id => $action) {
        $el = new CIBlockElement;
        if (!($res = $el->Update($Id, ["ACTIVE" => "N"]))) {
            echo $el->LAST_ERROR;
        } else {
            echo 'Акция c ID - ' . $Id . ' деактивирована.<br>';
        }
    }
}
//Изменяем активность для акции с истекшей датой активности


//Получаем количество акций с истекшей датой активности
$arSelect = ["ID", "NAME", "DATE_ACTIVE_FROM", 'DATE_ACTIVE_TO'];
$arFilter = [
    'IBLOCK_ID' => 5, //Акции
    "!ACTIVE_DATE" => "Y", //магия!  Чтобы выбрать все не активные по датам элементы, используется такой синтаксис
];
$BDRes = CIBlockElement::GetList(false, $arFilter, false, false, $arSelect);
$finishedActionsCount = intval($BDRes->SelectedRowsCount());
//Получаем количество акций с истекшей датой активности

if ($finishedActionsCount > 0) {
    if (!CModule::IncludeModule('main')) {
        die('Ошибка загрузки модуля main');
    };

    //запись в журнал событий
    CEventLog::Add([
        'SEVERITY' => 'INFO',
        'AUDIT_TYPE_ID' => 'CHECK_FINISHED_ACTIONS',
        'MODULE_ID' => 'iblock',
        'ITEM_ID' => '',
        'DESCRIPTION' => 'Проверка акций, в наличии - ' . $finishedActionsCount . ' окончившихся акций.',
    ]);

    //письмо администратору
    $filter = [
        "GROUPS_ID" => [1] //группа администраторов
    ];
    $rsUsers = CUser::GetList(($by = "personal_country"), ($order = "desc"), $filter);
    $arEmail = [];
    while ($arUser = $rsUsers->GetNext()) {
        $arEmail[] = $arUser['EMAIL'];
    }

    if (count($arEmail)) {
        $arEventFields = [
            'TEXT' => $finishedActionsCount,
            'EMAIL' => implode(', ', $arEmail),
        ];
        CEvent::Send("CHECK_ACTIONS", SITE_ID, $arEventFields);
    }
}*/

?>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>