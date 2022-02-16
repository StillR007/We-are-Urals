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


<div class="top-places__small">
	<div class="top-places__small-wrapper">
		<? if (count($arResult["ITEMS"]) > 0) : ?>

			<? $counter = 0; ?>

			<? foreach ($arResult["ITEMS"] as $arItem) : ?>

				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<? $counter++; ?>
				<? if (($counter === 1) or ($counter === 2)) : ?>
					<? continue; ?>
				<? else : ?>
					<div class="top-place">
						<div class="place-image-wrapper">
							<div class="place-image-wrapper__inner">
								<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])) : ?>
									<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])) : ?>
										<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" />
									<? endif ?>
								<? endif; ?>
							</div>

							<? if ($counter === 6) : ?>
								<div class="place-image-wrapper__svg">
									<svg fill="none" stroke="#FCAF26" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 297 223">
										<path d="M51.12 101.55l32.43 20 32.42-20 32.43 20 32.42-20 32.43 20 32.43-20" stroke-width="16" stroke-miterlimit="10"></path>
									</svg>
								</div>
							<? endif; ?>
							<? if ($counter === 7) : ?>
								<div class="place-image-wrapper__svg">
									<svg fill="none" stroke="#FF7B1B" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 297 223">
										<path d="M51.12 101.55l32.43 20 32.42-20 32.43 20 32.42-20 32.43 20 32.43-20" stroke-width="16" stroke-miterlimit="10"></path>
									</svg>
								</div>
							<? endif; ?>
							<? if ($counter === 9) : ?>
								<div class="place-image-wrapper__svg">
									<svg fill="none" stroke="#82CA9C" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 296 222">
										<path d="M79.5 125h139M79.5 148h139" stroke="#82CA9C" stroke-width="16"></path>
									</svg>
								</div>
							<? endif; ?>

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
								<a class="top-place-link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"></a>
							<? endif; ?>
						<? endif; ?>
					</div>
				<? endif; ?>


			<? endforeach; ?>

		<? else : ?>
			<h5>Не найдено топ-мест с 3 по 10!</h5>
		<? endif; ?>
	</div>
</div>

</section>


<div class="subscribe">
	<div class="subscribe-left">
		<form action="#">
			<div class="subscribe-wrapper-inner">
				<div class="subscribe-wrapper-inner__inner">
					<h5>
						<b>
							Подпишись <br />
							на рассылку
						</b>
						<i> — мы<br />
							расскажем о новых местах
							и маршрутах
						</i>
					</h5>
					<div class="subscribe-form">
						<div class="subscribe-form-input">
							<input type="text" id="E-mail" placeholder="E-mail" value="" name="email" />
							<div class="subscribe-form-input-error"></div>
						</div>
						<button type="submit">Подписаться</button>
					</div>
					<div class="subscribe-legal">
						Нажимая «Подписаться», вы соглашаетесь с
						<a href="/policy.pdf" rel="noopener noreferrer" target="_blank">условиями обработки персональных
							данных</a>
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
						<img src="img/tell-about.png" />
					</div>
				</div>

				<h5>Расскажи <br><i>о&nbsp;своих</i><br>
					уральских местах
				</h5>

				<div class="tell-about__line">
					<svg width="106" height="21" viewBox="0 0 106 21" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M2 17L19 4L36 17L53 4L70 17L87 4L104 17" stroke="#E6CA1E" stroke-width="6"></path>
					</svg>
				</div>
			</div>

			<a href="/addplace"></a>
		</div>
	</div>
</div>
</div>