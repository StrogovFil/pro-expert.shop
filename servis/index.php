<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сервис");
?><!-- Page -->

    <section class="page">
        <div class="page-top">
            <div class="container">
                <h1 class="h1 page-top-title">Сервис</h1>
                <div class="page-top-text">Помимо сотен тысяч товарных позиций Shop ProExpert предлагает клиентом ряд сервисов, чтоы сделать покупку проще</div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="container-inner">
                    <div class="page-content-decorated">
                        <p>Наши специалисты способны оказать спектр услуг по доставке, установке и сборке (монтажу). Мы предлагаем ряд услуг по со ответственному хранению товара. Мы уверены в качестве товаров, которые представлены на онлайн-витрине нашего магазина, но не отказываемся от услуги гарантийного и постгарантийного обслуживания. Если у Вас остались вопросы или Вас интересует дополнительная информация – свяжитесь с нашими специалистами. Вместе мы обязательно найдем ответ на все вопросы и разрешим любые задачи.</p>
                    </div>
                    <div class="h1">Сборка и установка / Монтаж</div>
                    <p>Квалифицированная команда соберет и установит, приобретенную Вами в Shop ProExpert мебель. Место и время монтажа согласуется заранее, учитывая пожелания клиента. Время выезда специалистов на место согласуется с Вами заранее. Вы можете заказать сборку одного предмета или полноценной системы. Кроме этого, наша команда может провести строительно-монтажные, инженерные или отделочные работы. Если у Вас остались вопросы – позвоните нам, вместе мы найдем индивидуальное решение для Вас.</p>
                    <div class="h1">Ответственное хранение</div>
                    <p>После оформления покупки со склада в России или прибытия товара на склад в Россию, мы гарантируем хранения товара в течение .. дней до момента пока товар не будет отправлен любым удобным способом покупателю. При оформлении покупки мы предлагаем нашим клиентам три способа доставки товара: самовывоз, транспортной компанией или курьером.</p>
                    <p>Мы индивидуально подходим к каждой покупке, поэтому готовы предоставить покупателю услуги ответственного хранения купленного товара на складе в России.</p>
                    <div class="h1">Гарантийное <br>обслуживание</div>
                    <p>Гарантия на купленный товар вступает в силу в день покупки. Действие гарантии фиксируется документально при покупке индивидуально на каждый товар.</p>
                    <p>Представитель Shop ProExpert  ИКЕА или ее авторизованного сервис-партнера (если случай касается бытовой техники) примет товар и решит, распространяется ли гарантия на данный случай.</p>
                    <p>Гарантия вступает в действие со дня передачи товара магазином потребителю. Подтверждением покупки является оригинал чека, определяющий срок покупки и начала действия гарантии.</p>
                    <p>Гарантий не действует, если товар хранился / был собран / установлен / использовался неправильно, нарушая нормы эксплуатации, инструкции по уходу или был использован не по назначению.</p>
                    <p>Если гарантия распространяется, то товар будет либо отремонтирован, либо заменен аналогичным. Возможность возврата денег рассматривается индивидуально.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Question -->
    <section class="question question-dark" data-bleed="100" data-parallax="scroll" data-z-index="1" data-speed="0.5" data-image-src="<?=SITE_TEMPLATE_PATH?>/images/form-bg.jpg">
        <div class="container">
            <div class="question-header">
                <div class="h2 question-title">Написать <br>нам</div>
                <div class="question-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida. Lorem ipsum dolor sit amet.</div>
            </div>
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"form_1",
	Array(
'AJAX_MODE' => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "Y",
		"VARIABLE_ALIASES" => array("RESULT_ID"=>"RESULT_ID","WEB_FORM_ID"=>"WEB_FORM_ID",),
		"WEB_FORM_ID" => "1"
	)
);?>
        </div>
    </section>
    <!--/ Question -->

    <!--/ Page --><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>