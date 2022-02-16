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
	<article>
		<div class="article-breadcrumbs">
			<a href="/">Главная</a>
			<a href="/routes.html">Маршруты</a>
		</div>
		<h1>Маршруты</h1>
		<h2> <b>Прогуляйся по&nbsp;городским улицам</b> <br>
			<i> или отправляйся в&nbsp;поход.</i> <b>Урал разный</b> <br>
			<i> и&nbsp;здесь найдется место для каждого&nbsp;—</i> <br>
			<b>выбирай маршрут и&nbsp;в&nbsp;путь.</b>
		</h2>
		<div class="article-container">
			<div class="article-icons">
				<div class="article-icons__icon active" id="icon-list">
					<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 3C3.22386 3 3 3.22386 3 3.5V10.5C3 10.7761 3.22386 11 3.5 11H10.5C10.7761 11 11 10.7761 11 10.5V3.5C11 3.22386 10.7761 3 10.5 3H3.5ZM13.5 3C13.2239 3 13 3.22386 13 3.5V10.5C13 10.7761 13.2239 11 13.5 11H20.5C20.7761 11 21 10.7761 21 10.5V3.5C21 3.22386 20.7761 3 20.5 3H13.5ZM3 13.5C3 13.2239 3.22386 13 3.5 13H10.5C10.7761 13 11 13.2239 11 13.5V20.5C11 20.7761 10.7761 21 10.5 21H3.5C3.22386 21 3 20.7761 3 20.5V13.5ZM13.5 13C13.2239 13 13 13.2239 13 13.5V20.5C13 20.7761 13.2239 21 13.5 21H20.5C20.7761 21 21 20.7761 21 20.5V13.5C21 13.2239 20.7761 13 20.5 13H13.5Z">
						</path>
					</svg>
				</div>
				<div class="article-icons__icon" id="icon-map">
					<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M20.5 3L20.34 3.03L15 5.1L9 3L3.36 4.9C3.15 4.97 3 5.15 3 5.38V21.25C3 21.53 3.22 21.75 3.5 21.75L3.66 21.72L9 19.65L15 21.75L20.64 19.85C20.85 19.78 21 19.6 21 19.37V3.5C21 3.22 20.78 3 20.5 3ZM15 19.75L9 17.64V5L15 7.11V19.75Z">
						</path>
					</svg>
				</div>
			</div>
			<div class="article-tags hidden-on-some-time">
				<div class="article-tags__wrapper">
					<div class="article-tags__tag">
						С детьми
					</div>
					<div class="article-tags__tag">
						18+
					</div>
					<div class="article-tags__tag">
						Городские
					</div>
					<div class="article-tags__tag">
						На 1–3 часа
					</div>
					<div class="article-tags__tag">
						На день и больше
					</div>
				</div>
			</div>
		</div>
	</article>



	<section class="routes">
		<? if (count($arResult["ITEMS"]) > 0) : ?>
			<? foreach ($arResult["ITEMS"] as $arItem) : ?>

				<div class="route">
					<div class="route-image-wrapper">
						<div class="route-image-wrapper__inner">
							<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" />
						</div>

						<div class="route-image-wrapper__favorite">
							<svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 0L14.6942 8.2918H23.4127L16.3593 13.4164L19.0534 21.7082L12 16.5836L4.94658 21.7082L7.64074 13.4164L0.587322 8.2918H9.30583L12 0Z" fill="white">
								</path>
							</svg>
						</div>
					</div>


					<div class="route-label-wrapper">
						<? if ($arItem['PROPERTIES']["UF_LABEL_IMAGE"]) : ?>
							<? $i = $arItem['PROPERTIES']["UF_LABEL_IMAGE"] ?>
							<? switch ($i["VALUE_ENUM"]) {
								case 'ЗОЖ':
									echo "<img src='/img/ZOJ.svg' />";
									break;
								case 'Чисто наше':
									echo "<img src='/img/OUR.svg' />";
									break;
								case 'Сурово':
									echo "<img src='/img/HARD.svg' />";
									break;
								case 'Бери детей':
									echo "<img src='/img/KIDS.svg' />";
									break;
								case 'Тут баско':
									echo "<img src='/img/BASKO.svg' />";
									break;
								case 'Супер арт':
									echo "<img src='/img/ART.svg' />";
									break;
								case '18+':
									echo "<img src='/img/18+.svg' />";
									break;
							} ?>

						<? endif; ?>
					</div>


					<div class="route-text">
						<h2><span><?= $arItem["NAME"] ?></span></h2>
						<span><?= $arItem["PREVIEW_TEXT"] ?></span>
					</div>

					<a class="route-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"></a>
				</div>
			<? endforeach; ?>

		<? else : ?>
			<h5>Маршруты не найдены!</h5>
		<? endif; ?>
	</section>
</div>

<? /* echo '<pre>';
print_r($arResult["ITEMS"]);
echo '</pre>'; */ ?>


<?
/* $iterator = CIBlockElement::GetList(
	array(),
	array('IBLOCK_ID' => 1, "ID" => $arResult["DISPLAY_PROPERTIES"]["UF_PLACES"]["VALUE"]),
	false,
	false,
	array('ID', "IBLOCK_ID", "PREVIEW_PICTURE", 'NAME', 'PREVIEW_TEXT', 'CODE', 'PROPERTY_UF_GEOLOCATION')
);

while ($i = $iterator->Fetch()) {
	$previewPic = CFile::GetFileArray($i["PREVIEW_PICTURE"]);
	$previewSrc = $previewPic["SRC"]; */
?>
</div>
<?/*  }  */ ?>



<div class="map hidden">
	<div class="map-cards">
		<? if (count($arResult["ITEMS"]) > 0) : ?>
			<? foreach ($arResult["ITEMS"] as $arItem) : ?>
				<div class="map-cards__div">
					<div class="map-cards-wrapper">
						<div class="map-cards__image">

							<img class="map-cards__image-img" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" />
							<? $iterator = CIBlockElement::GetList(
								array(),
								array('IBLOCK_ID' => 1, "ID" => $arItem["DISPLAY_PROPERTIES"]["UF_PLACES"]["VALUE"]),
								false,
								false,
								array('ID', "IBLOCK_ID", "PREVIEW_PICTURE", 'NAME', 'PREVIEW_TEXT', 'CODE', 'PROPERTY_UF_GEOLOCATION')
							);

							while ($i = $iterator->Fetch()) {
								$previewPic = CFile::GetFileArray($i["PREVIEW_PICTURE"]);
								$previewSrc = $previewPic["SRC"];
							?>
								<div hidden class="coordinates"><?= $i["PROPERTY_UF_GEOLOCATION_VALUE"] ?></div>
								<div hidden class="images"><?= $previewSrc ?></div>
								<div hidden class="names"><?= $i["NAME"] ?></div>
							<? } ?>
							<div class="map-cards__image-label">
								<? if ($arItem['PROPERTIES']["UF_LABEL_IMAGE"]) : ?>
									<? $i = $arItem['PROPERTIES']["UF_LABEL_IMAGE"] ?>
									<? switch ($i["VALUE_ENUM"]) {
										case 'ЗОЖ':
											echo "<img src='/img/ZOJ.svg' />";
											break;
										case 'Чисто наше':
											echo "<img src='/img/OUR.svg' />";
											break;
										case 'Сурово':
											echo "<img src='/img/HARD.svg' />";
											break;
										case 'Бери детей':
											echo "<img src='/img/KIDS.svg' />";
											break;
										case 'Тут баско':
											echo "<img src='/img/BASKO.svg' />";
											break;
										case 'Супер арт':
											echo "<img src='/img/ART.svg' />";
											break;
										case '18+':
											echo "<img src='/img/18+.svg' />";
											break;
									} ?>

								<? endif; ?>
							</div>
						</div>

						<div hidden class="detail-url"><?= $arItem["DETAIL_PAGE_URL"] ?></div>

						<div class="map-cards__description">
							<div class="map-cards__description-title"><?= $arItem["NAME"] ?></div>
							<div class="map-cards__description-text"><?= $arItem["PREVIEW_TEXT"] ?></div>
							<div class="map-cards__description-tags">
								<div class="map-cards__description-tags--tag">
									<? $placesCount = count($arItem["DISPLAY_PROPERTIES"]["UF_PLACES"]["VALUE"]);
									if ($placesCount === 2 or $placesCount === 3 or $placesCount === 4) :
										echo ($placesCount . ' места');
									else :
										echo ($placesCount . ' мест');
									endif; ?>
								</div>
								<div class="map-cards__description-tags--tag"><?= $arItem["PROPERTIES"]["UF_HOURS"]["VALUE"] ?></div>
								<div class="map-cards__description-tags--tag"><?= $arItem["PROPERTIES"]["UF_ROUTE"]["VALUE"] ?></div>
							</div>
						</div>
					</div>
				</div>
			<? endforeach; ?>

		<? else : ?>
			<h5>Маршруты не найдены!</h5>
		<? endif; ?>
	</div>

	<div class="map__map">
		<a class="map__map-title"></a>
		<div class="map__map-main"></div>
	</div>
</div>


<div class="container">
	<div class="subscribe">
		<div class="subscribe-left">
			<form action="#">
				<div class="subscribe-wrapper-inner">
					<div class="subscribe-wrapper-inner__inner">
						<h5> <b>
								Подпишись <br>
								на рассылку </b> <i> — мы<br>
								расскажем о новых местах и маршрутах </i> </h5>
						<div class="subscribe-form">
							<div class="subscribe-form-input">
								<input type="text" id="E-mail" placeholder="E-mail" value="" name="email">
								<div class="subscribe-form-input-error">
								</div>
							</div>
							<button type="submit">Подписаться</button>
						</div>
						<div class="subscribe-legal">
							Нажимая «Подписаться», вы соглашаетесь с <a href="/policy.pdf" rel="noopener noreferrer" target="_blank">условиями обработки персональных данных</a>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="subscribe-right">
			<div class="tell-about">
				<div class="tell-about-inner">
					<div class="tell-about__image">
						<div class="tell-about__image-img">
							<img src="/img/tell-about.png">
						</div>
					</div>
					<h5>Расскажи <br>
						<i>о&nbsp;своих</i><br>
						уральских местах
					</h5>
					<div class="tell-about__line">
					</div>
				</div>
				<a href="/addplace"></a>
			</div>
		</div>
	</div>
</div>


<script src="/js/routesJs.js"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGP_eCnEh9CeAyCUg6k0B190eYdWk0Bjc&callback=initMap&v=weekly"></script>