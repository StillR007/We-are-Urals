<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
?>

<div class="container">
	<h3>
		<i>Новые</i>
		<b>места</b>
		<i>и</i>
		<b>маршруты</b>
	</h3>

	<section class="places">

		<div class="places-wrapper">
			<? if (count($arResult["ITEMS"]) > 0) : ?>
				<? foreach ($arResult["ITEMS"] as $arItem) : ?>

					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>


					<? // echo '<pre>';
					// print_r($arItem);
					// echo '</pre>';
					?>

					<div class="place">
						<div class="place-image-wrapper">
							<div class="place-image-wrapper__inner">
								<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])) : ?>
									<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])) : ?>
										<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" />
									<? endif ?>
								<? endif; ?>
							</div>

							<div class="place-image-wrapper__favorite">
								<svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M12 0L14.6942 8.2918H23.4127L16.3593 13.4164L19.0534 21.7082L12 16.5836L4.94658 21.7082L7.64074 13.4164L0.587322 8.2918H9.30583L12 0Z" fill="white">
									</path>
								</svg>
							</div>
						</div>


						<div class="place-label">
							<? if ($arItem['PROPERTIES']["UF_LABEL_IMAGE"]) : ?>
								<? $i = $arItem['PROPERTIES']["UF_LABEL_IMAGE"] ?>
								<? switch ($i["VALUE_ENUM"]) {
									case 'ЗОЖ':
										echo '<div class="place-label-wrapper">';
										echo "<img src='/img/ZOJ.svg' />";
										echo '</div>';
										break;
									case 'Чисто наше':
										echo '<div class="place-label-wrapper">';
										echo "<img src='/img/OUR.svg' />";
										echo '</div>';
										break;
									case 'Сурово':
										echo '<div class="place-label-wrapper">';
										echo "<img src='/img/HARD.svg' />";
										echo '</div>';
										break;
									case 'Бери детей':
										echo '<div class="place-label-wrapper">';
										echo "<img src='/img/KIDS.svg' />";
										echo '</div>';
										break;
									case 'Тут баско':
										echo '<div class="place-label-wrapper">';
										echo "<img src='/img/BASKO.svg' />";
										echo '</div>';
										break;
									case 'Супер арт':
										echo '<div class="place-label-wrapper">';
										echo "<img src='/img/ART.svg' />";
										echo '</div>';
										break;
									case '18+':
										echo '<div class="place-label-wrapper">';
										echo "<img src='/img/18+.svg' />";
										echo '</div>';
										break;
								} ?>

							<? endif; ?>


							<? if ($arItem['PROPERTIES']["UF_FRESH"]["VALUE_ENUM"] === 'Обновлено') {
								echo '<div class="place-label-wrapper">';
								echo "<img src='/img/fresh.svg' />";
								echo '</div>';
							}; ?>

						</div>


						<div class="place-text">
							<h2><span><?= $arItem["NAME"] ?></span></h2>
							<span><?= $arItem["PREVIEW_TEXT"] ?></span>
						</div>

						<? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]) : ?>
							<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])) : ?>
								<a class="place-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"></a>
							<? endif; ?>
						<? endif; ?>
					</div>
				<? endforeach; ?>

			<? else : ?>
				<h5>Места не найдены!</h5>
			<? endif; ?>
		</div>
	</section>