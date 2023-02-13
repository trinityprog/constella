{{-- @extends('layouts.theme')--}}

{{--@section('title', 'Заявка на возврат')--}}

{{--@section('content')--}}
{{--@handheld--}}
{{--<section>--}}
{{--    <div class="refund-request">--}}
{{--        <div class="container">--}}
{{--            <p class="dropdown-list title-1"> Заказы <img src="{{ url('i/icons/arrow-down-sort.svg') }}" class="img" alt=""></p>--}}
{{--            <div class="slidedown-element">--}}
{{--                <div class="refund-request-info">--}}
{{--                    <p class="refund-request-title">Заявка на возврат</p>--}}
{{--                    <div class="refund-request-item">--}}
{{--                        <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path d="M7 13.0909C7.13845 13.0909 7.27379 13.0483 7.3889 12.9683C7.50401 12.8884 7.59373 12.7748 7.64672 12.642C7.6997 12.5091 7.71356 12.3628 7.68655 12.2218C7.65954 12.0807 7.59287 11.9511 7.49497 11.8494C7.39708 11.7477 7.27235 11.6784 7.13656 11.6503C7.00078 11.6223 6.86003 11.6367 6.73212 11.6917C6.60421 11.7468 6.49489 11.84 6.41797 11.9596C6.34105 12.0792 6.3 12.2198 6.3 12.3636C6.3 12.5565 6.37375 12.7415 6.50503 12.8779C6.6363 13.0143 6.81435 13.0909 7 13.0909ZM10.5 13.0909C10.6384 13.0909 10.7738 13.0483 10.8889 12.9683C11.004 12.8884 11.0937 12.7748 11.1467 12.642C11.1997 12.5091 11.2136 12.3628 11.1865 12.2218C11.1595 12.0807 11.0929 11.9511 10.995 11.8494C10.8971 11.7477 10.7724 11.6784 10.6366 11.6503C10.5008 11.6223 10.36 11.6367 10.2321 11.6917C10.1042 11.7468 9.99489 11.84 9.91797 11.9596C9.84105 12.0792 9.8 12.2198 9.8 12.3636C9.8 12.5565 9.87375 12.7415 10.005 12.8779C10.1363 13.0143 10.3143 13.0909 10.5 13.0909ZM10.5 10.1818C10.6384 10.1818 10.7738 10.1392 10.8889 10.0593C11.004 9.97934 11.0937 9.86575 11.1467 9.73286C11.1997 9.59997 11.2136 9.45374 11.1865 9.31266C11.1595 9.17159 11.0929 9.042 10.995 8.94029C10.8971 8.83858 10.7724 8.76931 10.6366 8.74125C10.5008 8.71319 10.36 8.72759 10.2321 8.78263C10.1042 8.83768 9.99489 8.93089 9.91797 9.05049C9.84105 9.17009 9.8 9.31071 9.8 9.45455C9.8 9.64743 9.87375 9.83241 10.005 9.96881C10.1363 10.1052 10.3143 10.1818 10.5 10.1818ZM7 10.1818C7.13845 10.1818 7.27379 10.1392 7.3889 10.0593C7.50401 9.97934 7.59373 9.86575 7.64672 9.73286C7.6997 9.59997 7.71356 9.45374 7.68655 9.31266C7.65954 9.17159 7.59287 9.042 7.49497 8.94029C7.39708 8.83858 7.27235 8.76931 7.13656 8.74125C7.00078 8.71319 6.86003 8.72759 6.73212 8.78263C6.60421 8.83768 6.49489 8.93089 6.41797 9.05049C6.34105 9.17009 6.3 9.31071 6.3 9.45455C6.3 9.64743 6.37375 9.83241 6.50503 9.96881C6.6363 10.1052 6.81435 10.1818 7 10.1818ZM11.9 1.45455H11.2V0.727273C11.2 0.534388 11.1263 0.349403 10.995 0.213013C10.8637 0.0766231 10.6857 0 10.5 0C10.3143 0 10.1363 0.0766231 10.005 0.213013C9.87375 0.349403 9.8 0.534388 9.8 0.727273V1.45455H4.2V0.727273C4.2 0.534388 4.12625 0.349403 3.99497 0.213013C3.8637 0.0766231 3.68565 0 3.5 0C3.31435 0 3.1363 0.0766231 3.00503 0.213013C2.87375 0.349403 2.8 0.534388 2.8 0.727273V1.45455H2.1C1.54305 1.45455 1.0089 1.68442 0.615076 2.09359C0.221249 2.50276 0 3.05771 0 3.63636V13.8182C0 14.3968 0.221249 14.9518 0.615076 15.361C1.0089 15.7701 1.54305 16 2.1 16H11.9C12.457 16 12.9911 15.7701 13.3849 15.361C13.7788 14.9518 14 14.3968 14 13.8182V3.63636C14 3.05771 13.7788 2.50276 13.3849 2.09359C12.9911 1.68442 12.457 1.45455 11.9 1.45455ZM12.6 13.8182C12.6 14.0111 12.5263 14.1961 12.395 14.3324C12.2637 14.4688 12.0857 14.5455 11.9 14.5455H2.1C1.91435 14.5455 1.7363 14.4688 1.60503 14.3324C1.47375 14.1961 1.4 14.0111 1.4 13.8182V7.27273H12.6V13.8182ZM12.6 5.81818H1.4V3.63636C1.4 3.44348 1.47375 3.25849 1.60503 3.1221C1.7363 2.98571 1.91435 2.90909 2.1 2.90909H2.8V3.63636C2.8 3.82925 2.87375 4.01423 3.00503 4.15062C3.1363 4.28701 3.31435 4.36364 3.5 4.36364C3.68565 4.36364 3.8637 4.28701 3.99497 4.15062C4.12625 4.01423 4.2 3.82925 4.2 3.63636V2.90909H9.8V3.63636C9.8 3.82925 9.87375 4.01423 10.005 4.15062C10.1363 4.28701 10.3143 4.36364 10.5 4.36364C10.6857 4.36364 10.8637 4.28701 10.995 4.15062C11.1263 4.01423 11.2 3.82925 11.2 3.63636V2.90909H11.9C12.0857 2.90909 12.2637 2.98571 12.395 3.1221C12.5263 3.25849 12.6 3.44348 12.6 3.63636V5.81818ZM3.5 10.1818C3.63845 10.1818 3.77378 10.1392 3.8889 10.0593C4.00401 9.97934 4.09373 9.86575 4.14672 9.73286C4.1997 9.59997 4.21356 9.45374 4.18655 9.31266C4.15954 9.17159 4.09287 9.042 3.99497 8.94029C3.89708 8.83858 3.77235 8.76931 3.63656 8.74125C3.50078 8.71319 3.36003 8.72759 3.23212 8.78263C3.10421 8.83768 2.99489 8.93089 2.91797 9.05049C2.84105 9.17009 2.8 9.31071 2.8 9.45455C2.8 9.64743 2.87375 9.83241 3.00503 9.96881C3.1363 10.1052 3.31435 10.1818 3.5 10.1818ZM3.5 13.0909C3.63845 13.0909 3.77378 13.0483 3.8889 12.9683C4.00401 12.8884 4.09373 12.7748 4.14672 12.642C4.1997 12.5091 4.21356 12.3628 4.18655 12.2218C4.15954 12.0807 4.09287 11.9511 3.99497 11.8494C3.89708 11.7477 3.77235 11.6784 3.63656 11.6503C3.50078 11.6223 3.36003 11.6367 3.23212 11.6917C3.10421 11.7468 2.99489 11.84 2.91797 11.9596C2.84105 12.0792 2.8 12.2198 2.8 12.3636C2.8 12.5565 2.87375 12.7415 3.00503 12.8779C3.1363 13.0143 3.31435 13.0909 3.5 13.0909Z" fill="#272727"/>--}}
{{--                        </svg>--}}
{{--                        <p class="head">14 календарных дней</p>--}}
{{--                        <p class="text">--}}
{{--                            В течение этого срока с <br>--}}
{{--                            момента покупки, вы можете <br>--}}
{{--                            вернуть товар в магазин--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div class="refund-request-item">--}}
{{--                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path d="M5.032 7.432C4.95917 7.50808 4.90207 7.5978 4.864 7.696C4.78398 7.89077 4.78398 8.10923 4.864 8.304C4.90207 8.4022 4.95917 8.49191 5.032 8.568L7.432 10.968C7.58264 11.1186 7.78696 11.2033 8 11.2033C8.21304 11.2033 8.41735 11.1186 8.568 10.968C8.71864 10.8174 8.80327 10.613 8.80327 10.4C8.80327 10.187 8.71864 9.98264 8.568 9.832L7.528 8.8H10.4C10.6122 8.8 10.8157 8.71571 10.9657 8.56568C11.1157 8.41565 11.2 8.21217 11.2 8C11.2 7.78782 11.1157 7.58434 10.9657 7.43431C10.8157 7.28428 10.6122 7.2 10.4 7.2H7.528L8.568 6.168C8.64298 6.09363 8.7025 6.00515 8.74311 5.90766C8.78373 5.81017 8.80464 5.70561 8.80464 5.6C8.80464 5.49439 8.78373 5.38982 8.74311 5.29234C8.7025 5.19485 8.64298 5.10637 8.568 5.032C8.49363 4.95702 8.40515 4.8975 8.30766 4.85689C8.21017 4.81627 8.10561 4.79536 8 4.79536C7.89439 4.79536 7.78982 4.81627 7.69234 4.85689C7.59485 4.8975 7.50637 4.95702 7.432 5.032L5.032 7.432ZM0 8C0 9.58225 0.469192 11.129 1.34824 12.4446C2.22729 13.7602 3.47672 14.7855 4.93853 15.391C6.40034 15.9965 8.00887 16.155 9.56072 15.8463C11.1126 15.5376 12.538 14.7757 13.6569 13.6569C14.7757 12.538 15.5376 11.1126 15.8463 9.56072C16.155 8.00887 15.9965 6.40034 15.391 4.93853C14.7855 3.47672 13.7602 2.22729 12.4446 1.34824C11.129 0.469192 9.58225 0 8 0C6.94942 0 5.90914 0.206926 4.93853 0.608964C3.96793 1.011 3.08601 1.60028 2.34315 2.34315C0.842854 3.84344 0 5.87827 0 8ZM14.4 8C14.4 9.2658 14.0246 10.5032 13.3214 11.5556C12.6182 12.6081 11.6186 13.4284 10.4492 13.9128C9.27972 14.3972 7.9929 14.524 6.75142 14.277C5.50994 14.0301 4.36957 13.4205 3.47452 12.5255C2.57946 11.6304 1.96992 10.4901 1.72297 9.24858C1.47603 8.0071 1.60277 6.72027 2.08717 5.55082C2.57157 4.38138 3.39187 3.38183 4.44435 2.67859C5.49682 1.97535 6.7342 1.6 8 1.6C9.69738 1.6 11.3252 2.27428 12.5255 3.47452C13.7257 4.67475 14.4 6.30261 14.4 8Z" fill="#2E3338"/>--}}
{{--                        </svg>--}}
{{--                        <p class="head">Возврат денежных средств</p>--}}
{{--                        <p class="text">--}}
{{--                            Деньги поступят на вашу карту в <br>--}}
{{--                            течение 14 рабочих дней с момента <br>--}}
{{--                            получения товара в наш магазин--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <form action="" class="form styled" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="order_number">Номер заказа</label>--}}
{{--                        <input type="text" name="order_number" placeholder="Номер заказа">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="full_number">ФИО</label>--}}
{{--                        <input type="text" name="full_number" placeholder="ФИО">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="phone">Телефон</label>--}}
{{--                        <input type="tel" name="phone" placeholder="Телефон">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="reason">Причина возврата</label>--}}
{{--                        <input type="text" name="reason" placeholder="Причина возврата">--}}
{{--                    </div>--}}
{{--                    <div class="attention">--}}
{{--                        <div class="flex flex-column">--}}
{{--                            <img src="{{ asset('i/icons/i-sign.png') }}" alt="">--}}
{{--                            <p class="text">--}}
{{--                                В соответствии с законодательством РК, <br>--}}
{{--                                чтобы вернуть ювелирное изделие <br>--}}
{{--                                вам необходимо получить заключение <br>--}}
{{--                                из «Национального центра экспертизы <br>--}}
{{--                                и сертификации»--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="link">--}}
{{--                            Узнать подробности--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="city">Город</label>--}}
{{--                        <input type="text" name="city" placeholder="Город">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="address">Адрес</label>--}}
{{--                        <input type="text" name="address" placeholder="Адрес">--}}
{{--                    </div>--}}

{{--                    <div class="user-btns flex item-center">--}}
{{--                        <button type="submit" class="btn-white">--}}
{{--                            Отменить--}}
{{--                        </button>--}}
{{--                        <button type="button" class="btn-black">--}}
{{--                            Оформить возврат--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--@endhandheld--}}
{{--@endsection--}}
