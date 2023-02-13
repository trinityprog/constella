@extends('layouts.theme')

@section('title', 'Программа лояльности')

@section('content')

<div class="info-page">
    <div class="container">
        <section class="info-page faq">
            @include('partials.info_nav')

            <div class="info-page-block">
                <h3 class="info-page-title">{{ __('FAQ / Часто задаваемые вопросы') }}</h3>

                <div class="info-page-content faq-content">

                    <div class="info-page-tab">
                        <button class="info-page-tab__button" type="button">
                            <span class="info-page-tab__title">{{ __('Как оформить заказ на сайте?') }}</span>
                            <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item"></span></div>
                        </button>
                        <div class="info-page-tab__content">
                            <p class="info-page-tab__text">{{ __('Вы можете пройти регистрацию в самом начале') }}</p>
                        </div>
                    </div>

                    <div class="info-page-tab">
                        <button class="info-page-tab__button" type="button">
                            <span class="info-page-tab__title">{{ __('Как рассчитывается стоимость доставки?') }}</span>
                            <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item"></span></div>
                        </button>
                        <div class="info-page-tab__content">
                            <p class="info-page-tab__text">{{ __('Для наших клиентов из Нур-Султана, Алматы') }}</p>
                            <p class="info-page-tab__text">{{ __('Для всех остальных клиентов') }}</p>
                            <p class="info-page-tab__text">{{ __('Наши товары мы доставляем с помощью') }}</p>
                        </div>
                    </div>

                    <div class="info-page-tab">
                        <button class="info-page-tab__button" type="button">
                            <span class="info-page-tab__title">{{ __('Какие есть способы оплаты?') }}</span>
                            <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item"></span></div>
                        </button>
                        <div class="info-page-tab__content">
                            <p class="info-page-tab__text">{{ __('Заказы могут быть оплачены онлайн банковской картой') }}</p>
                            <p class="info-page-tab__text">{{ __('Также вы можете оплатить заказ наличными') }}</p>
                        </div>
                    </div>

                    <div class="info-page-tab">
                        <button class="info-page-tab__button" type="button">
                            <span class="info-page-tab__title">{{ __('Как узнать в каком из фирменных бутиков есть нужное мне украшение?') }}</span>
                            <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item"></span></div>
                        </button>
                        <div class="info-page-tab__content">
                            <p class="info-page-tab__text">{{ __('Оставьте заявку для обратной связи.') }}</p>
                            <p class="info-page-tab__text">{{ __('Назовите консультанту артикул выбранного изделия') }}</p>
                        </div>
                    </div>

                    <div class="info-page-tab">
                        <button class="info-page-tab__button" type="button">
                            <span class="info-page-tab__title">{{ __('Можно ли добавить еще одну позицию') }}</span>
                            <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item"></span></div>
                        </button>
                        <div class="info-page-tab__content">
                        <p class="info-page-tab__text">{{ __('Внесение изменений в подтвержденный заказ') }}</p>
                        </div>
                    </div>

                    <div class="info-page-tab">
                        <button class="info-page-tab__button" type="button">
                            <span class="info-page-tab__title">{{ __('Можно ли вернуть товар?') }}</span>
                            <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item"></span></div>
                        </button>
                        <div class="info-page-tab__content">
                            <p class="info-page-tab__text">
                               {{ __('Вы можете вернуть товар, который вам не подошел') }}
                            </p>
                            <p class="info-page-tab__text">
                                {{ __('Чтобы узнать подробнее об условиях возврата') }}
                            </p>
                        </div>
                    </div>

                    <div class="info-page-tab">
                        <button class="info-page-tab__button" type="button">
                            <span class="info-page-tab__title">{{ __('В какие сроки можно оформить возврат?') }}</span>
                            <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item"></span></div>
                        </button>
                        <div class="info-page-tab__content">
                            <p class="info-page-tab__text">{{ __('В соответствии с законодательством РК') }}</p>
                        </div>
                    </div>

                    <div class="info-page-tab">
                        <button class="info-page-tab__button" type="button">
                            <span class="info-page-tab__title">{{ __('Когда вернут деньги за товар?') }}</span>
                            <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item"></span></div>
                        </button>
                        <div class="info-page-tab__content">
                            <p class="info-page-tab__text">{{ __('Деньги за заказ вернутся на вашу карту') }}</p>
                            <p class="info-page-tab__text">{{ __('Обращаем ваше внимание, что возврат') }}</p>
                        </div>
                    </div>

                    <div class="info-page-tab">
                        <button class="info-page-tab__button" type="button">
                            <span class="info-page-tab__title">{{ __('Есть ли у вас особые условия для постоянных покупателей?') }}</span>
                            <div class="info-page-tab__mark"><span class="info-page-tab__mark-item"></span><span class="info-page-tab__mark-item"></span></div>
                        </button>
                        <div class="info-page-tab__content">
                            <p class="info-page-tab__text">{{ __('Да, в нашей компании разработана') }}</p>
                            <p class="info-page-tab__text">{!! __('Чтобы узнать подробнее об условиях Программы') !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            @include('partials.info_sidebar')
    </section>
</div>
</div>
@stop
