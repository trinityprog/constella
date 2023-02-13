import noUiSlider from 'nouislider';
import wNumb from 'wnumb';

export function initFilters ()
{

    $(document).on('click', '.catalog-sorting a', function(e) {
        e.preventDefault();
        let el = $(this);
        let sort = el.data('sort');
        const url = new URL(window.location.href);
        url.searchParams.set('sorting', sort);
        window.history.replaceState(null, null, url.toString());
        location.reload();
    });

    $(document).on('click', '.filter-name', function (e) {
        e.preventDefault();
        let el = $(this);
        el.parents('.filter-block').toggleClass('active');
        el.parents('.filter-block').find('.toggle').slideToggle();
    });

    $(document).on('click', '.colors-filter li', function (e) {
        e.preventDefault();
        let el = $(this);
        const url = new URL(window.location.href);

        url.searchParams.delete('page');

        if(el.hasClass('active')) {
            el.removeClass('active');
            let params = url.searchParams.getAll(el.data('type') + '[]')
            if(params.includes(el.data('value'))) {
                url.searchParams.delete(el.data('type') + '[]')
                let filteredParams = params.filter(e => e !== el.data('value'))
                filteredParams.forEach(e => url.searchParams.append(el.data('type') + '[]', e))
            }
        } else {
            el.addClass('active');
            if(! url.searchParams.getAll(el.data('type') + '[]').includes(el.data('value'))) {
                url.searchParams.append(el.data('type') + '[]', el.data('value'))
            }
        }

        window.history.replaceState(null, null, url.toString());
        location.reload();
    });

    $(document).on('click', '.list-filter li a', function (e) {
        e.preventDefault();

        let el = $(this);
        const url = new URL(window.location.href);

        url.searchParams.delete('page');

        if(el.hasClass('active')) {
            el.removeClass('active');
            let params = url.searchParams.getAll(el.data('type') + '[]')
            if(params.includes(el.data('value'))) {
                url.searchParams.delete(el.data('type') + '[]')
                let filteredParams = params.filter(e => e !== el.data('value'))
                filteredParams.forEach(e => url.searchParams.append(el.data('type') + '[]', e))
            }
        }else {
            el.addClass('active');
            if(! url.searchParams.getAll(el.data('type') + '[]').includes(el.data('value'))) {
                url.searchParams.append(el.data('type') + '[]', el.data('value'))
            }
        }

        window.history.replaceState(null, null, url.toString());
        location.reload();
    });

    let priceSlider = $('.price-slider');
    let from = priceSlider.data('from');
    let to = priceSlider.data('to');
    let step = priceSlider.data('step');

    let initStart = from;
    let initEnd = to;

    if($('input[rel="price_from"]').val() >= 0 && $('input[rel="price_to"]').val() > 0) {
        initStart = parseFloat($('input[rel="price_from"]').val());
        initEnd = parseFloat($('input[rel="price_to"]').val());
    }

    if(priceSlider.length > 0) {
        const url = new URL(window.location.href);

        url.searchParams.delete('page');

        noUiSlider.create(priceSlider[0], {
            start: [initStart, initEnd],
            connect: true,
            step: step,
            range: {
                'min': from,
                'max': to
            },
            format: wNumb({
                decimals: 0,
                suffix: ' ' + priceSlider.data('currency')
            })
        });

        $('[rel="price_from"]').on('keyup', function () {
            url.searchParams.set('price-min', $(this).val());
            url.searchParams.set('price-max', $('[rel="price_to"]').val());
            window.history.replaceState(null, null, url.toString());
            location.reload();
        })


        $('[rel="price_to"]').on('keyup', function () {
            url.searchParams.set('price-max', $(this).val());
            url.searchParams.set('price-min', $('[rel="price_from"]').val());
            window.history.replaceState(null, null, url.toString());
            location.reload();
        })

        priceSlider[0].noUiSlider.on('update', function (values, handle) {

            $('[rel="price_from"]').val(values[0]);
            $('[rel="price_to"]').val(values[1]);
        });

        priceSlider[0].noUiSlider.on('change', function (values, handle) {
            url.searchParams.set('price-min', values[0]);
            url.searchParams.set('price-max', values[1]);
            window.history.replaceState(null, null, url.toString());
            location.reload();
        });
    }
}
