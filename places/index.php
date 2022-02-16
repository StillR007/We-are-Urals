<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?>


<? $APPLICATION->IncludeComponent(
	"bitrix:news",
	"places",
	array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array("TAGS", "DETAIL_TEXT", "DETAIL_PICTURE", "NAME"),
		"DETAIL_PAGER_SHOW_ALL" => "N",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array("UF_HOW_TO_GET", "UF_SITE", "UF_ADDRESS", "UF_MAIL", "UF_PHONE_1", "UF_PHONE_1_TEXT", "UF_PHONE_2", "UF_PHONE_2_TEXT", "UF_OK", "UF_INST", "UF_FB", "UF_YT", "UF_TW", "UF_TG", "UF_MAIN_TEXT", "UF_FRESH", "UF_GEOLOCATION"),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "Places",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array("NAME", "DETAIL_TEXT", "DETAIL_PICTURE", "TAGS"),
		"LIST_PROPERTY_CODE" => array("UF_LABEL_IMAGE", "UF_GEOLOCATION"),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "999999999",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "0",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/places/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => array("detail" => "#ELEMENT_CODE#/", "news" => "", "section" => ""),
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N"
	),
	false,
	array(
		'ACTIVE_COMPONENT' => 'Y'
	)
); ?>



<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>