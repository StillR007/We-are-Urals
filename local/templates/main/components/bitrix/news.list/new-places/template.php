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
	<div class="breadcrumbs">
		<a href="/">Главная</a>
		<a href="">Новые места и маршруты</a>
	</div>
	<h1> <i>Новые</i> <b>места</b> </h1>
	<section class="places">
		<? if ($arParams["DISPLAY_TOP_PAGER"]) : ?>
			<?= $arResult["NAV_STRING"] ?><br />
		<? endif; ?>

		<? if (count($arResult["ITEMS"]) > 0) : ?>
			<? foreach ($arResult["ITEMS"] as $arItem) : ?>

				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
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
	</section>
	<div class="main-link">
		<a href="/places">Все места</a>
	</div>
	<div class="broken-wrapper">
		<svg width="251" height="45" viewBox="0 0 251 45" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M25.9449 28.3748C18.2706 21.2815 12.4117 16 0 16V0C18.8209 0 28.6438 9.0806 36.6243 16.458L36.8051 16.6252C44.4794 23.7185 50.3383 29 62.75 29C75.1617 29 81.0206 23.7185 88.6949 16.6252L88.8757 16.458C96.8562 9.08061 106.679 0 125.5 0C144.321 0 154.144 9.08062 162.124 16.458L162.305 16.6252C169.979 23.7185 175.838 29 188.25 29C200.662 29 206.521 23.7186 214.195 16.6252L214.376 16.458C222.356 9.0806 232.179 0 251 0V16C238.588 16 232.729 21.2815 225.055 28.3748L224.874 28.542C216.894 35.9194 207.071 45 188.25 45C169.429 45 159.606 35.9194 151.626 28.542L151.445 28.3748C143.771 21.2815 137.912 16 125.5 16C113.088 16 107.229 21.2815 99.5551 28.3748L99.3743 28.542C91.3938 35.9194 81.5709 45 62.75 45C43.9291 45 34.1062 35.9194 26.1257 28.542C26.0653 28.4862 26.005 28.4305 25.9449 28.3748Z" fill="#FCAF26"></path>
		</svg>
	</div>