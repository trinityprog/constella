<div style="margin-top: 3rem;">
    <div class="promocode-component">
        <a href="#" class="use-promocode flex item-center" {{ $promocode ? 'style=display:none' : '' }}>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.9362 7.9446H10.0386V1.047C10.0386 0.4692 9.57 0 8.9916 0C8.4132 0 7.9446 0.4692 7.9446 1.047V7.9446H1.0476C0.4692 7.9446 0 8.4132 0 8.9916C0 9.57 0.4692 10.0386 1.0476 10.0386H7.9446V16.9362C7.9446 17.5146 8.4132 17.9832 8.9916 17.9832C9.57 17.9832 10.0386 17.5146 10.0386 16.9362V10.0386H16.9362C17.5146 10.0386 17.9832 9.57 17.9832 8.9916C17.9832 8.4132 17.5146 7.9446 16.9362 7.9446Z" fill="#B8A7B1"/></svg>
            {{ __('Использовать промокод') }}
        </a>

        <div id="use-promocode-form" class="promocode-form" style="display: none;">
            <div class="form-group">
                <input type="hidden" name="order_id" value="{{ $order_id }}">
                <input type="text" class="promocode-input" name="promocode">
                <div class="form-apply">
                    <svg width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.6667 1L4.33333 8.33333L1 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
{{--                <div class="form-close">--}}
{{--                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00015 4.58926L1.7027 0.291588C1.31394 -0.0971957 0.682504 -0.0971957 0.292501 0.291588C-0.0975011 0.681611 -0.0975011 1.31308 0.292501 1.7031L4.58996 6.00077L0.292502 10.2972C-0.0975006 10.6872 -0.0975006 11.3187 0.292502 11.7075C0.682504 12.0975 1.31394 12.0975 1.7027 11.7075L6.00015 7.40981L10.2976 11.7075C10.6876 12.0975 11.3178 12.0975 11.7078 11.7075C11.9034 11.5131 12 11.258 12 11.003C12 10.7479 11.9034 10.4928 11.7078 10.2972L7.41159 6.00077L11.7078 1.7031C11.9034 1.50871 12 1.25241 12 0.997343C12 0.742281 11.9034 0.487218 11.7078 0.291587C11.3178 -0.0971961 10.6876 -0.0971961 10.2976 0.291587L6.00015 4.58926Z" fill="#2E3338"/>--}}
{{--                    </svg>--}}
{{--                </div>--}}
            </div>
            <span class="error-msg"></span>
        </div>
        <div class="promocode-success" {{ $promocode ? '' : 'style=display:none' }}>
            <p>
                <svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.76877 0.21967C10.0771 0.512563 10.0771 0.987437 9.76877 1.28033L3.97929 6.78033C3.83124 6.92098 3.63043 7 3.42105 7C3.21167 7 3.01087 6.92098 2.86281 6.78033L0.231231 4.28033C-0.0770772 3.98744 -0.0770772 3.51256 0.231232 3.21967C0.53954 2.92678 1.03941 2.92678 1.34772 3.21967L3.42105 5.18934L8.65228 0.21967C8.96059 -0.0732233 9.46046 -0.0732233 9.76877 0.21967Z" fill="#2E3338"/>
                </svg>
                {!! __('промокод применен') !!}
            </p>
        </div>
    </div>
</div>
