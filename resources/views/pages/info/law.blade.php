@extends('layouts.theme')

@section('title', 'Программа лояльности')

@section('content')
    <div class="info-page">
        <div class="container">
            <section class="info-page loyalty">
                @include('partials.info_nav')

                <div class="info-page-block">

                    <div class="law-menu">
                        <a href="#oferta">{{ __('Публичная оферта') }}</a>
                        <a href="#confidentiality">{{ __('ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ') }}</a>
                    </div>

                    <h3 class="info-page-title" id="oferta">{{ __('Публичная оферта') }}</h3>

                    <div class="info-page-content laws">
                        <div>
                            <div class="law-block">
                                <p class="head">{{ __('Основные положения') }}</p>
                                <p>{{ __('1.1.В соответствии с пунктом 5 статьи') }}</p>
                                <p>{{ __('1.2. В соответствии со статьей') }}</p>
                                <p>{{ __('1.3. В соответствии с пунктом') }}</p>
                                <p>{{ __('1.4. Продавец осуществляет продажу') }}</p>
                                <p>{{ __('1.5. Использование Сайта, в том числе') }}</p>
                                <p>{{ __('1.6. В случае несогласия с настоящим') }}</p>
                                <p>{{ __('1.7. Сообщая Продавцу свой e-mail') }}</p>
                                <p>{{ __('1.8. Сообщения о скидочных программах') }}</p>
                            </div>
                            <div class="law-block">
                                <p class="head">{{ __('2. Предмет соглашения') }}</p>
                                <p>{{ __('2.1. Предметом настоящего Соглашения') }}</p>
                                <p>{{ __('2.2. Данное Соглашение распространяется') }}</p>
                            </div>
                            <div class="law-block">
                                <p class="head">{{ __('3. Размещение Заказа') }}</p>
                                <p>{{ __('3.1. Заказ Товара осуществляется Покупателем') }}</p>
                                <p>{{ __('3.2. При регистрации (размещении) Заказа') }}</p>
                                <p>{{ __('3.3. Принятие Покупателем условий настоящего') }}</p>
                                <p>{{ __('3.4. Покупатель имеет право редактировать') }}</p>
                                <p>{{ __('3.5. Покупатель несет ответственность за содержание') }}</p>
                                <p>{{ __('3.6. Все информационные материалы, представленные') }}</p>
                            </div>
                            <div class="law-block">
                                <p class="head">{{ __('4. Сроки исполнения Заказа') }}</p>
                                <p>{{ __('4.1. Продавец подготавливает заказ в максимально') }}</p>
                                <p>{{ __('4.2. Заказ считается исполненным в момент') }}</p>
                                <p>{{ __('4.3. В случае предоставления Покупателем недостоверной') }}</p>
                            </div>
                            <div class="law-block">
                                <p class="head">{{ __('5. Оплата Заказа') }}</p>
                                <p>
                                    {{ __('5.1. Оплата исполненного Заказа') }}
                                </p>
                                <p>{{ __('5.2. Цены на любые позиции') }}</p>
                                <p>{{ __('5.3. Цена Товара указывается на') }}</p>
                                <p>{{ __('5.4. Оплата Покупателем самостоятельно') }}</p>
                            </div>
                            <div class="law-block">
                                <p class="head">{{ __('6. Ответственность') }}</p>
                                <p>{{ __('6.1. Продавец не несет ответственности') }}</p>
                                <p>{{ __('6.2. Продавец не несет ответственности') }}</p>
                            </div>
                            <div class="law-block">
                                <p class="head">{{ __('7. Возврат Товара') }}</p>
                                <p>{{ __('7.1. Возврат Товара, осуществляется') }}</p>
                                <p>{{ __('7.2. Правила возврата Товара могут') }}</p>
                                <p>{{ __('7.3. В случае доставки Продавцом') }}</p>
                                <p>{{ __('7.4. Право собственности на Заказ') }}</p>
                            </div>
                            <div class="law-block">
                                <p class="head">{{ __('8. Заключительные положения') }}</p>
                                <p>{{ __('8.1. Настоящим Покупатель соглашается с обязательными') }}</p>
                                <p>{{ __('8.2. В соответствии с условиями настоящего') }}</p>
                                <p>{{ __('8.3. Продавец оставляет за собой право') }}</p>
                                <p>{{ __('8.4. Во всем остальном') }}</p>
                            </div>
                            <div class="law-block">
                                <p class="head">{{ __('9. Порядок разрешения споров') }}</p>
                                <p>{{ __('9.1. Споры и разногласия') }}</p>
                                <p>{{ __('9.2. Сторона, чьи интересы') }}</p>
                            </div>
                            <div class="law-block">
                                <p class="head">{{ __('10. Обстоятельства непреодолимой силы') }}</p>
                                <p>{{ __('10.1. В случае возникновения') }}</p>
                            </div>
                            <div class="law-block" >
                                <p class="head">{{ __('11. Заключительные положения') }}</p>
                                <p>{{ __('11.1. Настоящим Покупатель соглашается') }}</p>
                                <p>{{ __('11.2. В соответствии с условиями') }}</p>
                                <p>{{ __('11.3. Продавец оставляет за собой') }}</p>
                            </div>
                            <div class="law-block">
                                <p class="head">{{ __('12. Реквизиты организаторов') }}</p>
                                <div class="duoed flex items-start space-between">
                                    <div>
                                        <p>
                                            {!! __('Юридический адрес: 050009') !!}
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            {!! __('ТОО «Constella KZ»') !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="confidentiality">
                            <h3 class="info-page-title">{{ __('Политика конфиденциальности') }}</h3>

                            <div class="law-block">
                                <p>
                                    {{ __('Настоящая Политика конфиденциальности (далее – Политика)') }}
                                </p>
                            </div>

                            <div class="law-block">
                                <p class="head">{{ __('Личная информация') }}</p>
                                <p>{{ __('Получение Личной информации. «Личная информация»') }}

                                <p>{{ __('Использование Личной информации:') }}</p>
                                <ul>
                                    <li>{{ __('для ответов на запросы') }}</li>
                                    <li>{{ __('для направления информацию касательно') }}</li>
                                    <li>{{ __('для отправки необходимой информации') }}</li>
                                    <li>{{ __('пользоваться Сайтом/Платформой Компании') }}</li>
                                    <li>{{ __('для внутренних целей, включая анализ') }}</li>
                                    <li>{{ __('для выполнения заказов, осуществления платежей') }}</li>
                                </ul>

                                <p>{{ __('Администрация сайта Интернет-магазина') }}</p>
                                <p>{{ __('Персональные данные - любая информация') }}</p>



                                <p>
                                    {{ __('Обработка персональных данных - любое действие') }}
                                </p>

                                <p>{{ __('Раскрытие Личной информации допустимо:') }}</p>
                                <ul>
                                    <li>{{ __('аффиливанным компаниям, третьим лицам') }}</li>
                                    <li>{{ __('если это необходимо или уместно') }}</li>
                                </ul>

                            </div>

                            <div class="law-block">
                                <p class="head">{{ __('Неличная информация') }}</p>
                                <p>{{ __('Получение Неличной информации.') }}</p>
                                <ul>
                                    <li>{{ __('информация о браузере') }}</li>
                                    <li>{{ __('информация, полученная с помощью cookies') }}</li>
                                    <li>{{ __('демографические данные и другие сведения') }}</li>
                                    <li>{{ __('совокупные данные') }}</li>
                                </ul>

                                <p>
                                    {{ __('Так, например, Компания может узнать:') }}
                                </p>

                                <ul>
                                    <li>{{ __('тип вашего компьютера') }}</li>
                                    <li>{{ __('демографическую информацию') }}</li>
                                </ul>


                                <p>{{ __('Совокупные данные. Компания может объединить') }}</p>
                            </div>

                            <div class="law-block">
                                <p class="head">{{ __('COOKIES И ДРУГИЕ ТЕХНОЛОГИИ') }}</p>
                                <p>{{ __('Cookies: Пользователи сайтов Компании') }}</p>

                                <p>
                                    {{ __('Объекты локальной памяти: Компания может') }}
                                </p>

                                <p>
                                    {!! __('IP-АДРЕСА') !!}
                                </p>

                                <p>{!! __('Правила использования и разглашения IP-адресов') !!}</p>
                            </div>

                            <div class="law-block">
                                <p class="head">{{ __('Cоциальные сети и интерактивные средства общения') }}</p>
                                <p>{{ __('Специальные функции нашего Сайта позволяют') }}</p>
                            </div>

                            <div class="law-block">
                                <p class="head">{{ __('Cайты сторонних организаций') }}</p>
                                <p>{{ __('Наш Сайт может содержать ссылки на сайты сторонних лиц') }}</p>
                            </div>

                            <div class="law-block">
                                <p class="head">{{ __('Сторонние рекламодатели') }}</p>
                                <p>{{ __('Компания может привлекать сторонние рекламные агентства') }}</p>
                            </div>

                            <div class="law-block">
                                <p class="head">{{ __('Обеспечение безопасности') }}</p>
                                <p>{{ __('Компания принимает все разумные организационные, технические') }}</p>
                            </div>

                            <div class="law-block">
                                <p class="head">{{ __('Хранение информации') }}</p>
                                <p>{{ __('Компания может хранить Личную информацию в течение периода') }}</p>
                            </div>

                            <div class="law-block">
                                <p class="head">{{ __('Использование сайта детьми') }}</p>
                                <p>{{ __('Настоящий Сайт не предназначен для использования лицами') }}</p>
                            </div>

                            <div class="law-block">
                                <p class="head">{{ __('Передача информации за пределы страны') }}</p>
                                <p>{{ __('Ваша Личная информация может храниться и обрабатываться в любой стране') }}</p>
                            </div>

                            <div class="law-block">
                                <p class="head">{{ __('Внесение изменений в настоящую политику конфиденциальности') }}</p>
                                <p>{{ __('Компания оставляет за собой право на периодическое внесение изменений') }}</p>
                            </div>

                            <div class="law-block">
                                <p class="head">{{ __('Контактные данные') }}</p>
                                <p>{{ __('По любым вопросам, касающимся настоящей Политики  конфиденциальности') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @include('partials.info_sidebar')
            </section>
        </div>
    </div>
@stop
