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


<link rel="stylesheet" href="/css/placesCSS.min.css" />


<div class="container">
	<article>
		<h1>Места</h1>
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
			<div class="article-tags">
				<div class="article-tags__wrapper">
					<? if (!$_GET["show"]) { ?>
						<a class="article-tags__tag active" href="/places/?clear_cache=Y">
						<? } else { ?>
							<a class="article-tags__tag" href="/places/?clear_cache=Y">
							<? } ?>
							Все места
							</a>

							<? if ($_GET["show"] == "history") { ?>
								<? $filterTag = 'История' ?>
								<a class="article-tags__tag active" href="/places/?show=history&clear_cache=Y">
								<? } else { ?>
									<a class="article-tags__tag" href="/places/?show=history&clear_cache=Y">
									<? } ?>
									История
									</a>

									<? if ($_GET["show"] == "art") { ?>
										<? $filterTag = 'Арт' ?>
										<a class="article-tags__tag active" href="/places/?show=art&clear_cache=Y">
										<? } else { ?>
											<a class="article-tags__tag" href="/places/?show=art&clear_cache=Y">
											<? } ?>
											Арт
											</a>

											<? if ($_GET["show"] == "legends") { ?>
												<? $filterTag = 'Легенды Урала' ?>
												<a class="article-tags__tag active" href="/places/?show=legends&clear_cache=Y">
												<? } else { ?>
													<a class="article-tags__tag" href="/places/?show=legends&clear_cache=Y">
													<? } ?>
													Легенды Урала
													</a>


													<? if ($_GET["show"] == "eat") { ?>
														<? $filterTag = 'Поесть' ?>
														<a class="article-tags__tag active" href="/places/?show=eat&clear_cache=Y">
														<? } else { ?>
															<a class="article-tags__tag" href="/places/?show=eat&clear_cache=Y">
															<? } ?>
															Поесть
															</a>

															<? if ($_GET["show"] == "stroll") { ?>
																<? $filterTag = 'Прогулки' ?>
																<a class="article-tags__tag active" href="/places/?show=stroll&clear_cache=Y">
																<? } else { ?>
																	<a class="article-tags__tag" href="/places/?show=stroll&clear_cache=Y">
																	<? } ?>
																	Прогулки
																	</a>


																	<? if ($_GET["show"] == "sport") { ?>
																		<? $filterTag = 'Спорт' ?>
																		<a class="article-tags__tag active" href="/places/?show=sport&clear_cache=Y">
																		<? } else { ?>
																			<a class="article-tags__tag" href="/places/?show=sport&clear_cache=Y">
																			<? } ?>
																			Спорт
																			</a>

																			<? if ($_GET["show"] == "shop") { ?>
																				<? $filterTag = 'Шопинг' ?>
																				<a class="article-tags__tag active" href="/places/?show=shop&clear_cache=Y">
																				<? } else { ?>
																					<a class="article-tags__tag" href="/places/?show=shop&clear_cache=Y">
																					<? } ?>
																					Шопинг
																					</a>
				</div>
			</div>
		</div>
	</article>

	<section class="places">

		<? switch ($_GET["show"]) {
			case "":
			case "all":
				$filteredResult = $arResult["ITEMS"];
				break;
			case "history":
			case "art":
			case "legends":
			case "eat":
			case "stroll":
			case "sport":
			case "shop":
				$filteredResult = [];
				foreach ($arResult["ITEMS"] as $place) {
					$placeArr = explode(", ", $place["TAGS"]);
					if (in_array($filterTag, $placeArr)) {
						array_push($filteredResult, $place);
					};
				}
				break;
		} ?>

		<? if (count($filteredResult) > 0) : ?>
			<? foreach ($filteredResult as $arItem) :
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>

				<div class="place">
					<div class="place-image-wrapper">
						<div class="place-image-wrapper__inner">
							<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" />
						</div>

						<div class="place-image-wrapper__favorite">
							<svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 0L14.6942 8.2918H23.4127L16.3593 13.4164L19.0534 21.7082L12 16.5836L4.94658 21.7082L7.64074 13.4164L0.587322 8.2918H9.30583L12 0Z" fill="white">
								</path>
							</svg>
						</div>
					</div>

					<div class="place-label">

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

					<a class="place-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"></a>
				</div>
			<? endforeach; ?>

		<? else : ?>
			<h5>Места не найдены!</h5>
		<? endif; ?>

	</section>
</div>

<? /* echo '<pre>';
print_r($arResult["ITEMS"]);
echo '</pre>'; */ ?>

<div class="map hidden">
	<div class="map-cards">
		<? if (count($arResult["ITEMS"]) !== 0) : ?>
			<? foreach ($arResult["ITEMS"] as $arItem2) : ?>

				<div class="map-cards-wrapper">
					<div class="map-cards__image">
						<img class="map-cards__image-img" src="<?= $arItem2["PREVIEW_PICTURE"]["SRC"] ?>" />


						<? if ($arItem2['PROPERTIES']["UF_LABEL_IMAGE"]["VALUE_ENUM"]) : ?>
							<div class="map-cards__image-label">
								<? $i = $arItem2['PROPERTIES']["UF_LABEL_IMAGE"] ?>
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
							</div>
						<? endif; ?>

					</div>

					<div class="map-cards__description">
						<div class="map-cards__description-title"><?= $arItem2["NAME"] ?></div>
						<div class="map-cards__description-text"><?= $arItem2["PREVIEW_TEXT"] ?></div>

						<a href="<?= $arItem2["DETAIL_PAGE_URL"] ?>" class="map-cards__div-link">Подробнее</a>
					</div>
				</div>

			<? endforeach; ?>
	</div>

	<? // Вывод координат в консоль 
	?>
	<div hidden>
		<? foreach ($arResult["ITEMS"] as $arItem3) : ?>
			<p class="coordinates">
				<?= $arItem3["PROPERTIES"]["UF_GEOLOCATION"]["VALUE"] ?>
			</p>
		<? endforeach; ?>
	</div>
	<? // Вывод координат в консоль 
	?>


	<div class="map__map">
		<div id="map__map-title"></div>

		<div id="map__map-main">

		</div>
	</div>
<? else : ?>
	<h5>Места не найдены!</h5>
<? endif; ?>

</div>


<script src="/js/placesJs.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGP_eCnEh9CeAyCUg6k0B190eYdWk0Bjc&callback=initMap&v=weekly"></script>