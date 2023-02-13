require('inputmask');

export function initMasks ()
{
    Inputmask({ mask: "99 / 99 / 9999", clearIncomplete: true,}).mask(document.querySelectorAll("[rel=dob]"));
    Inputmask({ mask: "+7 (999) 999 99 99", clearIncomplete: true,}).mask(document.querySelectorAll("[rel=phone]"));
    Inputmask({ mask: "99:99", clearIncomplete: true,}).mask(document.querySelectorAll("[rel=time]"));
    Inputmask({ mask: "999999", clearIncomplete: true,}).mask(document.querySelectorAll("[rel=order_number]"));
}
