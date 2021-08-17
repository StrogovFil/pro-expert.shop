<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$res = CIBlockSection::GetList(
	array(),
	array('IBLOCK_ID' => $arParams["IBLOCK_ID"], 'CODE' => $arResult["VARIABLES"]["SECTION_CODE"]),
	false,
	array('ID', 'IBLOCK_ID', 'CODE', 'IBLOCK_SECTION_ID', 'NAME', 'PICTURE', 'DESCRIPTION', 'DESCRIPTION_TYPE', 'DETAIL_PICTURE')
);

$arIBlock = $res->Fetch();

if ($arIBlock["PREVIEW_PICTURE"])
{
	$dbIBlockPicture = CFile::GetByID($arIBlock["PREVIEW_PICTURE"]);
	$arIBlockPicture = $dbIBlockPicture->GetNext();
	$pathIblockPicture = CFile::GetPath($arIBlock["PREVIEW_PICTURE"]);
}

$cnt = CIBlockSection::GetSectionElementsCount($arIBlock['ID']);
?>

<?if($arParams["USE_RSS"]=="Y"):?>
	<?
	$rss_url = CComponentEngine::makePathFromTemplate($arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss_section"], array_map("urlencode", $arResult["VARIABLES"]));
	if(method_exists($APPLICATION, 'addheadstring'))
		$APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$rss_url.'" href="'.$rss_url.'" />');
	?>
	<a href="<?=$rss_url?>" title="rss" target="_self"><img alt="RSS" src="<?=$templateFolder?>/images/gif-light/feed-icon-16x16.gif" border="0" align="right" /></a>
<?endif?>

<?if($arParams["USE_SEARCH"]=="Y"):?>
<?=GetMessage("SEARCH_LABEL")?><?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"flat",
	Array(
		"PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"]
	),
	$component
);?>
<?endif?>
<section class="page catalog">
        <div class="topblock articles-top">
			<?if ($arIBlock["PICTURE"]):?>
            <div class="topblock-pic" style="background-image: url('<?=$pathIblockPicture?>');">
                <img src="<?=$pathIblockPicture?>" width="<?=$arIBlockPicture['WIDTH']?>" height="<?=$arIBlockPicture['HEIGHT']?>" alt="">
            </div>
			<?else:?>
			<div class="topblock-pic"></div>
			<?endif?>
            <div class="topblock-content">
                <div class="topblock-content-inner">
                    <div class="topblock-header">
                        <div class="h3 topblock-title"><?=$arIBlock['NAME']?></div>
                        <div class="topblock-header-note">Всего <?=$cnt?></div>
                    </div>
                    <div class="topblock-text"><?=$arIBlock['DESCRIPTION']?></div>
                </div>
            </div>
        </div>
<?if($arParams["USE_FILTER"]=="Y"):/*?>
		<div class="catalog-items-bordered container">
            <div class="filters">
                <div class="filters-options">
                    <div class="filters-options-item">
                        <a href="">Тип помещения <i class="icon icon-dropdown"></i></a>
                    </div>
                    <div class="filters-options-item">
                        <a href="">Тип комнаты <i class="icon icon-dropdown"></i></a>
                    </div>
                </div>
            </div>
	<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.filter",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
	),
	$component
);*/
?>
<?endif?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],
		"SORT_BY1" => $arParams["SORT_BY1"],
		"SORT_ORDER1" => $arParams["SORT_ORDER1"],
		"SORT_BY2" => $arParams["SORT_BY2"],
		"SORT_ORDER2" => $arParams["SORT_ORDER2"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],
		"PARENT_SECTION" => $arIBlock['ID'],
		"PARENT_SECTION_CODE" => $arIBlock['CODE'],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
	),
	$component
);?>
</div>
    </section>
<?
$dbSection = CIBlockSection::GetByID(663);

if ($arSection = $dbSection->GetNext()):
	$sectCnt = CIBlockSection::GetSectionElementsCount($arSection['ID']);
?>
<section class="bottomblock" data-bleed="100" data-parallax="scroll" data-z-index="1" data-speed="0.5"
             data-image-src="<?=SITE_TEMPLATE_PATH?>/images/bottom-block-1.jpeg "
             style="background-image: url('<?=SITE_TEMPLATE_PATH?>/images/bottom-block-1.jpeg ');">
        <div class="container">
            <div class="h1 bottomblock-title"><?=$arSection['NAME']?></div>
            <div class="bottomblock-note">Всего <?=$sectCnt?></div>
            <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="bottomblock-triangle">
                <i class="icon icon-triangle-down"></i>
            </a>
        </div>
    </section>
<?endif;?>