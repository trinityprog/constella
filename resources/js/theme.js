import Api from "./api";

window.$ = window.jQuery = require('jquery');

import Swiper, {EffectFade, Autoplay, Thumbs, Navigation, Lazy} from 'swiper';
Swiper.use([EffectFade, Autoplay, Thumbs, Navigation, Lazy]);
import Cookies from 'js-cookie';
require('jquery-lazy');

require('remodal');
window._ = require('lodash');

import { initFilters } from "./filters";
import { initMasks } from "./masks";
import { initCart } from "./cart";
import {initCdek} from "./cdek";

const mobilePx = 1000;

window.showLoader = function showLoader() {
    $('.loader').css('display', 'flex');
}
window.hideLoader = function hideLoader() {
    $('.loader').css('display', 'none');
}

function copyToClipboard (text)
{
    navigator.clipboard.writeText(text);
}

$(document).ready(function () {

    if(Cookies.get('cookie-accept') === undefined) { Cookies.set('cookie-accept', 0, { expires: 365 }); }

    let isMobile = () => {
        return $(window).width() < mobilePx;
    };

    let api = new Api(location.origin);

    let getFourProductsBrand = (brand = '') => {
        $.ajax({
            url: '/api/index-page/4-products-brand/' + brand,
            headers: {
                "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
            },
            type: 'get',
        })
            .done(function(data) {
                if(isMobile) {
                    $('.brands-recommendations').find('.brand-name').text(data.brand)
                    $('.brands-recommendations').find('.btn-black').attr('href', '/catalog/' + data.sex + '/' + brand)

                    $('.dropdown-list').removeClass('active');
                    $('.dropdown-list').parent().find('.slidedown-element').slideUp();
                }

                $('.brands-recommendations').find('.br-list').empty()

                data.products.forEach((p) => {
                    $('.brands-recommendations').find('.br-list').append(
                        '<div class="br-item">\n' +
                        '    <a href="' + p.link + '">\n' +
                        '        <img src="' + p.image + '" alt="">\n' +
                        '        <span>' + p.title + '</span>\n' +
                        '    </a>\n' +
                        '</div>'
                    )
                })
            })
    }

    if(window.location.pathname === '/' || window.location.pathname === '/female' || window.location.pathname === '/male' || window.location.pathname === '/kids') {
        getFourProductsBrand();
        $('.jewerly-menu .cat-nav-link').click(function (e) {
            e.preventDefault()
            getFourProductsBrand($(this).data('brand'))
        })
    }


    $('.customer-request').click(function () {
        let type = $(this).data('type');
        let remodal = $('[data-remodal-id=contact-us]');

        remodal.find('[name=type]').val(type);
        remodal.find('[data-type]').hide();
        type = type === 'call' ? 'feedback' : type
        remodal.find('[data-type=' + type + ']').show();
        remodal.remodal().open()
    })

    $('.career-button').click(function () {
        let type = $(this).data('type');
        let input = $('#careers_id');
        let remodal = $('[data-remodal-id=send-resume]');

        if ((type != null )) {
            remodal.find(input).append();
            remodal.remodal().open();
        } else {
            remodal.find(input).remove();
            remodal.remodal().open();
        }
    })

    $(document).on('click', '#hamburger-checkbox', function(e){
        let body = $('.body');
        let html = $('.html');

        if ($('body').hasClass('mobile-hidden-x')){
            body.removeClass('mobile-hidden-x');
            html.removeClass('mobile-hidden-x');
            body.addClass('mobile-hidden');
            html.addClass('mobile-hidden');
        } else {
            body.removeClass('mobile-hidden');
            html.removeClass('mobile-hidden');
            body.addClass('mobile-hidden-x');
            html.addClass('mobile-hidden-x');
        }
    });

    $('.use-promocode').click(function () {
        $(this).hide()
        $('#use-promocode-form [name=promocode]').val('')
        $('#use-promocode-form').show()
    })
    $('#use-promocode-form .form-close').click(function () {
        $('#use-promocode-form').hide()
        $('.use-promocode').show()
    })
    $('#use-promocode-form .form-apply').click(function () {
        $('#use-promocode-form .form-group').removeClass('form-group-error')
        $('#use-promocode-form .error-msg').empty()

        let type = 'cart'
        if(location.href.includes('delivery') || location.href.includes('payment')) type = 'order'

        $.ajax({
            url: '/cart/promocode',
            headers: {
                "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            data: {
                type: type,
                promocode: $('#use-promocode-form [name=promocode]').val(),
                order_id: $('#use-promocode-form [name=order_id]').val()
            }
        })
            .done(function(data) {
                if(data.status == 'success') {
                    $('#use-promocode-form').hide()
                    $('.promocode-success').show()
                    $('.cart_total').text(data.cart_total)
                }
            })
            .fail(function(data) {
                $('#use-promocode-form .form-group').addClass('form-group-error')
                $('#use-promocode-form .error-msg').text(data.responseJSON.errors.promocode[0])
            })
    })


    // if ($(".products-sorting")[0]){
    //     let html = $('.html');
    //     html.removeClass('mobile-hidden-x');
    //     html.addClass('mobile-scroll');
    // } else {
    //     let html = $('.html');
    //     html.removeClass('mobile-scroll');
    //     html.addClass('mobile-hidden-x');
    // }

    $('.menu-login').click(function () {
        let line = $('.line');
        let menuToggle = $('#menuToggle');

        menuToggle.find(line).hide();
        $('.close-dropdown').click(function () {
           menuToggle.find(line).show();
        })
    })

    // let loadMoreBtn = document.querySelector('#load-more');
    // let currentItem = 3;
    //
    // loadMoreBtn.onclick = () =>
    // {
    //     let banners = [...document.querySelectorAll('.news-page .banners .banner')];
    //
    //     for (let i = currentItem; i < currentItem + 3; i++)
    //     {
    //         banners[i].style.display = 'block';
    //     }
    //     currentItem += 3;
    //     if (currentItem >= banners.length)
    //     {
    //         loadMoreBtn.style.display = 'none';
    //     }
    // }

    // let paginate = 1;
    // loadMoreData(paginate);
    // $('#load-more').click(function() {
    //     let page = $(this).data('paginate');
    //     loadMoreData(page);
    //     $(this).data('paginate', page+1);
    // });
    // function loadMoreData(paginate) {
    //     $.ajax({
    //         url: '?page=' + paginate,
    //         type: 'get',
    //         datatype: 'html',
    //     })
    //         .done(function(data) {
    //             $('#banner-data').append(data);
    //         })
    //         .fail(function(jqXHR, ajaxOptions, thrownError) {
    //             alert('Something went wrong.');
    //         });
    // }

// Temporary solution; showing hamburger right after reloading page
    if(window.location.search == '?sex')
    {
        let menu = $('#menu');

        menu.css('transition', 'unset');
        $('#menuToggle').find('#hamburger-checkbox').click();
        menu.css('transition', 'transform 0.7s');
    }

    $('.theme-choose .droppable a').on('click', function(e) {
        e.preventDefault();
        let el = $(this);
        let drop = el.parents('.dropdown');

        drop.find('.element').html(el.text());
        drop.find('.droppable').removeClass('active');
        drop.find('[name="theme_id"]').val(el.data('value'));
    });

    const indexSlider = new Swiper('.slider .swiper-container', {
        direction: 'horizontal',
        autoplay: { delay: 3000 },
        loop: true,
        initialSlide: 0
    });

    const indexSwiper = new Swiper('.mobile-swiper', {
        direction: 'horizontal',
        // autoplay: { delay: 3000 },
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });


    let mobilelogin = document.getElementsByClassName("mobile-login");
    if ($('mobilelogin').hasClass('active')) {
        $('.line').css('display', 'none');
    }

    let slidesPerView = 4
    let spaceBetween = 30

    if(isMobile())
    {
        slidesPerView = 3
        spaceBetween = 14
    }

    const zhannaSlider = new Swiper('.zhanna-chose .swiper-container', {
        direction: 'horizontal',
        slidesPerView: slidesPerView,
        spaceBetween: spaceBetween,
        // loop: true,
        preloadImages: false,
        lazy: true,
        // autoplay: {
        //     delay: 3000,
        // }
    });

    let productSliderThumbs = new Swiper('.product-gallery .thumbs', {
        direction: 'vertical',
        slidesPerView: 3,
        watchSlidesProgress: true,
        watchSlidesVisibility: true,
        loop: false,
    });

    let productSlider = new Swiper('.product-gallery .main', {
        direction: 'vertical',
        slidesPerView: 1,
        loop: false,
        thumbs: {
            swiper: productSliderThumbs,
        },
    });

    window.productSlider = productSlider

    $(document).on("click", function (event) {
        let $trigger = $(".dropdown");
        let $help = $('.need-help');

        if ($trigger !== event.target && !$trigger.has(event.target).length && event.target !== $help[0]) {
            $trigger.find('.droppable').removeClass('active');
            $trigger.find('.link').removeClass('active');
        }

        let $menu = $('.big-holder');

        if ($menu !== event.target && !$menu.has(event.target).length) {
            $menu.find('.big-dropdown').removeClass('active');
            $menu.find('.cat-link.active').removeClass('active');
        }
    });

    $('.dropdown .element').not('.clickable').on('click', function (e) {
        e.preventDefault();

        $('.droppable').removeClass('active');
        $('.link').removeClass('active');

        let el = $(this).parents('.dropdown');

        el.find('.link').toggleClass('active');
        el.find('.droppable').toggleClass('active');
    });

    $('.close-dropdown, .tdb-close').on('click', function (e) {
        e.preventDefault();
        $(this).parents('.droppable').removeClass('active').removeClass('super-active');
        $(this).parents('.dropdown').find('.link').removeClass('active');
    });

    // check this
    // $('.droppable').click(function (e) {
    //     e.stopPropagation();
    // });

    $('.info-page .cities .title').click(function (){
        $(this).addClass('active');
    })

    $('[data-link-tab]').on('click', function (e) {
        e.preventDefault();

        let el = $(this);
        let tab = el.data('link-tab');

        el.parents('.tabos').find('[data-link-tab]').removeClass('active');
        $('[data-link-tab="' + tab + '"]').addClass('active');

        el.parents('.tabos').find('[data-tab]').removeClass('active');
        el.parents('.tabos').find('[data-tab="' + tab + '"]').addClass('active');
    });

    $('[data-sex]').on('click', function (e) {
        e.preventDefault();

        let el = $(this);
        $('[data-sex]').removeClass('active');

        el.addClass('active');
        el.parents('.selects').find('input').val(el.data('sex'));
    });

    $('.cat-link').on('click', function (e) {
        let el = $(this);
        let pr = el.parents('.big-holder');

        if (!el.hasClass('clickable')) {
            e.preventDefault();
        }

        if (el.hasClass('active')) {
            $('.cat-link').removeClass('active');
            pr.find('.big-dropdown').removeClass('active');

            return;
        }

        $('.cat-link').removeClass('active');
        $('.big-dropdown').removeClass('active');

        el.addClass('active');
        pr.find('.big-dropdown').addClass('active');
    });

    if(location.pathname === '/' || location.pathname.includes('catalog')) {
        let sticky_init = $('.sticky'), scroll_init = $(window).scrollTop();

        if (scroll_init >= sticky_init.outerHeight()) sticky_init.addClass('fixed');

        $(window).scroll(function () {
            var sticky = $('.sticky'), scroll = $(window).scrollTop();
            if (scroll >= sticky.outerHeight()) sticky.addClass('fixed');
            else sticky.removeClass('fixed');
        });
    }

    $('.add-to-favorites').on('click', function (e) {
        e.preventDefault();
        let el = $(this);
        el.toggleClass('active');

        let product = el.data('product');
        let user = el.data('user');

        api.post('/api/product/add-to-favorites', {
            productId: product,
            userId: user
        }).then(function(data) {
            return data.json();
        }).then(function (json){
            console.log(json);
        });
    });

    // filters
    initFilters();

    // masks
    initMasks();

    // cart
    initCart(api);

    $('[data-delete]').on('click', function (e) {
        e.preventDefault();
        let el = $(this);
        let id = el.data('delete');

        api.post('/api/profile/address-delete', {
            addressId: id,
            location: location.pathname
        }).then(function (data) {
            return data.json();
        }).then(function (json) {
            if (json.status && json.location === "/profile/details") el.parents('.location').fadeOut();
            if (json.status && json.location === "/profile/address/" + id) location.replace(json.url);
        });
    });

    $('.need-help').on('click', function (e){
        e.preventDefault();
        $('.services-pops').addClass('active');
    });

    $('.coverup-item').on('click', function() {
        let el = $(this);
        let type = el.data('type');
        $('.coverup-item').removeClass('active');
        el.addClass('active');
        el.parents('.coverup-list').find('[name="coverup"]').val(type);
    });

    $('.delivery-cities input[name="citychosen"]').on('click', function(){
        $('input[name="citychosen"]').not(this).prop('checked', false);
    });

    $('.d-type').on('click', function () {
        let el = $(this);
        el.parents('.tabos').find('input[type="checkbox"]').prop('checked', false);
    });

    $('.info-page-tab__button').on('click', function(e) {
       e.preventDefault();
       let el = $(this);
       let parent = el.parents('.info-page-tab');
       parent.find('.info-page-tab__mark-item').eq(1).toggleClass('active');
       parent.find('.info-page-tab__content').slideToggle();
    });

    $('.accept-cookies').on('click', function(e) {
        e.preventDefault();
        Cookies.set('cookie-accept', 1, { expires: 365 });
        $('.cookie-acceptance').addClass('hidden');
    });

    $('[data-promocode]').on('click', function(e) {
        e.preventDefault();

        let el = $(this);
        copyToClipboard(el.data('promocode'));
        el.html('Скопировано!');
    });

    $('.lazy').lazy();

    $('.search-toggler').on('click', function(e) {
        e.preventDefault();
        $('.search-expanded').toggle();
        $('.search-input').focus();
    });

    $('.search-input').on('keyup', _.debounce(function (e) {
        if (e.which <= 90 && e.which >= 48 || e.which === 8){
            showLoader();
            let q = $(this).val();

            api.view('/search/' + q).then(function(data) {
                return data.text();
            }) .then(function(html) {
                $('.search-popular').html(html);
                hideLoader()
            });
        }
    }, 300));

    // $('.clear-search').on('click', function(e) {
    //     e.preventDefault();
    //     let $search = $('.search-input');
    //     $search.val('');
    //     $search.keyup();
    // });

    // mobile
    new Swiper('.categories .swiper-container', {
        direction: 'horizontal',
        slidesPerView: 1,
        loop: true,
        autoplay: true,
    });

    new Swiper('.products-also-m .swiper-container', {
        direction: 'horizontal',
        slidesPerView: 2,
        loop: true,
        autoplay: true,
        spaceBetween: 10
    });

    $('.dropdown-list').click(function(e) {
       $(this).toggleClass('active');
       $(this).parent().find('.slidedown-element').stop().slideToggle();
    });

    let notifyModal = $('[data-remodal-id="notify"]');
    if(notifyModal.length > 0) {
        notifyModal.remodal().open();
    }

    $('.gotop').click(function(e) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });

    $('.go-up').click(function(e) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });

    if(location.pathname == '/') {
        var cursor = document.querySelector('.cursor');

        document.addEventListener('mousemove', function(e){
            var x = e.clientX;
            var y = e.clientY;
            cursor.style.transform = `translate3d(calc(${e.clientX}px - 50%), calc(${e.clientY}px - 50%), 0)`
        });
    }

    DG.then(() => {
        var addressesMap = DG.map('map', {
            center: [mapData.country.x, mapData.country.y],
            zoom: mapData.zoom.country
        });

        let mapZoomAndMove = (coordinates, zoom) => {
            addressesMap.setView(coordinates, zoom)
        }

        mapData.addresses.forEach(address => {
            let html = '<div class="addresses-map-marker-container">'
            address.logos.forEach(logo => { html += `<img src="${logo}" alt="">` })
            html += '</div>'

            let addressIcon = DG.divIcon({className: 'addresses-map-marker', html: html, popupAnchor: ['-20%', '-20%']});

            let addressMarker = DG.marker([address.coordinates.x, address.coordinates.y], {icon: addressIcon})
                .on('click', () => { mapZoomAndMove([address.coordinates.x, address.coordinates.y], mapData.zoom.address) })
                .addTo(addressesMap);
            let addressIconDiv =  $(addressMarker._icon);
            addressIconDiv.css({top: `-${addressIconDiv.height() / 2 + 20}px`, left: `-${addressIconDiv.width() / 2}px`})
        })

        $('[data-map-coordinates]').click(function(e) {
            e.preventDefault();

            let type = $(this).data('map-type');
            let coordinates = $(this).data('map-coordinates');

            if($(this).closest('.all-addresses-content').length) $("html, body").animate({ scrollTop: 600 }, "slow");

            console.log($(this).closest('.all-addresses-content').length)


            mapZoomAndMove([coordinates.x, coordinates.y], mapData.zoom[type])
        });
    })

    // IDK what this script for, but he is breaking remodal works

    // $("a[href^='#']").click(function(e) {
    //     e.preventDefault();
    //
    //     let position = $($(this).attr("href")).offset().top;
    //
    //     $("body, html").animate({
    //         scrollTop: position - 150
    //     }, 700 );
    // });

    if (!isMobile())
    {
        $('.sidebar-left').find('nav').removeClass('slidedown-element');
    }

    initCdek(api);
});
