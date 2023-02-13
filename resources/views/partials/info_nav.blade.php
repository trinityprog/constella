<aside class="sidebar-left">
    <h3 class="info-page-title sidebar-left-title dropdown-list help-m-header mobile-slideover">
        {{ __('Помощь') }}
        @handheld
        <img src="{{ url('i/icons/arrow-down-sort.svg') }}" alt="">
        @endhandheld
    </h3>
    <nav class="info-page-nav slidedown-element">
        <ul class="info-page-list">
            <li class="info-page-list__item {{ request()->routeIs('page.info.delivery') ? 'active' : '' }}">
                <a href="{{ route('page.info.delivery') }}" class="info-page-list__link">
                    <div class="info-page-list__image">
                        <svg width="12" height="12" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 0C8.52679 0 8.06191 0.124366 7.65193 0.360619L4.77734 2.00324C4.58584 2.04036 4.40715 2.13923 4.27327 2.29127L1.35347 3.95973L1.35 3.96173C1.01507 4.1551 0.726491 4.41763 0.502872 4.73072C0.450936 4.78364 0.404743 4.8439 0.365899 4.91105C0.332878 4.96813 0.306826 5.02733 0.28748 5.08766C0.0991917 5.46235 0.000431587 5.87645 0 6.29723V13.4991C0.000485641 13.9726 0.125473 14.4376 0.362423 14.8475C0.599373 15.2574 0.939954 15.5978 1.35 15.8346L1.35347 15.8366L7.65 19.4346L7.65166 19.4355C7.93587 19.5994 8.24646 19.7094 8.56793 19.7615C8.69528 19.8305 8.84114 19.8697 8.99617 19.8697C9.14988 19.8697 9.29459 19.8312 9.42117 19.7633C9.74653 19.7119 10.061 19.6012 10.3484 19.4355L10.35 19.4346L16.6465 15.8366L16.65 15.8346C17.06 15.5978 17.4006 15.2574 17.6376 14.8475C17.8745 14.4376 17.9995 13.9726 18 13.4991V6.29723C17.9996 5.88411 17.9044 5.47742 17.7227 5.10815C17.7029 5.04073 17.6747 4.97458 17.638 4.91105C17.5958 4.83803 17.5448 4.77318 17.4873 4.71703C17.2651 4.40997 16.98 4.15227 16.65 3.96172L10.35 0.361731L10.3481 0.360648C9.93813 0.124377 9.47322 0 9 0ZM9.89617 17.6208L15.75 14.2757L15.7514 14.2749C15.8875 14.196 16.0005 14.0829 16.0792 13.9467C16.1582 13.8101 16.1998 13.6551 16.2 13.4972V6.78261L9.89617 10.4292V17.6208ZM8.09617 10.4225L1.8 6.78036V13.4976C1.80023 13.6553 1.84189 13.8102 1.92081 13.9467C1.99952 14.0829 2.11253 14.196 2.24858 14.2749L2.25 14.2757L8.09617 17.6164V10.4225ZM9.45 1.92058L15.2655 5.24372L13.0546 6.52263L6.80417 2.91821L8.54653 1.92258L8.55 1.92058C8.68682 1.84159 8.84202 1.8 9 1.8C9.15798 1.8 9.31318 1.84159 9.45 1.92058ZM9.00194 8.86697L11.2558 7.56317L4.99434 3.95239L2.73646 5.2426L9.00194 8.86697Z" fill="#272727" />
                        </svg>
                    </div>
                    <p class="info-page-list__text">
                        {{ __('Доставка') }}
                    </p>
                </a>
            </li>

            <li class="info-page-list__item">
                <a href="{{ route('page.info.return') }}" class="info-page-list__link {{ request()->routeIs('page.info.return') ? 'active' : '' }}">
                    <div class="info-page-list__image">
                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.979 3.05975H8.529L6.579 1.10975C6.325 0.85575 6.325 0.44375 6.579 0.18975C6.833 -0.06325 7.244 -0.06325 7.498 0.18975L10.505 3.19775C10.627 3.31975 10.696 3.48475 10.696 3.65775C10.696 3.82975 10.627 3.99475 10.505 4.11675L7.394 7.22775C7.267 7.35475 7.101 7.41875 6.934 7.41875C6.768 7.41875 6.602 7.35475 6.475 7.22775C6.221 6.97475 6.221 6.56275 6.475 6.30875L8.424 4.35975H3.979C2.501 4.35975 1.299 5.56175 1.299 7.03875C1.299 8.51775 2.501 9.71975 3.979 9.71975H5.519C5.878 9.71975 6.169 10.0107 6.169 10.3687C6.169 10.7277 5.878 11.0188 5.519 11.0188H3.979C1.785 11.0188 0 9.23375 0 7.03875C0 4.84475 1.785 3.05975 3.979 3.05975Z" fill="#272727" />
                        </svg>
                    </div>
                    <p class="info-page-list__text">
                        {{ __('Возврат товара') }}
                    </p>
                </a>
            </li>

            <li class="info-page-list__item">
                <a href="{{ route('page.info.payment') }}" class="info-page-list__link {{ request()->routeIs('page.info.payment') ? 'active' : '' }}">
                    <div class="info-page-list__image">
                        <svg width="11" height="11" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.875 1H8.125C4.76624 1 3.08686 1 2.04343 2.02703C1 3.05406 1 4.70703 1 8.01299V10.3506C1 13.6566 1 15.3096 2.04343 16.3366C3.08686 17.3636 4.76624 17.3636 8.125 17.3636H12.875C16.2338 17.3636 17.9131 17.3636 18.9566 16.3366C20 15.3096 20 13.6566 20 10.3506V8.01299C20 4.70703 20 3.05406 18.9566 2.02703C17.9131 1 16.2338 1 12.875 1Z" stroke="#272727" stroke-width="1.8" />
                            <path d="M6.18164 5.90918H9.63619" stroke="#272727" stroke-width="1.8" stroke-linecap="round" />
                            <path d="M13.0909 10.4541V9.54501C13.0909 8.6022 13.0909 8.1308 13.3838 7.8379C13.6767 7.54501 14.1481 7.54501 15.0909 7.54501L18 7.54501C18.9428 7.54501 19.4142 7.54501 19.7071 7.8379C20 8.1308 20 8.6022 20 9.54501V10.4541C20 11.3969 20 11.8683 19.7071 12.1612C19.4142 12.4541 18.9428 12.4541 18 12.4541H15.0909C14.1481 12.4541 13.6767 12.4541 13.3838 12.1612C13.0909 11.8683 13.0909 11.3969 13.0909 10.4541Z" stroke="#272727" stroke-width="1.8" />
                        </svg>
                    </div>
                    <p class="info-page-list__text">
                        {{ __('Способы оплаты') }}
                    </p>
                </a>
            </li>

            <li class="info-page-list__item">
                <a href="{{ route('page.info.size_guide') }}" class="info-page-list__link {{ request()->routeIs('page.info.size_guide') ? 'active' : '' }}">
                    <div class="info-page-list__image">
                        <svg width="14" height="14" viewBox="0 0 21 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.857421 0.977791L0.826514 7.94452C0.826984 8.05957 0.850159 8.1734 0.894712 8.27948C0.939265 8.38556 1.00432 8.4818 1.08614 8.56269C1.249 8.72417 1.46879 8.8152 1.69813 8.81613L19.2231 8.84704C19.4541 8.84636 19.6754 8.75431 19.8387 8.59099C20.002 8.42768 20.0941 8.20638 20.0947 7.97543L20.0947 0.977794C20.0943 0.86274 20.0711 0.74891 20.0265 0.642832C19.982 0.536754 19.9169 0.440512 19.8351 0.359628C19.6723 0.198141 19.4525 0.107118 19.2231 0.10618L15.7243 0.106179L5.22785 0.106179L1.72904 0.106178C1.49808 0.106866 1.27678 0.198916 1.11347 0.362227C0.95016 0.525538 0.85811 0.746837 0.857421 0.977791ZM4.35624 1.85559L4.35624 2.73338C4.35693 2.96434 4.44898 3.18564 4.61229 3.34895C4.7756 3.51226 4.9969 3.60431 5.22785 3.605C5.34326 3.60547 5.45762 3.58309 5.56433 3.53914C5.67104 3.4952 5.768 3.43056 5.84961 3.34895C5.93121 3.26735 5.99585 3.17039 6.0398 3.06368C6.08374 2.95697 6.10612 2.84261 6.10565 2.7272L6.10565 1.84941L7.85506 1.85559L7.85506 4.47661C7.87204 4.69614 7.97124 4.90117 8.13283 5.05074C8.29441 5.20031 8.50649 5.28339 8.72667 5.2834C8.94686 5.28339 9.15893 5.20031 9.32052 5.05074C9.48211 4.90117 9.5813 4.69614 9.59829 4.47661V1.85559H11.3539L11.3477 2.7272C11.3477 2.96001 11.4402 3.18328 11.6048 3.3479C11.7694 3.51252 11.9927 3.605 12.2255 3.605C12.4583 3.605 12.6816 3.51252 12.8462 3.3479C13.0108 3.18328 13.1033 2.96001 13.1033 2.7272L13.0971 1.85559L14.8465 1.84941L14.8527 4.47661C14.8534 4.70757 14.9454 4.92887 15.1087 5.09218C15.2721 5.25549 15.4934 5.34754 15.7243 5.34823C15.9553 5.34754 16.1766 5.25549 16.3399 5.09218C16.5032 4.92887 16.5952 4.70757 16.5959 4.47661L16.5959 1.85559L18.3453 1.84941V7.10382L2.60683 7.10382L2.60683 1.84941L4.35624 1.85559Z" fill="#2E3338" />
                        </svg>
                    </div>
                    <p class="info-page-list__text">
                        {{ __('Гид по размерам') }}
                    </p>
                </a>
            </li>
            <li class="info-page-list__item">
                <a href="{{ route('page.info.loyalty') }}" class="info-page-list__link {{ request()->routeIs('page.info.loyalty') ? 'active' : '' }}">
                    <div class="info-page-list__image">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.82087 5.06697C3.26576 5.06697 3.70066 4.93505 4.07057 4.68788C4.44048 4.44071 4.72879 4.08941 4.89904 3.67838C5.06929 3.26736 5.11384 2.81508 5.02705 2.37874C4.94025 1.9424 4.72602 1.5416 4.41144 1.22702C4.09685 0.912434 3.69605 0.698199 3.25971 0.611406C2.82337 0.524613 2.37109 0.569158 1.96007 0.739409C1.54905 0.909661 1.19774 1.19797 0.950571 1.56788C0.703405 1.93779 0.57148 2.37269 0.57148 2.81758C0.572131 3.41395 0.809329 3.98572 1.23103 4.40742C1.65273 4.82912 2.2245 5.06632 2.82087 5.06697ZM2.82087 2.06778C2.96917 2.06778 3.11414 2.11176 3.23744 2.19414C3.36074 2.27653 3.45685 2.39364 3.5136 2.53064C3.57035 2.66765 3.5852 2.81841 3.55626 2.96386C3.52733 3.1093 3.45592 3.2429 3.35106 3.34777C3.2462 3.45263 3.1126 3.52404 2.96715 3.55297C2.82171 3.5819 2.67095 3.56705 2.53394 3.5103C2.39693 3.45355 2.27983 3.35745 2.19744 3.23414C2.11505 3.11084 2.07108 2.96587 2.07108 2.81758C2.07121 2.61876 2.15025 2.42812 2.29083 2.28754C2.43142 2.14695 2.62206 2.06791 2.82087 2.06778ZM9.18244 6.92976C8.73755 6.92976 8.30266 7.06168 7.93275 7.30885C7.56284 7.55601 7.27453 7.90732 7.10427 8.31834C6.93402 8.72937 6.88948 9.18164 6.97627 9.61798C7.06306 10.0543 7.2773 10.4551 7.59188 10.7697C7.90647 11.0843 8.30727 11.2985 8.74361 11.3853C9.17995 11.4721 9.63223 11.4276 10.0432 11.2573C10.4543 11.0871 10.8056 10.7988 11.0527 10.4288C11.2999 10.0589 11.4318 9.62404 11.4318 9.17915C11.4312 8.58277 11.194 8.01101 10.7723 7.58931C10.3506 7.1676 9.77882 6.93041 9.18244 6.92976ZM9.18244 9.92895C9.03415 9.92895 8.88918 9.88497 8.76588 9.80258C8.64257 9.72019 8.54647 9.60309 8.48972 9.46608C8.43297 9.32908 8.41812 9.17832 8.44705 9.03287C8.47598 8.88742 8.54739 8.75382 8.65226 8.64896C8.75712 8.5441 8.89072 8.47269 9.03617 8.44376C9.18161 8.41483 9.33237 8.42968 9.46938 8.48643C9.60639 8.54318 9.72349 8.63928 9.80588 8.76258C9.88827 8.88589 9.93224 9.03085 9.93224 9.17915C9.93211 9.37797 9.85307 9.5686 9.71248 9.70919C9.5719 9.84977 9.38126 9.92881 9.18244 9.92895ZM11.7804 0.219671C11.7107 0.150029 11.6281 0.0947841 11.5371 0.0570921C11.4462 0.0194 11.3487 0 11.2502 0C11.1518 0 11.0543 0.0194 10.9633 0.0570921C10.8723 0.0947841 10.7897 0.150029 10.7201 0.219671L0.222922 10.7168C0.152587 10.7863 0.0966818 10.869 0.0584245 10.9601C0.0201672 11.0513 0.000312593 11.1491 3.66156e-06 11.2479C-0.00030527 11.3468 0.0189374 11.4447 0.0566243 11.5361C0.0943112 11.6275 0.149698 11.7105 0.219598 11.7804C0.289498 11.8503 0.37253 11.9057 0.463916 11.9434C0.555303 11.9811 0.65324 12.0003 0.75209 12C0.850941 11.9997 0.948753 11.9798 1.0399 11.9416C1.13105 11.9033 1.21373 11.8474 1.28318 11.7771L11.7804 1.27989C11.85 1.21028 11.9052 1.12764 11.9429 1.03668C11.9806 0.945726 12 0.848235 12 0.749778C12 0.651322 11.9806 0.55383 11.9429 0.462873C11.9052 0.371915 11.85 0.289274 11.7804 0.219671Z" fill="#272727" />
                        </svg>
                    </div>
                    <p class="info-page-list__text">
                        {{ __('Программа лояльности') }}
                    </p>
                </a>
            </li>
            <li class="info-page-list__item">
                <a href="{{ route('page.info.repair') }}" class="info-page-list__link {{ request()->routeIs('page.info.repair') ? 'active' : '' }}">
                    <div class="info-page-list__image">
                        <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.7595 0.691557C10.5042 0.437006 10.2031 0.223022 9.8647 0.0555918C9.69933 -0.0262122 9.50344 -0.0168052 9.34672 0.0805259C9.18999 0.17783 9.09466 0.349215 9.09466 0.533722V2.85136L8.30211 3.34528L7.52098 2.85302V0.533428C7.52098 0.349082 7.42579 0.177803 7.26923 0.0804457C7.11268 -0.0168853 6.91698 -0.0265329 6.75163 0.0549772C6.39114 0.232669 6.08389 0.44684 5.83837 0.691557C5.1935 1.33436 4.75148 2.17982 4.62566 3.0112C4.47413 4.01214 4.7646 4.93609 5.44357 5.61287C5.71899 5.88736 6.20658 6.18301 6.69415 6.33441V12.0559C6.69412 12.483 6.85829 12.8842 7.15643 13.1856C7.45676 13.4892 7.85838 13.6564 8.28712 13.6564H8.28741C8.71533 13.6564 9.1178 13.4901 9.42064 13.1883C9.72653 12.8834 9.8949 12.4813 9.89482 12.0559C9.89477 11.7614 9.65593 11.5226 9.36137 11.5226C9.06676 11.5227 8.82787 11.7616 8.82792 12.0562C8.82795 12.1958 8.77094 12.3295 8.66749 12.4326C8.56599 12.5338 8.43103 12.5895 8.28725 12.5895C8.14556 12.5895 8.01325 12.5348 7.91487 12.4353C7.81564 12.335 7.76102 12.2003 7.76102 12.056V5.90064C7.76102 5.6203 7.54399 5.38779 7.26429 5.36847C6.93421 5.34568 6.41036 5.07012 6.19672 4.85718C5.76448 4.4263 5.58112 3.8274 5.68053 3.17083C5.76394 2.61977 6.04265 2.05422 6.45405 1.59258V3.14728C6.45405 3.33051 6.54807 3.5009 6.70307 3.59858L8.01608 4.42605C8.18904 4.53509 8.40912 4.53563 8.58267 4.4275L9.91024 3.6001C10.0666 3.50267 10.1616 3.33155 10.1616 3.14736V1.61281C10.6491 2.17018 10.935 2.87191 10.935 3.52883C10.935 3.89204 10.8424 4.41737 10.4012 4.85715C10.181 5.07659 9.65676 5.35396 9.33601 5.36922C9.05158 5.38277 8.82792 5.61733 8.82792 5.90208V12.0795C8.82792 12.3741 9.06676 12.613 9.36137 12.613C9.65596 12.613 9.89482 12.3741 9.89482 12.0795V6.34034C10.3817 6.19167 10.8724 5.8939 11.1544 5.61281C11.7088 5.06015 12.0019 4.33955 12.0019 3.52888C12.0019 2.52765 11.5375 1.467 10.7595 0.691557Z" fill="#272727" />
                            <path d="M3.26069 3.32375C3.39073 3.19178 3.44295 3.00177 3.39864 2.82186L2.81185 0.439096C2.75313 0.200713 2.53936 0.0332031 2.29387 0.0332031H1.12026C0.874765 0.0332031 0.660995 0.20074 0.602281 0.439096L0.0154884 2.82186C-0.028821 3.00177 0.0233989 3.19178 0.153441 3.32375L1.20027 4.38645V6.95276C0.579298 7.17295 0.133371 7.76626 0.133371 8.46169V12.0825C0.133264 12.51 0.299732 12.9119 0.602094 13.2143C0.90435 13.5165 1.3061 13.683 1.73332 13.683C1.73345 13.6829 1.73364 13.683 1.73377 13.683C2.16129 13.683 2.56315 13.5165 2.8654 13.2143C3.16768 12.912 3.33415 12.51 3.3341 12.0826V8.46171C3.3341 8.0342 3.1676 7.63234 2.86532 7.33006C2.69359 7.15833 2.48965 7.03042 2.2672 6.95201V4.33231L3.26069 3.32375ZM2.26717 8.46171V12.0826C2.2672 12.2252 2.21172 12.3591 2.11097 12.4598C2.01024 12.5606 1.8763 12.6161 1.73364 12.6161H1.73348C1.59109 12.6161 1.4572 12.5606 1.3565 12.4598C1.25575 12.3591 1.20027 12.2252 1.2003 12.0827V8.46171C1.2003 8.16761 1.43959 7.92829 1.73372 7.92826C1.87622 7.92826 2.01019 7.98374 2.11094 8.0845C2.21169 8.1853 2.2672 8.31925 2.2672 8.46171H2.26717ZM1.70708 3.38059L1.12277 2.78741L1.53831 1.10005H1.87584L2.29141 2.78741L1.70708 3.38059Z" fill="#272727" />
                        </svg>
                    </div>
                    <p class="info-page-list__text">
                        {{ __('Ремонт и чистка украшений') }}
                    </p>
                </a>
            </li>
            <li class="info-page-list__item">
                <a href="{{ route('page.info.faq') }}" class="info-page-list__link {{ request()->routeIs('page.info.faq') ? 'active' : '' }}">
                    <div class="info-page-list__image">
                        <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.41246 9.40625C3.87182 9.40625 3.43359 9.84454 3.43359 10.385C3.43359 10.9257 3.87182 11.364 4.41246 11.364C4.95309 11.364 5.39132 10.9257 5.39132 10.385C5.39132 9.84454 4.95309 9.40625 4.41246 9.40625Z" fill="#272727" />
                            <path d="M4.41114 8.753C4.00182 8.753 3.67009 8.42893 3.67009 8.02908C3.67009 7.00955 4.29998 6.06167 5.23768 5.67067C6.00748 5.34962 6.50788 4.61816 6.5183 3.80243C6.51811 3.79338 6.51791 3.78452 6.51791 3.77547C6.51791 2.64057 5.57288 1.71738 4.41114 1.71738C3.24939 1.71738 2.30436 2.64057 2.30436 3.77547C2.30436 4.17513 1.97263 4.49939 1.56331 4.49939C1.154 4.49939 0.822266 4.17513 0.822266 3.77547C0.822266 1.84218 2.43211 0.269531 4.41114 0.269531C6.378 0.269531 7.98052 1.82333 7.99981 3.7404C8.00039 3.7519 8.00059 3.76359 8.00059 3.77528C8.00097 5.18278 7.14491 6.44946 5.81971 7.0022C5.42043 7.16867 5.15218 7.58134 5.15218 8.02908C5.15218 8.42893 4.82045 8.753 4.41114 8.753Z" fill="#272727" />
                        </svg>

                    </div>
                    <p class="info-page-list__text">
                        FAQ
                    </p>
                </a>
            </li>
            <li class="info-page-list__item">
                <a href="{{ route('page.info.law') }}" class="info-page-list__link {{ request()->routeIs('page.info.law') ? 'active' : '' }}">
                    <div class="info-page-list__image">
                        <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 4L4 4" stroke="#272727" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 7L4 7" stroke="#272727" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9 10L4 10" stroke="#272727" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <rect x="12" y="1" width="12" height="11" rx="2" transform="rotate(90 12 1)" stroke="#272727" stroke-width="1.2" />
                        </svg>
                    </div>
                    <p class="info-page-list__text">
                        {{ __('Юридический раздел') }}
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</aside>