export function initCdek (api)
{
    $('[data-address-id]').click(function(e) {
        e.preventDefault();
        let el = $(this);
        $('[data-address-id]').removeClass('active');
        el.addClass('active');
        el.parents('.my-addresses').find('[name="address_id"]').val(el.data('address-id'));

            const res = api.get(`/api/order/calculate-delivery/${el.data('order-id')}/${el.data('address-id')}`);
            res.then(function(data) {
                return data.json();
            }).then(function(json) {
                if(json[1].length > 0) {
                    $('.choose-address-to').html(json[1][0]).addClass('red');
                }

                if(json[0].length > 0) {
                    $('.choose-address-to').css('display', 'none');
                    $('.choose-address-chosen').css('display', 'block');
                    $('.datetime').html(json[3]);
                    $('.choose-address-chosen .price').append(json[2]);
                }
            });
    });
}
