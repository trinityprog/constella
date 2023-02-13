<div class="profile-page orders">
    <div class="container">
        <p class="dropdown-list title-1"> Заказы <img src="{{ url('i/icons/arrow-down-sort.svg') }}" class="img" alt=""></p>
        <div class="flex orders-sort">
            <p>ЗАКАЗЫ 3</p>
            <a href="#product-returns">ВОЗВРАТЫ  2</a>
        </div>
        <div class="slidedown-element orders-list">
            <div class="orders-item">
                <img src="{{ asset('i/products/20200901-1908920.jpg') }}" alt="">
                <div class="info">
                    <p>№ 4545322</p>
                    <p class="in-work">В обработке</p>
                    <p>4 товара</p>
                    <p>Сумма $ 23 840</p>
                </div>
            </div>
            <div class="orders-item">
                <img src="{{ asset('i/products/20200901-1908920.jpg') }}" alt="">
                <div class="info">
                    <p>№ 4545322</p>
                    <p class="in-work">В обработке</p>
                    <p>4 товара</p>
                    <p>Сумма $ 23 840</p>
                </div>
            </div>
            <div class="orders-item">
                <img src="{{ asset('i/products/20200901-1908920.jpg') }}" alt="">
                <div class="info">
                    <p>№ 4545322</p>
                    <p class="in-work">В обработке</p>
                    <p>4 товара</p>
                    <p>Сумма $ 23 840</p>
                </div>
            </div>
            <div class="orders-item">
                <img src="{{ asset('i/products/20200901-1908920.jpg') }}" alt="">
                <div class="info">
                    <p>№ 4545322</p>
                    <p class="in-work">В обработке</p>
                    <p>4 товара</p>
                    <p>Сумма $ 23 840</p>
                </div>
            </div>
        </div>
        @include('partials.user_support', ['withLoyalty' => true])
    </div>
</div>


@section('modal')
    <div class="remodal" data-remodal-id="product-returns">
        <button data-remodal-action="close" class="remodal-close"></button>
        <h1>Возврат товара</h1>
        <div class="modal-body">
            <div class="info-item">
                <a href="#" class="title">
                    <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5987 10.2011C13.9295 10.2011 13.3864 9.65875 13.3864 8.98953C13.3864 8.32031 13.9295 7.77729 14.5987 7.77729C15.2679 7.77729 15.8109 8.32031 15.8109 8.98953C15.8109 9.65875 15.2679 10.2011 14.5987 10.2011ZM11.0345 9.95049H6.96584C6.43364 9.95049 6.00167 9.51852 6.00167 8.98632C6.00167 8.45339 6.43364 8.02143 6.96584 8.02143H11.0345C11.5675 8.02143 11.9987 8.45339 11.9987 8.98632C11.9987 9.51852 11.5675 9.95049 11.0345 9.95049ZM3.40167 10.2011C2.73245 10.2011 2.19015 9.65875 2.19015 8.98953C2.19015 8.32031 2.73245 7.77729 3.40167 7.77729C4.07089 7.77729 4.61319 8.32031 4.61319 8.98953C4.61319 9.65875 4.07089 10.2011 3.40167 10.2011ZM5.47439 1.36518H9.0015H12.5286C14.1779 1.36518 14.8817 3.72404 15.1305 4.91176C14.9603 4.8858 14.7901 4.85984 14.6127 4.85984H3.39029C3.21289 4.85984 3.0427 4.8858 2.87179 4.91176C3.12203 3.72404 3.82586 1.36518 5.47439 1.36518ZM16.3829 5.37144C16.2971 4.70005 15.6084 0.210938 12.527 0.210938H8.99987H5.47276C2.39131 0.210938 1.70262 4.70005 1.6168 5.37144C0.64975 5.96854 0 7.02862 0 8.24808V9.45743V9.99108V13.2146C0 13.8744 0.535088 14.4095 1.19493 14.4095H1.66151C2.32136 14.4095 2.85645 13.8744 2.85645 13.2146V12.0045L8.52391 12.1185L15.144 11.9858V13.2146C15.144 13.8744 15.6784 14.4095 16.3382 14.4095H16.8055C17.4654 14.4095 17.9997 13.8744 17.9997 13.2146V9.99108V9.45743V8.24808C17.9997 7.02862 17.3493 5.96854 16.3829 5.37144Z" fill="#2E3338"/>
                    </svg>
                    ВЫЗОВ КУРЬЕРА
                </a>
                <p class="text">
                    Для оформления возврата с помощью курьера,<br>
                    вам нужно заполнить бланк возврата товара.
                </p>
            </div>
            <div class="info-item">
                <a href="#" class="title">
                    <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.99997 0C2.24296 0 0 2.33729 0 5.21023C0 6.81722 0.793982 8.76774 2.35996 11.0076C3.50595 12.6468 4.63522 13.8158 4.68274 13.8648C4.77009 13.9549 4.88501 14 5.00005 14C5.11176 14 5.22355 13.9574 5.3102 13.8719C5.35783 13.825 6.48996 12.7033 7.63811 11.0867C9.20535 8.88004 10 6.90292 10 5.2102C9.99995 2.33729 7.75693 0 4.99997 0ZM4.99997 7.45955C3.65209 7.45955 2.55555 6.33704 2.55555 4.95729C2.55555 3.57755 3.65212 2.45504 4.99997 2.45504C6.34782 2.45504 7.4444 3.57755 7.4444 4.95729C7.4444 6.33704 6.3478 7.45955 4.99997 7.45955Z" fill="#272727"/>
                    </svg>
                    САМОСТОЯТЕЛЬНО
                </a>
                <p class="text">
                    Вы можете лично привезти товар, который вам <br>
                    не подошёл, в один из наших фирменных магазинов
                </p>
            </div>
        </div>
    </div>
@stop
