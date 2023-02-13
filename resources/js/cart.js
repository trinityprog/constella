export function initCart (api)
{
    $(document).on('click', '[data-add-to-cart]', function (e) {
        e.preventDefault();

        window.showLoader();


        let el = $(this);
        let product = el.data('product');

        let modal = $('[data-remodal-id="product-show"]').remodal();

        api.view('/api/product/get-product-info/' + product)
            .then(function(data) {
                return data.text();
            })
            .then(function(html) {
                $('[data-remodal-id="product-show"]').find('.inner-content').html(html);
                window.hideLoader();
                modal.open();
            });
    });

    $(document).on('click', '.action-add-to-cart', function (e) {
        e.preventDefault();

        let el = $(this);

        let product = el.data('product');

        let size = el.parents('.carted').find('.size-item.active').data('size');

        let color = el.parents('.carted').find('.color-item.active').data('color');

        api.post('/api/cart/add-to-cart', {
            product: product,
            size: size,
            color: color,
            amount: el.data('quantity')
        }).then(function(data) {
            return data.json();
        }).then(function(json) {
            if(json.errors) {
                el.parent().find('p').addClass('error');
            }else {
                if(json.status) {
                    if($('[data-remodal-id="product-show"]').length > 0) $('[data-remodal-id="product-show"]').remodal().close();
                    $('.cart-items-count').html(json.count).removeClass('none');

                    let $cart = $('.cart-fresh-product');
                    $cart.find('.name').html(json.product.name);
                    // $cart.find('.close').html(json.product.rowId);
                    $cart.find('.price').html(json.product.price);
                    $cart.find('.size b').html(json.product.options.size);
                    $cart.find('.color b').html(json.product.options.color);
                    $cart.find('img').attr('src', json.product.image);
                    $cart.find('.plus').attr('data-id', json.product.uuid);
                    $cart.find('.minus').attr('data-id', json.product.uuid);

                    $.ajax({
                        url: '/api/cart/notification',
                        headers: {
                            "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'get',
                    })
                        .done(function(data) {
                            $('.droppable.right.cart-notification').empty(data).html(data).addClass('active')
                        })
                }
            }
        });
    });

    // start:  product size choose
    $(document).on('click', '.size-item', function(e) {
        e.preventDefault();
        let isFirstClick = $(this).attr('first-click')
        if($('.color-item.active').length === 0 && ! isFirstClick) {
            let prod_id = $(this).data('product-id')
            let type = 'size'
            let value = $(this).data('size')

            $.ajax({
                type: "GET",
                url: `/api/update-attributes/${prod_id}/${type}/${value}`,
                success: function (data) {
                    $('.carted').find('.colors-list').html(data.colors);
                    $('.carted').find('.sizes-list').html(data.sizes);

                    let el = $('.size-item').first();
                    $(el).siblings('.size-item').removeClass('active');
                    $(el).parents('.carted').find('.choosen-size').html($(el).data('sname'));

                    $(el).addClass('active');
                }
            });
        } else {
            $(this).siblings('.size-item').removeClass('active');
            $(this).parents('.carted').find('.choosen-size').html($(this).data('sname'));

            $(this).addClass('active');
        }
    });
    // end: product size choose

    // start: product color choose
    $(document).on('click', '.color-item', function(e) {
        e.preventDefault();
        let isFirstClick = $(this).attr('first-click')
        if($('.size-item.active').length === 0 && ! isFirstClick) {
            let prod_id = $(this).data('product-id')
            let type = 'color'
            let value = $(this).data('attr')

            $.ajax({
                type: "GET",
                url: `/api/update-attributes/${prod_id}/${type}/${value}`,
                success: function (data) {
                    $('.carted').find('.colors-list').html(data.colors);
                    $('.carted').find('.sizes-list').html(data.sizes);

                    let el = $('.color-item').first();
                    $(el).siblings('.color-item').removeClass('active');
                    $(el).parents('.carted').find('.choosen-color').html($(el).data('cname'));

                    $(el).addClass('active');
                }
            });
        } else {
            $(this).siblings('.color-item').removeClass('active');
            $(this).parents('.carted').find('.choosen-color').html($(this).data('cname'));

            $(this).addClass('active');
        }
        let value = $(this).data('attr')
        let slide_id = -1
        window.productSlider.slides.forEach(function (slide, index)
        {
            if($(slide).data('color-attr') == value) slide_id = index }
        )
        if(slide_id >= 0) window.productSlider.slideTo(slide_id)
    });
    // end: product color choose



    // start: card add one
    $(document).on('click', '.counters .plus, .counters .minus', function(e) {
        e.preventDefault();
        let el = $(this);

        let count = parseInt(el.parents('.counters').find('span').text());
        let type = el.data('type');

        if(type === 'plus')
            count += 1;
        else {
            if(count-1 > 0) {
                count -= 1;
            }
        }

        if(el.parents('.counters-product').length === 0) {
            api.post('/api/cart/update-qty', {
                product: el.data('id'),
                qty: count
            }).then(function(data) {
                return data.json();
            }).then(function(json) {
                if($('.cart-full-price').length > 0) $('.cart-full-price span').html(json.total);
                el.parents('.counters').find('span').html(count);

                if(json.count > 0) $('.cart-items-count').html(json.count).removeClass('none');
                else $('.cart-items-count').addClass('none');

                $('.cart-total span').html(json.count);
            });
        }

        if(el.parents('.counters-product').length === 1) {
            let orderId = el.parents('.counters-product').data('order');
            api.post('/api/order/update-qty', {
                product: el.data('id'),
                qty: count,
                order: orderId,
            }).then(function(data) {
                return data.json();
            }).then(function(json) {
                if($('.cart-full-price').length > 0) $('.cart-full-price span').html(json.total);
                el.parents('.counters').find('span').html(count);
                if(json.count > 0) $('.cart-items-count').html(json.count).removeClass('none');
                else $('.cart-items-count').addClass('none');
                $('.cart-total span').html(json.count);
            })
        }
    });
    // end: card add one

    $(document).on('click', '.order-item .close, .cart-title .close', function(e) {
        e.preventDefault();

        let el = $(this);
        el.parents('.order-item').fadeOut();
        el.parents('.cart-item').fadeOut();

        if(el.parents('.grid-products').length === 0) {
            api.post('/api/cart/remove-item', {
                product: el.data('id')
            }).then(function(data) {
                return data.json();
            }).then(function(json) {
                if($('.cart-full-price').length > 0) {
                    $('.cart-full-price span').html(json.total);
                    if(json.count === 0) {
                        $('.holder-right .btn-black').addClass('disabled');
                    }
                }

                if(json.count > 0) $('.cart-items-count').html(json.count).removeClass('none');
                else $('.cart-items-count').addClass('none');

                $('.cart-total span').html(json.count);
            });
        }

        if(el.parents('.grid-products').length === 1) {
            let orderId = el.data('order');
            api.post('/api/order/remove-item', {
                product: el.data('id'),
                order: orderId,
            }).then(function(data) {
                return data.json();
            }).then(function(json) {
                if(json.last === 'last') {
                    location.replace(location.origin + '/profile');
                }

                if($('.cart-full-price').length > 0) {
                    $('.cart-full-price span').html(json.total);
                    if(json.count === 0) {
                        $('.holder-right .btn-black').addClass('disabled');
                    }
                }

                if(json.count > 0) $('.cart-items-count').html(json.count).removeClass('none');
                else $('.cart-items-count').addClass('none');

                $('.cart-total span').html(json.count);
            });
        }
    });

    $(document).on('click', '.product-item-close', function(e) {
        e.preventDefault();

        let el = $(this);
        let id = $(el).attr("data-id");


        if($(this).parents('.products-list').length === 1) {
            $.ajax({
                type: 'POST',
                url: `/profile/remove-item/${id}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function () {
                    $(el).parents('.product').fadeOut();
                },
            });
        }
    });
}
