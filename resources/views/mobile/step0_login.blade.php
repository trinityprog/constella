<section class="step-page">
    <div class="container">
        <div class="step-page-block">
            <form action="" class="step-page-form form styled" method="post">
                <h3 class="step-page-form__title">
                    Войдите чтобы продолжить оформление заказа
                </h3>
                @csrf
                <div class="form-group">
                    <label class="step-page-form__template"></label>
                    <input type="email" name="log_email" class="step-page-form__template-input" placeholder="Введите Email">
                </div>
                <div class="form-group">
                    <label class="step-page-form__template template-two"></label>
                    <input type="password" name="log_password" class="step-page-form__template-input" placeholder="Введите пароль">
                    <a href="{{ route('order.step-0') }}" class="link">Забыли пароль?</a>
                </div>
                <div class="form-group">
                    <a href="" class="continue">ПРОДОЛЖИТЬ КАК ГОСТЬ</a>
                    <button class="btn-black" type="submit">Войти</button>
                </div>
            </form>
        </div>
    </div>
</section>
