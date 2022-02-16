<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

<link rel="stylesheet" href="/css/placeDetailCSS.min.css" />


<div class="main-screen">
	<div class="container">
		<div class="main-screen-breadcrumbs">
			<a href="/">Главная</a>
			<a href="/places">Места</a>
			<a><?= $arResult["NAME"] ?></a>
		</div>

		<div class="main-screen-inner">
			<h1><?= $arResult["NAME"] ?></h1>
			<? $tags = explode(",", $arResult["TAGS"]); ?>
			<div class="main-screen-inner__tags">
				<div class="main-screen-inner__tags-wrapper">
					<? foreach ($tags as $tags2 => $tag) { ?>
						<? $tag = trim($tag); ?>
						<? switch ($tag) {
							case ("История"):
								$placeTag = "?show=history&clear_cache=Y";
								break;
							case ("Арт");
								$placeTag = "?show=art&clear_cache=Y";
								break;
							case ("Легенды Урала");
								$placeTag = "?show=legends&clear_cache=Y";
								break;
							case ("Поесть");
								$placeTag = "?show=eat&clear_cache=Y";
								break;
							case ("Прогулки");
								$placeTag = "?show=stroll&clear_cache=Y";
								break;
							case ("Спорт");
								$placeTag = "?show=sport&clear_cache=Y";
								break;
							case ("Шопинг");
								$placeTag = "?show=shop&clear_cache=Y";
								break;
						} ?>
						<a href="/places<?= $placeTag ?>"><? echo "#" . $tag ?></a>
					<? } ?>
				</div>
			</div>

			<div class="main-screen-inner__image">
				<img src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= $arResult["NAME"] ?>" />
			</div>

			<div class="main-screen-inner__story">
				<div class="main-screen-inner__story-wrapper">
					<div class="main-screen-inner__story-wrapper-2">


						<img src="/img/tell-a-story.svg" />
						<p>Расскажи историю</p>
					</div>
				</div>
			</div>

			<h3><?= $arResult["PROPERTIES"]["UF_MAIN_TEXT"]["VALUE"] ?></h3>

			<div class="main-screen-inner__buttons">
				<div class="share">
					<img src="/img/share.svg" />
				</div>
				<div class="share-social-wrapper">
					<div class="share-social">
						<? $url = 'https://xn-----8kca8cc4agt0f.xn--p1ai' . $arResult['DETAIL_PAGE_URL']; ?>
						<a href="https://www.facebook.com/sharer.php?u=<?= $url ?>" target="_blank">
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M17.1767 30.88H21.6727V19.9987H24.672L25.0693 16.2493H21.6727L21.6773 14.372C21.6773 13.3947 21.7707 12.87 23.1733 12.87H25.048V9.12H22.048C18.4447 9.12 17.1767 10.9393 17.1767 13.998V16.2493H14.9307V19.9993H17.1767V30.88ZM20 40C8.95467 40 0 31.0453 0 20C0 8.954 8.95467 0 20 0C31.0453 0 40 8.954 40 20C40 31.0453 31.0453 40 20 40Z" fill="#1E4C99"></path>
							</svg>
						</a>
						<a href="http://twitter.com/share?url=<?= $url ?>" target="_blank">
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M22.778 12.1887C21.032 12.824 19.9287 14.4627 20.054 16.256L20.096 16.948L19.3973 16.8633C16.8553 16.5387 14.634 15.4373 12.748 13.5867L11.826 12.6687L11.5887 13.3467C11.086 14.858 11.4073 16.454 12.4547 17.5273C13.0133 18.1207 12.8873 18.2053 11.924 17.852C11.5887 17.7393 11.2953 17.6547 11.2673 17.6967C11.17 17.796 11.5047 19.0807 11.77 19.5893C12.1333 20.296 12.8733 20.9873 13.684 21.3973L14.3687 21.722L13.5587 21.736C12.7767 21.736 12.7487 21.75 12.8327 22.0473C13.112 22.9653 14.2153 23.94 15.4447 24.364L16.3107 24.66L15.5567 25.112C14.4393 25.7627 13.126 26.1293 11.8127 26.1567C11.1833 26.1707 10.6667 26.2273 10.6667 26.27C10.6667 26.4107 12.3713 27.2013 13.3627 27.5127C16.338 28.4307 19.8727 28.0347 22.5267 26.4673C24.4127 25.3513 26.298 23.134 27.1787 20.9867C27.654 19.8433 28.1287 17.7527 28.1287 16.7507C28.1287 16.1007 28.1707 16.016 28.9527 15.2393C29.414 14.7873 29.8467 14.2933 29.9307 14.152C30.0707 13.8833 30.056 13.8833 29.344 14.1233C28.1567 14.5473 27.9887 14.4907 28.576 13.8553C29.0087 13.4033 29.526 12.584 29.526 12.344C29.526 12.302 29.3167 12.372 29.0787 12.4993C28.8273 12.6407 28.2687 12.8527 27.8493 12.9793L27.0953 13.22L26.4107 12.7533C26.0333 12.4993 25.5033 12.2167 25.2233 12.132C24.5107 11.9347 23.4207 11.9627 22.778 12.1887ZM20 40C8.95467 40 0 31.0453 0 20C0 8.954 8.95467 0 20 0C31.0453 0 40 8.954 40 20C40 31.0453 31.0453 40 20 40Z" fill="#00ACEE"></path>
							</svg>
						</a>
						<a href="https://vk.com/share.php?url=<?= $url ?>" target="_blank">
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M20 40C31.0457 40 40 31.0457 40 20C40 8.9543 31.0457 0 20 0C8.9543 0 0 8.9543 0 20C0 31.0457 8.9543 40 20 40ZM29.1357 15C29.8774 15 30.0316 15.3833 29.8774 15.9041C29.569 17.3333 26.5733 21.5499 26.5691 21.5539C26.3107 21.9706 26.2066 22.179 26.5691 22.6457C26.5963 22.6841 26.7346 22.8255 26.9437 23.0392C27.8233 23.9382 29.9545 26.1166 30.3315 27.2914C30.5357 27.9832 30.1816 28.3331 29.4815 28.3331H27.0274C26.372 28.3331 26.0412 27.9653 25.3251 27.169C25.0216 26.8314 24.6487 26.4168 24.1525 25.9206C22.6941 24.5165 22.0691 24.3332 21.7067 24.3332C21.0416 24.3332 21.0433 24.5224 21.059 26.2829C21.0618 26.596 21.065 26.9588 21.065 27.379C21.065 27.9832 20.8733 28.3332 19.3108 28.3332C16.7109 28.3332 13.8526 26.7539 11.8235 23.8415C8.77767 19.575 7.94434 16.3458 7.94434 15.6958C7.94434 15.3292 8.08603 15 8.78601 15H11.2402C11.8694 15 12.1069 15.275 12.3486 15.9541C13.5485 19.4541 15.5735 22.5123 16.4068 22.5123C16.7193 22.5123 16.861 22.3666 16.861 21.5749V17.9583C16.8043 16.9277 16.4449 16.4818 16.1789 16.1517C16.0146 15.9479 15.886 15.7883 15.886 15.5625C15.886 15.2917 16.1193 15 16.511 15H20.3692C20.8859 15 21.0609 15.2791 21.0609 15.9041V20.7666C21.0609 21.2874 21.2985 21.4707 21.4526 21.4707C21.7651 21.4707 22.0276 21.2874 22.5983 20.7166C24.365 18.7416 25.6149 15.6958 25.6149 15.6958C25.7691 15.3292 26.0566 15 26.6816 15H29.1357Z" fill="#4680C2"></path>
							</svg>
						</a>
						<a href="https://connect.ok.ru/offer?url=<?= $url ?>" target="_blank">
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M20 40C31.0457 40 40 31.0457 40 20C40 8.9543 31.0457 0 20 0C8.9543 0 0 8.9543 0 20C0 31.0457 8.9543 40 20 40ZM19.9987 8.33301C16.9918 8.33301 14.5542 10.7705 14.5542 13.7774C14.5542 16.7843 16.9918 19.2218 19.9987 19.2218C23.0048 19.2218 25.4431 16.7843 25.4431 13.7774C25.4431 10.7705 23.0048 8.33301 19.9987 8.33301ZM19.9987 16.4996C18.4952 16.4996 17.2764 15.2816 17.2764 13.7774C17.2764 12.274 18.4952 11.0552 19.9987 11.0552C21.5013 11.0552 22.7209 12.274 22.7209 13.7774C22.7209 15.2816 21.5013 16.4996 19.9987 16.4996ZM25.4435 20C25.1842 20 24.8385 20.1728 24.3776 20.4033C23.4558 20.8642 22.0731 21.5556 19.999 21.5556C17.9249 21.5556 16.5422 20.8642 15.6204 20.4033C15.1595 20.1728 14.8138 20 14.5546 20C13.6959 20 12.999 20.6969 12.999 21.5556C12.999 22.3333 13.4408 22.7075 13.7768 22.9042C14.6985 23.4432 17.6657 24.6667 17.6657 24.6667L14.3601 28.8962C14.3601 28.8962 13.7768 29.6235 13.7768 30.1111C13.7768 30.9698 14.4737 31.6667 15.3324 31.6667C16.1265 31.6667 16.4866 31.1565 16.4866 31.1565C16.4866 31.1565 19.9936 26.9946 19.999 27C20.0045 26.9946 23.5115 31.1565 23.5115 31.1565C23.5115 31.1565 23.8716 31.6667 24.6657 31.6667C25.5244 31.6667 26.2212 30.9698 26.2212 30.1111C26.2212 29.6235 25.6379 28.8962 25.6379 28.8962L22.3324 24.6667C22.3324 24.6667 25.2996 23.4432 26.2212 22.9042C26.5572 22.7075 26.999 22.3333 26.999 21.5556C26.999 20.6969 26.3021 20 25.4435 20Z" fill="#F7931E"></path>
							</svg>
						</a>
						<a href="https://telegram.me/share/url?url=<?= $url ?>" target="_blank">
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M40 20C40 31.0457 31.0457 40 20 40C8.9543 40 0 31.0457 0 20C0 8.9543 8.9543 0 20 0C31.0457 0 40 8.9543 40 20ZM18.9631 25.9226C19.2081 25.6845 19.4539 25.4457 19.7003 25.2057C19.7296 25.2263 19.7579 25.2458 19.7854 25.2649C19.831 25.2964 19.8744 25.3265 19.9168 25.3573C20.3686 25.691 20.8203 26.0249 21.2721 26.3588C22.2455 27.0784 23.2191 27.798 24.1932 28.5159C25.0448 29.1439 25.7715 28.8737 25.9919 27.839C26.9199 23.4813 27.8439 19.1221 28.767 14.7635C28.7944 14.6344 28.8232 14.5055 28.8521 14.3766C28.9467 13.9538 29.0414 13.5306 29.0826 13.1021C29.1666 12.2279 28.5453 11.7879 27.7368 12.1004C25.7563 12.865 23.7758 13.6293 21.7954 14.3935C19.5246 15.2699 17.2538 16.1463 14.983 17.023C14.6218 17.1623 14.2605 17.3013 13.8991 17.4402C12.5847 17.9458 11.2702 18.4514 9.96122 18.9701C9.6741 19.0839 9.39766 19.2626 9.1661 19.4675C8.91543 19.6897 8.95632 19.9986 9.23588 20.1879C9.41677 20.311 9.62788 20.3981 9.83722 20.4648C11.1977 20.8973 12.5603 21.3239 13.9257 21.7408C14.1026 21.7955 14.1852 21.8804 14.2412 22.055C14.5747 23.0967 14.9121 24.1363 15.2495 25.1759C15.4952 25.9331 15.741 26.6903 15.9852 27.4484C16.0648 27.6941 16.2097 27.8079 16.4688 27.8217C16.8483 27.8417 17.1457 27.6977 17.4101 27.4373C17.9245 26.9316 18.4422 26.4286 18.9631 25.9226ZM16.5186 26.5238C16.5121 26.5256 16.5055 26.5274 16.499 26.5293L15.6097 23.8048C15.5506 23.6237 15.4921 23.4425 15.4336 23.2613C15.2716 22.7596 15.1097 22.2583 14.9363 21.7604C14.8674 21.5617 14.9012 21.4653 15.0821 21.3515C17.227 20.0041 19.3698 18.6534 21.5126 17.3026C22.5675 16.6376 23.6225 15.9726 24.6777 15.3079C24.8279 15.2132 24.9875 15.1155 25.1559 15.0719C25.2404 15.05 25.3352 15.0687 25.4303 15.0873C25.4742 15.096 25.5182 15.1046 25.5613 15.1092C25.542 15.1445 25.525 15.1822 25.5081 15.22C25.4713 15.3023 25.4345 15.3845 25.3733 15.4399C24.1132 16.5852 22.8487 17.7254 21.584 18.8658C21.3994 19.0323 21.2148 19.1987 21.0301 19.3652C20.6955 19.6669 20.361 19.9688 20.0266 20.2707C19.0524 21.15 18.0781 22.0292 17.0995 22.9044C16.9337 23.0528 16.8581 23.2092 16.8403 23.4297C16.7794 24.1874 16.7084 24.9437 16.6373 25.7C16.6156 25.9316 16.5938 26.1633 16.5723 26.395C16.5699 26.423 16.563 26.4507 16.556 26.4787C16.5529 26.4912 16.5498 26.5037 16.547 26.5164C16.5375 26.5187 16.5281 26.5212 16.5186 26.5238Z" fill="#35ACE4"></path>
							</svg>
						</a>
					</div>
				</div>


				<div class="favorite">
					<div class="favorite-tooltip">В избранное</div>
					<svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 0L14.6942 8.2918H23.4127L16.3593 13.4164L19.0534 21.7082L12 16.5836L4.94658 21.7082L7.64074 13.4164L0.587322 8.2918H9.30583L12 0Z" fill="white"></path>
					</svg>
				</div>
			</div>
		</div>
	</div>
</div>


<?
/* Посчитали фотки и подписи к ним, собрали в массив */
$iterator = \CIBlockElement::GetList(
	array("SORT" => "ASC"),
	array('IBLOCK_ID' => 3),
	false,
	false,
	array('ID', "IBLOCK_ID", 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'PROPERTY_UF_AUTHOR', 'PROPERTY_UF_GALLERY_TO_PLACE', 'PROPERTY_UF_PHOTO_DESCRIPTION')
);

$countOfImg = 0;
$images = [];
$detailImages = [];
$photoDescriptions = [];
while ($i = $iterator->Fetch()) {
	if ($i['PROPERTY_UF_GALLERY_TO_PLACE_VALUE'] === $arResult['ID']) {
		$countOfImg++;

		$previewPic = CFile::GetFileArray($i["PREVIEW_PICTURE"]);
		$previewSrc = $previewPic["SRC"];
		array_push($images, $previewSrc);

		$detailPic = CFile::GetFileArray($i["DETAIL_PICTURE"]);
		$detailSrc = $detailPic["SRC"];
		array_push($detailImages, $detailSrc);

		$photoDesc = $i['PROPERTY_UF_PHOTO_DESCRIPTION_VALUE'];
		array_push($photoDescriptions, $photoDesc);

		/* echo '<pre>';
		print_r($i);
		echo '</pre>'; */
	}
}
/* Посчитали фотки и подписи к ним, собрали в массив */
?>

<div class="container info">
	<div class="scroll-menu">
		<div class="container scroll-menu-inner">
			<div class="scroll-menu-inner__list">
				<a>Описание</a>
				<? if ($countOfImg != 0) : ?>
					<a>Галерея<span><?= $countOfImg ?></span></a>
				<? endif ?>
				<a>Контакты</a>
			</div>

			<div class="scroll-menu-inner__links">
				<div class="scroll-menu-inner__links--favorite">
					<div class="scroll-menu-inner__links--favorite-tooltip">В избранное</div>
					<svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 0L14.6942 8.2918H23.4127L16.3593 13.4164L19.0534 21.7082L12 16.5836L4.94658 21.7082L7.64074 13.4164L0.587322 8.2918H9.30583L12 0Z" fill="white"></path>
					</svg>
				</div>
				<a href="#">
					<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect x="4" width="2" height="10" fill="#008066"></rect>
						<rect y="6" width="2" height="10" transform="rotate(-90 0 6)" fill="#008066"></rect>
					</svg>
					<span>Добавить историю</span>
				</a>
			</div>

		</div>
	</div>

	<section class="place-info">
		<article>
			<div class="article-content">
				<span>
					<?= $arResult["DETAIL_TEXT"] ?>
				</span>
			</div>
		</article>


		<aside>
			<div class="aside-wrapper">
				<div class="aside-labels">
					<div class="aside-labels__label">
						<? if ($arResult['PROPERTIES']["UF_LABEL_IMAGE"]) : ?>
							<div class="aside-labels__label-wrapper">
								<? $imgLabel = $arResult['PROPERTIES']["UF_LABEL_IMAGE"] ?>
								<? switch ($imgLabel["VALUE_ENUM"]) {
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
							</div>
						<? endif; ?>
					</div>


					<!-- <div class="aside-labels__label">
						<div class="aside-labels__label-wrapper">
							<img src="img/1day.svg" />
						</div>
					</div> -->
				</div>

				<div class="aside-info">
					<? if ($arResult['PROPERTIES']["UF_ADDRESS"]) : ?>
						<address>
							<span class="aside-info__nav">Адрес</span>
							<?= $arResult['PROPERTIES']["UF_ADDRESS"]["VALUE"] ?>
						</address>
					<? endif; ?>

					<? if ($arResult['PROPERTIES']["UF_SITE"]["VALUE"]) : ?>
						<div class="aside-info__site">
							<span class="aside-info__nav">Сайт</span>
							<a href="<?= $arResult['PROPERTIES']["UF_SITE"]["VALUE"] ?>" target="_blank"><?= $arResult['PROPERTIES']["UF_SITE"]["VALUE"] ?></a>
						</div>
					<? endif; ?>
				</div>
			</div>
		</aside>
	</section>



	<?
	/* Вывели превью-фотки */
	switch (count($images)) {
		case 0:
			break;

		case 1:
			echo '<section class="place-gallery__one-photo">';
			echo '<div class="place-gallery__one-photo-inner">';
			echo '<div class="place-gallery__one-photo-image">';
			echo '<img src="' . $images[0] . '" />';
			echo '</div>';
			break;

		case 2:
			echo '<section class="place-gallery__two-photos">';
			echo '<div class="place-gallery__two-photos-inner">';
			for ($i = 0; $i < count($images); $i++) {
				echo '<div class="place-gallery__two-photos-image">';
				echo '<img src="' . $images[$i] . '" />';
				echo '</div>';
			}
			break;

		case 3:
			echo '<section class="place-gallery__three-photos">';
			echo '<div class="place-gallery__three-photos-inner">';
			for ($i = 0; $i < count($images); $i++) {
				echo '<div class="place-gallery__three-photos-image">';
				echo '<img src="' . $images[$i] . '" />';
				echo '</div>';
			}
			break;

		case 4:
			echo '<section class="place-gallery__four-photos">';
			echo '<div class="place-gallery__four-photos-inner">';
			for ($i = 0; $i < count($images); $i++) {
				echo '<div class="place-gallery__four-photos-image">';
				echo '<img src="' . $images[$i] . '" />';
				echo '</div>';
			}
			break;

		case 5:
			echo '<section class="place-gallery__five-photos">';
			echo '<div class="place-gallery__five-photos-inner">';
			for ($i = 0; $i < count($images); $i++) {
				echo '<div class="place-gallery__five-photos-image">';
				echo '<img src="' . $images[$i] . '" />';
				echo '</div>';
			}
			break;

		default:
			echo '<section class="place-gallery__many-photos">';
			echo '<div class="place-gallery__many-photos-inner">';
			for ($i = 0; $i < count($images); $i++) {
				echo '<div class="place-gallery__many-photos-image">';
				echo '<img src="' . $images[$i] . '" />';
				echo '</div>';
			}
			break;
	}
	echo '</div>';
	echo '</section>';
	/* Вывели превью-фотки */
	?>
</div>


<div hidden>
	<? foreach ($detailImages as $value) { ?>
		<div hidden class="hidden-field"><?= $value ?></div>
	<? } ?>
	<? foreach ($photoDescriptions as $desc) { ?>
		<div hidden class="hidden-field-desc"><?= $desc ?></div>
	<? } ?>

	<div hidden id="coordinates">
		<?= trim($arResult['PROPERTIES']["UF_GEOLOCATION"]["VALUE"]) ?>
	</div>
</div>





<div class="container info">
	<section class="place-contacts">
		<?
		$howToGet = $arResult['PROPERTIES']["UF_HOW_TO_GET"]["VALUE"];
		$phone1 = $arResult['PROPERTIES']["UF_PHONE_1"]["VALUE"];
		$phone2 = $arResult['PROPERTIES']["UF_PHONE_2"]["VALUE"];
		$phone1Text = $arResult['PROPERTIES']["UF_PHONE_1_TEXT"]["VALUE"];
		$phone2Text = $arResult['PROPERTIES']["UF_PHONE_2_TEXT"]["VALUE"];
		$address = $arResult['PROPERTIES']["UF_ADDRESS"]["VALUE"];
		$mail = $arResult['PROPERTIES']["UF_MAIL"]["VALUE"];
		$site = $arResult['PROPERTIES']["UF_SITE"]["VALUE"];

		$ok = $arResult['PROPERTIES']["UF_OK"]["VALUE"];
		$vk = $arResult['PROPERTIES']["UF_VK"]["VALUE"];
		$inst = $arResult['PROPERTIES']["UF_INST"]["VALUE"];
		$fb = $arResult['PROPERTIES']["UF_FB"]["VALUE"];
		$yt = $arResult['PROPERTIES']["UF_YT"]["VALUE"];
		$tw = $arResult['PROPERTIES']["UF_TW"]["VALUE"];
		$tg = $arResult['PROPERTIES']["UF_TG"]["VALUE"];

		$coord = $arResult['PROPERTIES']["UF_GEOLOCATION"]["VALUE"];
		$coord = explode(",", $coord);
		$lat = $coord[0];
		$lon = $coord[1];


		if (!($howToGet || $phone1 || $phone2 || $phone1Text || $phone2Text || $mail || $site || $ok || $vk || $inst || $yt || $fb || $tw || $tg)) : ?>
			<div class="place-contacts__map big-map"></div>
		<? else : ?>
			<div class="place-contacts__map"></div>
		<? endif; ?>



		<? if (!($howToGet || $phone1 || $phone2 || $phone1Text || $phone2Text || $mail || $site || $ok || $vk || $inst || $yt || $fb || $tw || $tg)) : ?>
			<div class="place-contacts__container center-container">
				<div class="place-contacts__item">
					<h3><?= $address ?></h3>
				</div>
			</div>
		<? else : ?>
			<div class="place-contacts__container">
				<div class="place-contacts__item">
					<h3><?= $address ?></h3>
				</div>

				<? if ($howToGet) : ?>
					<div class="place-contacts__item">
						<h3 class="h3-inline">Как добраться</h3>
						<span><?= $howToGet ?></span>
					</div>
				<? endif; ?>

				<? if ($phone1 || $phone2) : ?>
					<div class="place-contacts__item">
						<h3>Телефон</h3>
						<ul>
							<li>
								<a href="tel:" . <?= $phone1 ?>><?= $phone1 ?>
									<? if ($phone1Text) : ?>
										<div><?= $phone1Text ?></div>
									<? endif; ?>
								</a>
							</li>
							<li>
								<a href="tel:" . <?= $phone2 ?>><?= $phone2 ?>
									<? if ($phone2Text) : ?>
										<div><?= $phone2Text ?></div>
									<? endif; ?>
								</a>
							</li>
						</ul>
					</div>
				<? endif; ?>

				<? if ($site) : ?>
					<div class="place-contacts__item">
						<h3 class="h3-inline">Сайт</h3>
						<div>
							<a href="<?= $site ?>" target="_blank"><?= $site ?></a>
						</div>
					</div>
				<? endif; ?>

				<? if ($mail) : ?>
					<div class="place-contacts__item">
						<h3 class="h3-inline">Почта</h3>
						<div>
							<a href="mailto:<?= $mail ?>" target="_blank"><?= $mail ?></a>
						</div>
					</div>
				<? endif; ?>

				<? if ($ok || $inst || $fb || $yt || $tw || $tg || $vk) : ?>
					<div class="place-contacts__social">
						<ul>
							<? if ($vk) : ?>
								<li id="social-vk">
									<a href="<?= $vk ?>" target="_blank">
										<img src="/img/vk.svg" />
									</a>
								</li>
							<? endif; ?>

							<? if ($ok) : ?>
								<li id="social-ok">
									<a href="<?= $ok ?>" target="_blank">
										<img src="/img/ok.svg" />
									</a>
								</li>
							<? endif; ?>

							<? if ($inst) : ?>
								<li id="social-inst">
									<a href="<?= $inst ?>" target="_blank">
										<img src="/img/inst.svg" />
									</a>
								</li>
							<? endif; ?>

							<? if ($fb) : ?>
								<li id="social-fb">
									<a href="<?= $fb ?>" target="_blank">
										<img src="/img/fb.svg" />
									</a>
								</li>
							<? endif; ?>

							<? if ($yt) : ?>
								<li id="social-yt">
									<a href="<?= $yt ?>" target="_blank">
										<img src="/img/yt.svg" />
									</a>
								</li>
							<? endif; ?>

							<? if ($tw) : ?>
								<li id="social-tw">
									<a href="<?= $tw ?>" target="_blank">
										<img src="/img/tw.svg" />
									</a>
								</li>
							<? endif; ?>

							<? if ($tg) : ?>
								<li id="social-tg">
									<a href="<?= $tg ?>" target="_blank">
										<img src="/img/tg.svg" />
									</a>
								</li>
							<? endif; ?>
						</ul>
					</div>
				<? endif; ?>
			</div>
		<? endif; ?>
		<div class="place-contacts__tags">
			<div class="place-contacts__tags-wrapper">
				<? foreach ($tags as $tags2 => $tag) { ?>
					<? $tag = trim($tag); ?>
					<? switch ($tag) {
						case ("История"):
							$placeTag = "?show=history&clear_cache=Y";
							break;
						case ("Арт");
							$placeTag = "?show=art&clear_cache=Y";
							break;
						case ("Легенды Урала");
							$placeTag = "?show=legends&clear_cache=Y";
							break;
						case ("Поесть");
							$placeTag = "?show=eat&clear_cache=Y";
							break;
						case ("Прогулки");
							$placeTag = "?show=stroll&clear_cache=Y";
							break;
						case ("Спорт");
							$placeTag = "?show=sport&clear_cache=Y";
							break;
						case ("Шопинг");
							$placeTag = "?show=shop&clear_cache=Y";
							break;
					} ?>
					<a href="/places<?= $placeTag ?>"><? echo "#" . $tag ?></a>
				<? } ?>
			</div>
		</div>

		<div class="place-contacts__message-error">
			<a href="mailto:grigorieva@atomsk.ru">Видишь ошибку? Расскажи нам</a>
		</div>

		<div class="place-contacts__buttons">
			<div class="share">
				<img src="/img/share.svg" />
			</div>
			<div class="share-social-wrapper">
				<div class="share-social">
					<a href="https://www.facebook.com/sharer.php?u=<?= $url ?>" target="_blank">
						<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M17.1767 30.88H21.6727V19.9987H24.672L25.0693 16.2493H21.6727L21.6773 14.372C21.6773 13.3947 21.7707 12.87 23.1733 12.87H25.048V9.12H22.048C18.4447 9.12 17.1767 10.9393 17.1767 13.998V16.2493H14.9307V19.9993H17.1767V30.88ZM20 40C8.95467 40 0 31.0453 0 20C0 8.954 8.95467 0 20 0C31.0453 0 40 8.954 40 20C40 31.0453 31.0453 40 20 40Z" fill="#1E4C99"></path>
						</svg>
					</a>
					<a href="http://twitter.com/share?url=<?= $url ?>" target="_blank">
						<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M22.778 12.1887C21.032 12.824 19.9287 14.4627 20.054 16.256L20.096 16.948L19.3973 16.8633C16.8553 16.5387 14.634 15.4373 12.748 13.5867L11.826 12.6687L11.5887 13.3467C11.086 14.858 11.4073 16.454 12.4547 17.5273C13.0133 18.1207 12.8873 18.2053 11.924 17.852C11.5887 17.7393 11.2953 17.6547 11.2673 17.6967C11.17 17.796 11.5047 19.0807 11.77 19.5893C12.1333 20.296 12.8733 20.9873 13.684 21.3973L14.3687 21.722L13.5587 21.736C12.7767 21.736 12.7487 21.75 12.8327 22.0473C13.112 22.9653 14.2153 23.94 15.4447 24.364L16.3107 24.66L15.5567 25.112C14.4393 25.7627 13.126 26.1293 11.8127 26.1567C11.1833 26.1707 10.6667 26.2273 10.6667 26.27C10.6667 26.4107 12.3713 27.2013 13.3627 27.5127C16.338 28.4307 19.8727 28.0347 22.5267 26.4673C24.4127 25.3513 26.298 23.134 27.1787 20.9867C27.654 19.8433 28.1287 17.7527 28.1287 16.7507C28.1287 16.1007 28.1707 16.016 28.9527 15.2393C29.414 14.7873 29.8467 14.2933 29.9307 14.152C30.0707 13.8833 30.056 13.8833 29.344 14.1233C28.1567 14.5473 27.9887 14.4907 28.576 13.8553C29.0087 13.4033 29.526 12.584 29.526 12.344C29.526 12.302 29.3167 12.372 29.0787 12.4993C28.8273 12.6407 28.2687 12.8527 27.8493 12.9793L27.0953 13.22L26.4107 12.7533C26.0333 12.4993 25.5033 12.2167 25.2233 12.132C24.5107 11.9347 23.4207 11.9627 22.778 12.1887ZM20 40C8.95467 40 0 31.0453 0 20C0 8.954 8.95467 0 20 0C31.0453 0 40 8.954 40 20C40 31.0453 31.0453 40 20 40Z" fill="#00ACEE"></path>
						</svg>
					</a>
					<a href="https://vk.com/share.php?url=<?= $url ?>" target="_blank">
						<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M20 40C31.0457 40 40 31.0457 40 20C40 8.9543 31.0457 0 20 0C8.9543 0 0 8.9543 0 20C0 31.0457 8.9543 40 20 40ZM29.1357 15C29.8774 15 30.0316 15.3833 29.8774 15.9041C29.569 17.3333 26.5733 21.5499 26.5691 21.5539C26.3107 21.9706 26.2066 22.179 26.5691 22.6457C26.5963 22.6841 26.7346 22.8255 26.9437 23.0392C27.8233 23.9382 29.9545 26.1166 30.3315 27.2914C30.5357 27.9832 30.1816 28.3331 29.4815 28.3331H27.0274C26.372 28.3331 26.0412 27.9653 25.3251 27.169C25.0216 26.8314 24.6487 26.4168 24.1525 25.9206C22.6941 24.5165 22.0691 24.3332 21.7067 24.3332C21.0416 24.3332 21.0433 24.5224 21.059 26.2829C21.0618 26.596 21.065 26.9588 21.065 27.379C21.065 27.9832 20.8733 28.3332 19.3108 28.3332C16.7109 28.3332 13.8526 26.7539 11.8235 23.8415C8.77767 19.575 7.94434 16.3458 7.94434 15.6958C7.94434 15.3292 8.08603 15 8.78601 15H11.2402C11.8694 15 12.1069 15.275 12.3486 15.9541C13.5485 19.4541 15.5735 22.5123 16.4068 22.5123C16.7193 22.5123 16.861 22.3666 16.861 21.5749V17.9583C16.8043 16.9277 16.4449 16.4818 16.1789 16.1517C16.0146 15.9479 15.886 15.7883 15.886 15.5625C15.886 15.2917 16.1193 15 16.511 15H20.3692C20.8859 15 21.0609 15.2791 21.0609 15.9041V20.7666C21.0609 21.2874 21.2985 21.4707 21.4526 21.4707C21.7651 21.4707 22.0276 21.2874 22.5983 20.7166C24.365 18.7416 25.6149 15.6958 25.6149 15.6958C25.7691 15.3292 26.0566 15 26.6816 15H29.1357Z" fill="#4680C2"></path>
						</svg>
					</a>
					<a href="https://connect.ok.ru/offer?url=<?= $url ?>" target="_blank">
						<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M20 40C31.0457 40 40 31.0457 40 20C40 8.9543 31.0457 0 20 0C8.9543 0 0 8.9543 0 20C0 31.0457 8.9543 40 20 40ZM19.9987 8.33301C16.9918 8.33301 14.5542 10.7705 14.5542 13.7774C14.5542 16.7843 16.9918 19.2218 19.9987 19.2218C23.0048 19.2218 25.4431 16.7843 25.4431 13.7774C25.4431 10.7705 23.0048 8.33301 19.9987 8.33301ZM19.9987 16.4996C18.4952 16.4996 17.2764 15.2816 17.2764 13.7774C17.2764 12.274 18.4952 11.0552 19.9987 11.0552C21.5013 11.0552 22.7209 12.274 22.7209 13.7774C22.7209 15.2816 21.5013 16.4996 19.9987 16.4996ZM25.4435 20C25.1842 20 24.8385 20.1728 24.3776 20.4033C23.4558 20.8642 22.0731 21.5556 19.999 21.5556C17.9249 21.5556 16.5422 20.8642 15.6204 20.4033C15.1595 20.1728 14.8138 20 14.5546 20C13.6959 20 12.999 20.6969 12.999 21.5556C12.999 22.3333 13.4408 22.7075 13.7768 22.9042C14.6985 23.4432 17.6657 24.6667 17.6657 24.6667L14.3601 28.8962C14.3601 28.8962 13.7768 29.6235 13.7768 30.1111C13.7768 30.9698 14.4737 31.6667 15.3324 31.6667C16.1265 31.6667 16.4866 31.1565 16.4866 31.1565C16.4866 31.1565 19.9936 26.9946 19.999 27C20.0045 26.9946 23.5115 31.1565 23.5115 31.1565C23.5115 31.1565 23.8716 31.6667 24.6657 31.6667C25.5244 31.6667 26.2212 30.9698 26.2212 30.1111C26.2212 29.6235 25.6379 28.8962 25.6379 28.8962L22.3324 24.6667C22.3324 24.6667 25.2996 23.4432 26.2212 22.9042C26.5572 22.7075 26.999 22.3333 26.999 21.5556C26.999 20.6969 26.3021 20 25.4435 20Z" fill="#F7931E"></path>
						</svg>
					</a>
					<a href="https://telegram.me/share/url?url=<?= $url ?>" target="_blank">
						<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M40 20C40 31.0457 31.0457 40 20 40C8.9543 40 0 31.0457 0 20C0 8.9543 8.9543 0 20 0C31.0457 0 40 8.9543 40 20ZM18.9631 25.9226C19.2081 25.6845 19.4539 25.4457 19.7003 25.2057C19.7296 25.2263 19.7579 25.2458 19.7854 25.2649C19.831 25.2964 19.8744 25.3265 19.9168 25.3573C20.3686 25.691 20.8203 26.0249 21.2721 26.3588C22.2455 27.0784 23.2191 27.798 24.1932 28.5159C25.0448 29.1439 25.7715 28.8737 25.9919 27.839C26.9199 23.4813 27.8439 19.1221 28.767 14.7635C28.7944 14.6344 28.8232 14.5055 28.8521 14.3766C28.9467 13.9538 29.0414 13.5306 29.0826 13.1021C29.1666 12.2279 28.5453 11.7879 27.7368 12.1004C25.7563 12.865 23.7758 13.6293 21.7954 14.3935C19.5246 15.2699 17.2538 16.1463 14.983 17.023C14.6218 17.1623 14.2605 17.3013 13.8991 17.4402C12.5847 17.9458 11.2702 18.4514 9.96122 18.9701C9.6741 19.0839 9.39766 19.2626 9.1661 19.4675C8.91543 19.6897 8.95632 19.9986 9.23588 20.1879C9.41677 20.311 9.62788 20.3981 9.83722 20.4648C11.1977 20.8973 12.5603 21.3239 13.9257 21.7408C14.1026 21.7955 14.1852 21.8804 14.2412 22.055C14.5747 23.0967 14.9121 24.1363 15.2495 25.1759C15.4952 25.9331 15.741 26.6903 15.9852 27.4484C16.0648 27.6941 16.2097 27.8079 16.4688 27.8217C16.8483 27.8417 17.1457 27.6977 17.4101 27.4373C17.9245 26.9316 18.4422 26.4286 18.9631 25.9226ZM16.5186 26.5238C16.5121 26.5256 16.5055 26.5274 16.499 26.5293L15.6097 23.8048C15.5506 23.6237 15.4921 23.4425 15.4336 23.2613C15.2716 22.7596 15.1097 22.2583 14.9363 21.7604C14.8674 21.5617 14.9012 21.4653 15.0821 21.3515C17.227 20.0041 19.3698 18.6534 21.5126 17.3026C22.5675 16.6376 23.6225 15.9726 24.6777 15.3079C24.8279 15.2132 24.9875 15.1155 25.1559 15.0719C25.2404 15.05 25.3352 15.0687 25.4303 15.0873C25.4742 15.096 25.5182 15.1046 25.5613 15.1092C25.542 15.1445 25.525 15.1822 25.5081 15.22C25.4713 15.3023 25.4345 15.3845 25.3733 15.4399C24.1132 16.5852 22.8487 17.7254 21.584 18.8658C21.3994 19.0323 21.2148 19.1987 21.0301 19.3652C20.6955 19.6669 20.361 19.9688 20.0266 20.2707C19.0524 21.15 18.0781 22.0292 17.0995 22.9044C16.9337 23.0528 16.8581 23.2092 16.8403 23.4297C16.7794 24.1874 16.7084 24.9437 16.6373 25.7C16.6156 25.9316 16.5938 26.1633 16.5723 26.395C16.5699 26.423 16.563 26.4507 16.556 26.4787C16.5529 26.4912 16.5498 26.5037 16.547 26.5164C16.5375 26.5187 16.5281 26.5212 16.5186 26.5238Z" fill="#35ACE4"></path>
						</svg>
					</a>
				</div>
			</div>


			<div class="favorite">
				<div class="favorite-tooltip">В избранное</div>
				<svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12 0L14.6942 8.2918H23.4127L16.3593 13.4164L19.0534 21.7082L12 16.5836L4.94658 21.7082L7.64074 13.4164L0.587322 8.2918H9.30583L12 0Z" fill="white"></path>
				</svg>
			</div>
		</div>
	</section>
</div>

<script src="/js/placeDetailJS.js"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGP_eCnEh9CeAyCUg6k0B190eYdWk0Bjc&callback=initMap&v=weekly"></script>