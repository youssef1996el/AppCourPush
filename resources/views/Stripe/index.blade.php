@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="margin-top:5rem">
        <div class="col-sm-12 col-md-6 col-xl-6">
            <div class="card">
                <div class="card-container mt-3 ">
                    <div class="front">
                        <div class="image ">
                            <img src="{{asset('image/chip.png')}}" alt="">
                            <img src="{{asset('image/visa.png')}}" alt="">
                        </div>
                        <div class="card-number-box">#### #### #### ####</div>
                        <div class="flexbox">
                            <div class="box">
                                <span>porte-carte</span>
                                <div class="card-holder-name">Nom complet</div>
                            </div>
                            <div class="box">
                                <span>expire</span>
                                <div class="expiration">
                                    <span class="exp-month">mm</span>
                                    <span class="exp-year">yy</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="back">
                        <div class="stripe"></div>
                        <div class="box">
                            <span>cvv</span>
                            <div class="cvv-box"></div>
                            <img src="{{asset('image/visa.png')}}" alt="">
                        </div>
                    </div>

                </div>
                <form action="">
                    <span><input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked></span>
                    <span class="MuiTypography-root MuiTypography-body1 MuiFormControlLabel-label css-1ul1nx9">
                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="20" viewBox="0 0 33.406 20" style="margin-right: 5px; vertical-align: bottom;">
                            <g>
                                <g>
                                    <path fill="#f90" d="M33.406 10c.002 5.52-4.474 9.998-9.995 10s-9.997-4.473-10-9.994V10c0-5.52 4.475-9.998 9.996-10 5.52-.002 10 4.475 10 9.994V10z"></path>
                                    <path fill="#c00" d="M9.934.004C4.444.038 0 4.504 0 10c0 5.52 4.48 9.996 9.998 9.996 2.59 0 4.95-.985 6.728-2.603.365-.333.704-.69 1.016-1.072h-2.048c-.273-.33-.52-.673-.745-1.028h3.532c.214-.345.408-.7.58-1.07h-4.697c-.16-.344-.3-.695-.417-1.05h5.534c.333-.997.514-2.062.514-3.172 0-.734-.078-1.45-.23-2.14h-6.11c.075-.355.17-.705.284-1.052h5.536c-.124-.366-.268-.723-.43-1.07h-4.68c.168-.36.36-.71.572-1.05h3.53c-.234-.373-.495-.732-.776-1.07h-1.968c.305-.357.64-.695 1.003-1.01C14.95.987 12.587.002 9.997.002h-.063z"></path>
                                </g>
                                <g>
                                    <g>
                                        <path fill="#006" d="M13.315 12.87l.134-.907c-.073 0-.18.032-.274.032-.37 0-.417-.197-.388-.343l.364-1.82h.563l.116-1.026h-.53l.108-.623h-1.11c-.023.023-.63 3.5-.63 3.925 0 .626.354.904.85.9.388-.003.69-.11.797-.14z"></path>
                                        <path fill="#006" d="M13.652 11.144c0 1.504.993 1.86 1.84 1.86.78 0 1.19-.18 1.19-.18l.187-1.026s-.66.267-1.197.267c-1.143 0-.943-.85-.943-.85l2.196.005s.14-.688.14-.97c0-.7-.38-1.563-1.55-1.563-1.07 0-1.864 1.154-1.864 2.457zM15.52 9.64c.6 0 .49.676.49.73h-1.183c0-.07.113-.73.693-.73z"></path>
                                        <path fill="#006" d="M22.26 12.867l.19-1.16s-.522.263-.88.263c-.756 0-1.06-.578-1.06-1.196 0-1.257.65-1.947 1.373-1.947.543 0 .98.304.98.304l.173-1.126s-.514-.37-1.067-.373c-1.664-.007-2.617 1.15-2.617 3.154 0 1.326.705 2.23 1.977 2.23.358 0 .93-.147.93-.147z"></path>
                                        <path fill="#006" d="M7.46 8.704c-.73 0-1.288.234-1.288.234l-.155.917s.462-.188 1.16-.188c.396 0 .686.045.686.365 0 .198-.034.27-.034.27s-.314-.026-.46-.026c-1.04 0-1.887.394-1.887 1.578 0 .932.634 1.146 1.028 1.146.75 0 1.05-.473 1.065-.475l-.01.393h.94l.418-2.93c0-1.244-1.086-1.284-1.462-1.284zm.163 2.38c.02.178-.047 1.025-.688 1.025-.33 0-.416-.255-.416-.403 0-.292.157-.642.937-.642.182 0 .135.013.166.02z"></path>
                                        <path fill="#006" d="M9.92 12.98c.238 0 1.61.06 1.61-1.354 0-1.32-1.27-1.06-1.27-1.594 0-.263.206-.348.585-.348.15 0 .727.05.727.05l.135-.94s-.374-.084-.982-.084c-.787 0-1.587.313-1.587 1.39 0 1.22 1.333 1.097 1.333 1.61 0 .344-.37.37-.658.37-.497 0-.944-.17-.945-.163l-.143.932c.026.007.3.13 1.195.13z"></path>
                                        <path fill="#006" d="M31.04 7.85l-.192 1.437s-.4-.555-1.027-.555c-1.18 0-1.787 1.176-1.787 2.526 0 .873.434 1.727 1.318 1.727.64 0 .993-.443.993-.443l-.047.38h1.035l.814-5.062-1.104-.01zm-.457 2.788c0 .562-.278 1.312-.855 1.312-.383 0-.562-.32-.562-.826 0-.825.37-1.368.84-1.368.38 0 .577.263.577.882z"></path>
                                        <path fill="#006" d="M1.696 12.925l.648-3.822.096 3.822h.732l1.37-3.822-.606 3.822h1.09l.838-5.068-1.73-.015-1.03 3.104-.028-3.09H1.49l-.852 5.068h1.058z"></path>
                                        <path fill="#006" d="M18.098 12.933c.31-1.764.42-3.153 1.323-2.865.132-.684.44-1.274.58-1.564 0 0-.043-.065-.322-.065-.477 0-1.112.965-1.112.965l.095-.598h-.99l-.665 4.127h1.093z"></path>
                                        <g>
                                            <path fill="#006" d="M24.49 8.704c-.73 0-1.29.234-1.29.234l-.154.917s.462-.188 1.16-.188c.396 0 .686.045.686.365 0 .198-.035.27-.035.27s-.312-.026-.457-.026c-1.04 0-1.89.394-1.89 1.578 0 .932.636 1.146 1.03 1.146.75 0 1.047-.473 1.064-.475l-.01.394h.938l.42-2.932c0-1.244-1.086-1.284-1.463-1.284zm.16 2.38c.022.178-.045 1.025-.687 1.025-.33 0-.416-.255-.416-.403 0-.292.158-.642.938-.642.182 0 .136.013.166.02z"></path>
                                        </g>
                                        <path fill="#006" d="M27.03 12.933c.17-1.298.484-3.117 1.323-2.865.13-.684.005-.68-.274-.68-.478 0-.584.016-.584.016l.096-.598h-.99l-.665 4.127h1.093z"></path>
                                    </g>
                                    <g>
                                        <path fill="#fff" d="M13.593 12.546l.133-.906c-.072 0-.18.03-.273.03-.37 0-.412-.194-.39-.342l.3-1.845h.563l.137-1h-.53l.107-.624h-1.064c-.023.023-.63 3.5-.63 3.923 0 .627.354.906.85.902.388-.002.69-.112.797-.14z"></path>
                                        <path fill="#fff" d="M13.93 10.82c0 1.505.993 1.862 1.84 1.862.78 0 1.124-.176 1.124-.176l.188-1.026s-.595.263-1.13.263c-1.144 0-.943-.854-.943-.854h2.162s.14-.69.14-.972c0-.7-.35-1.556-1.518-1.556-1.07 0-1.864 1.155-1.864 2.46zm1.867-1.504c.6 0 .49.675.49.73h-1.183c0-.07.113-.73.693-.73z"></path>
                                        <path fill="#fff" d="M22.537 12.546l.19-1.16s-.52.262-.88.262c-.756 0-1.058-.578-1.058-1.196 0-1.258.647-1.948 1.37-1.948.544 0 .98.305.98.305l.173-1.128s-.646-.262-1.2-.262c-1.228 0-2.423 1.066-2.423 3.068 0 1.327.646 2.204 1.916 2.204.36 0 .93-.146.93-.146z"></path>
                                        <path fill="#fff" d="M7.738 8.38c-.73 0-1.29.235-1.29.235l-.154.917s.462-.187 1.16-.187c.396 0 .687.044.687.366 0 .196-.035.27-.035.27s-.313-.027-.458-.027c-.92 0-1.888.393-1.888 1.576 0 .933.634 1.148 1.027 1.148.75 0 1.074-.487 1.09-.49l-.033.406h.938l.418-2.93C9.2 8.42 8.115 8.38 7.738 8.38zm.23 2.387c.02.18-.114 1.02-.754 1.02-.33 0-.418-.253-.418-.403 0-.29.16-.64.938-.64.182 0 .202.02.233.023z"></path>
                                        <path fill="#fff" d="M10.196 12.657c.24 0 1.61.06 1.61-1.354 0-1.322-1.27-1.062-1.27-1.593 0-.265.208-.346.585-.346.15 0 .73.047.73.047l.134-.94s-.373-.083-.98-.083c-.79 0-1.59.315-1.59 1.39 0 1.22 1.334 1.098 1.334 1.61 0 .342-.372.37-.66.37-.495 0-.942-.17-.944-.162l-.142.93c.025.008.3.132 1.194.132z"></path>
                                        <path fill="#fff" d="M31.355 7.537l-.23 1.425s-.4-.555-1.027-.555c-.976 0-1.79 1.178-1.79 2.528 0 .87.435 1.727 1.322 1.727.637 0 .99-.444.99-.444l-.047.38h1.035l.814-5.063-1.067.002zm-.495 2.778c0 .562-.277 1.312-.855 1.312-.383 0-.562-.32-.562-.827 0-.824.37-1.368.838-1.368.384 0 .58.263.58.883z"></path>
                                        <path fill="#fff" d="M1.975 12.603l.648-3.823.095 3.822h.733L4.82 8.78l-.607 3.822h1.09l.84-5.07H4.456l-1.05 3.11-.055-3.11H1.8l-.852 5.07h1.027z"></path>
                                        <path fill="#fff" d="M18.376 12.61c.31-1.764.367-3.194 1.106-2.93.13-.685.254-.95.396-1.237 0 0-.066-.015-.205-.015-.478 0-.83.652-.83.652l.094-.598h-.99l-.664 4.126h1.093z"></path>
                                         <g>
                                            <path fill="#fff" d="M24.993 8.38c-.73 0-1.29.235-1.29.235l-.153.917s.462-.187 1.16-.187c.396 0 .686.044.686.366 0 .196-.035.27-.035.27s-.31-.027-.456-.027c-.92 0-1.888.393-1.888 1.576 0 .933.634 1.148 1.027 1.148.75 0 1.075-.487 1.093-.49l-.035.406h.938l.418-2.932c0-1.242-1.086-1.282-1.463-1.282zm.228 2.387c.022.18-.11 1.02-.75 1.02-.333 0-.42-.253-.42-.403 0-.29.16-.64.94-.64.183 0 .2.02.23.023z"></path>
                                        </g>
                                        <g>
                                            <path fill="#fff" d="M27.313 12.61c.31-1.764.368-3.194 1.106-2.93.128-.685.253-.95.395-1.237 0 0-.066-.015-.205-.015-.478 0-.83.652-.83.652l.095-.598h-.99l-.664 4.126h1.093z"></path>
                                        </g>
                                        <path fill="#fff" d="M32.4 11.972c.053 0 .106.015.157.042.053.027.092.068.12.12.03.052.044.106.044.162 0 .055-.013.11-.042.16-.027.05-.067.092-.12.12-.05.028-.104.043-.16.043-.056 0-.108-.016-.16-.045-.052-.027-.092-.068-.12-.12-.03-.05-.043-.104-.043-.16 0-.055.015-.11.043-.162.03-.05.07-.092.12-.12.054-.027.107-.04.16-.04m0 .053c-.045 0-.09.01-.132.034-.043.02-.076.057-.102.1-.023.044-.036.087-.036.134 0 .048.013.093.036.135.023.042.057.075.1.1.043.022.088.035.135.035.045 0 .09-.013.134-.034.04-.024.075-.058.1-.1.023-.043.035-.088.035-.136 0-.047-.015-.09-.038-.134-.023-.043-.057-.078-.1-.1-.044-.023-.088-.034-.133-.034m-.142.448v-.348h.12c.04 0 .07.004.088.01.02.007.032.018.043.033.01.016.017.032.017.05 0 .025-.01.048-.028.067-.018.02-.043.03-.072.03.012.006.02.012.03.02.013.014.03.037.05.068l.043.068h-.067l-.03-.055c-.024-.043-.044-.07-.06-.08-.01-.01-.025-.012-.045-.012h-.033v.146h-.057m.055-.194h.068c.033 0 .056-.006.067-.015s.018-.02.018-.038c0-.01-.002-.02-.008-.03-.006-.006-.014-.014-.023-.017-.012-.004-.03-.006-.057-.006h-.064v.106"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="37" height="15" viewBox="0 0 49 15" style="margin-right: 5px; vertical-align: bottom;">
                            <g>
                                <g>
                                    <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="214.815" y1="-364.312" x2="263.317" y2="-363.862" gradientTransform="matrix(.805 0 0 -.805 -170.696 -285.733)">
                                        <stop offset="0" stop-color="#191E5F"></stop>
                                        <stop offset="1" stop-color="#142787" stop-opacity="0.819"></stop>
                                    </linearGradient>
                                    <path fill="url(#a)" d="M19.73.14h3.962l-2.478 14.53h-3.96z"></path>
                                    <linearGradient id="b" gradientUnits="userSpaceOnUse" x1="157.834" y1="-272.49" x2="206.32" y2="-272.04" gradientTransform="matrix(1 0 0 -1 -155.769 -264.731)">
                                        <stop offset="0" stop-color="#191E5F"></stop>
                                        <stop offset="1" stop-color="#142787" stop-opacity="0.819"></stop>
                                    </linearGradient>
                                    <path fill="url(#b)" d="M35.598.61C34.812.316 33.584 0 32.048 0c-3.913 0-6.67 1.97-6.692 4.795-.02 2.09 1.967 3.252 3.47 3.95 1.542.71 2.06 1.166 2.052 1.802-.01.973-1.23 1.418-2.37 1.418-1.585 0-2.427-.222-3.727-.764l-.51-.228-.554 3.25c.924.406 2.635.757 4.41.777 4.165 0 6.868-1.95 6.897-4.967.016-1.652-1.04-2.91-3.324-3.948-1.386-.67-2.233-1.12-2.226-1.8 0-.605.72-1.25 2.27-1.25 1.295-.02 2.232.262 2.965.557l.353.167.535-3.15"></path>
                                        <linearGradient id="c" gradientUnits="userSpaceOnUse" x1="157.835" y1="-272.663" x2="206.32" y2="-272.213" gradientTransform="matrix(1 0 0 -1 -155.769 -264.731)">
                                            <stop offset="0" stop-color="#191E5F"></stop>
                                            <stop offset="1" stop-color="#142787" stop-opacity="0.819"></stop>
                                        </linearGradient>
                                        <path fill="url(#c)" d="M45.754.267h-3.06c-.948 0-1.66.26-2.075 1.205l-5.882 13.315h4.158s.68-1.79.834-2.184l5.072.007c.12.51.48 2.177.48 2.177h3.676L45.754.267M40.87 9.633l1.58-4.062c-.026.04.323-.84.522-1.387l.268 1.254s.758 3.47.918 4.196H40.87z"></path>
                                        <g transform="matrix(.805 0 0 .805 8.091 9.256)">
                                            <linearGradient id="d" gradientUnits="userSpaceOnUse" x1="256.474" y1="-462.181" x2="304.963" y2="-461.731" gradientTransform="matrix(.805 0 0 -.805 -213.711 -374.142)">
                                                <stop offset="0" stop-color="#191E5F"></stop>
                                                <stop offset="1" stop-color="#142787" stop-opacity="0.819"></stop>
                                            </linearGradient>
                                            <path fill="url(#d)" d="M7.28-11.17L2.464 1.14 1.95-1.365c-.895-2.884-3.688-6.008-6.81-7.57L-.46 6.85l5.206-.006 7.744-18.015H7.28"></path>
                                            <linearGradient id="e" gradientUnits="userSpaceOnUse" x1="256.424" y1="-456.961" x2="304.911" y2="-456.512" gradientTransform="matrix(.805 0 0 -.805 -213.711 -374.142)">
                                                <stop offset="0" stop-color="#191E5F"></stop>
                                                <stop offset="1" stop-color="#142787" stop-opacity="0.819"></stop>
                                            </linearGradient>
                                            <path fill="url(#e)" d="M-2.003-11.18h-7.933l-.064.373C-3.828-9.31.256-5.702 1.95-1.364L.226-9.654c-.298-1.145-1.162-1.487-2.23-1.527"></path>
                                        </g>
                                        <linearGradient id="f" gradientUnits="userSpaceOnUse" x1="157.78" y1="-267.037" x2="206.267" y2="-266.587" gradientTransform="matrix(1 0 0 -1 -155.769 -264.731)">
                                            <stop offset="0" stop-color="#191E5F"></stop>
                                            <stop offset="1" stop-color="#142787" stop-opacity="0.819"></stop>
                                        </linearGradient>
                                        <path fill="url(#f)" d="M4.333 2.616c-.082-.306-.167-.488-.48-.657l1.167.523"></path>
                                    </g>
                                </g>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="15" viewBox="0 0 32.793 20" style="margin-right: 5px; vertical-align: bottom;">
                                <radialGradient id="amex_rg" cx="3440.095" cy="2651.03" r="260.99" gradientTransform="matrix(.116 0 0 .116 -391.92 -302.971)" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#9DD5F6"></stop>
                                    <stop offset="0.071" stop-color="#98D3F5"></stop>
                                    <stop offset="0.158" stop-color="#89CEF3"></stop>
                                    <stop offset="0.252" stop-color="#70C6EF"></stop>
                                    <stop offset="0.351" stop-color="#4EBBEA"></stop>
                                    <stop offset="0.455" stop-color="#23ADE3"></stop>
                                    <stop offset="0.5" stop-color="#0DA6E0"></stop>
                                    <stop offset="1" stop-color="#2E77BC"></stop>
                                </radialGradient>
                                <path fill="url(#amex_rg)" d="M32.6 0H0v20h32.6v-5.018c.13-.188.193-.426.193-.72 0-.335-.063-.542-.192-.717"></path>
                                <path fill="#fff" d="M2.938 7.22L2.31 5.692 1.688 7.22m15.068-.61c-.125.078-.275.08-.453.08h-1.114v-.85h1.13c.158 0 .325.007.433.07.12.055.194.173.194.337 0 .167-.07.303-.19.364zm7.94.61l-.634-1.527-.63 1.527h1.266zm-14.8 1.654h-.94L8.95 5.87 7.622 8.875h-.804L5.485 5.87v3.004H3.62l-.35-.854H1.36l-.354.854H.01L1.653 5.04h1.362l1.558 3.63V5.04h1.496l1.198 2.6 1.103-2.6h1.524v3.834zm3.743 0h-3.062V5.04h3.062v.8h-2.145v.69h2.094v.786h-2.094v.766h2.145v.792zm4.316-2.8c0 .61-.41.926-.646 1.02.198.078.37.212.452.324.13.19.15.36.15.703v.754h-.922l-.006-.482c0-.23.023-.562-.143-.748-.134-.134-.337-.164-.667-.164h-.984v1.395h-.917V5.04h2.107c.468 0 .814.013 1.11.185.29.17.464.42.464.85zm1.466 2.8h-.936V5.04h.936v3.834zm10.847 0H28.97l-1.738-2.877v2.877h-1.864l-.36-.854h-1.903l-.347.854h-1.07c-.445 0-1.012-.1-1.33-.424-.32-.325-.488-.767-.488-1.463 0-.568.1-1.09.493-1.5.296-.306.76-.446 1.394-.446h.887v.822h-.87c-.333 0-.522.05-.704.228-.154.16-.264.466-.264.87 0 .41.082.704.252.897.14.152.398.2.64.2h.41L23.4 5.04h1.373l1.553 3.626V5.04h1.396l1.61 2.67V5.04h.938v3.834h-.003zM0 9.628h1.565l.353-.853h.79l.352.853h3.082v-.65l.275.653h1.6l.273-.663v.66h7.657l-.004-1.397h.148c.105.005.135.014.135.185V9.63h3.96V9.3c.317.172.815.326 1.468.326h1.666l.356-.853h.79l.35.853h3.208v-.81l.488.81h2.572V4.28h-2.547v.632l-.357-.63h-2.61v.63l-.33-.63h-3.526c-.592 0-1.108.08-1.528.31v-.31H17.75v.31c-.27-.235-.632-.31-1.036-.31H7.82l-.597 1.38-.615-1.38h-2.8v.63l-.31-.63H1.11L0 6.82v2.806zM32.6 12.456h-1.67c-.165 0-.276.006-.37.067-.097.062-.134.154-.134.277 0 .145.08.24.2.284.098.033.2.043.354.043l.496.015c.502.012.836.1 1.04.31.038.028.06.06.085.095m0 1.435c-.22.324-.655.492-1.24.492h-1.772v-.824h1.763c.177 0 .298-.022.372-.094.062-.06.106-.146.106-.252 0-.11-.045-.2-.11-.253-.066-.058-.162-.083-.324-.083-.858-.03-1.933.025-1.933-1.188 0-.556.354-1.142 1.315-1.142H32.6v-.765h-1.695c-.512 0-.883.123-1.146.313v-.313h-2.51c-.4 0-.872.1-1.095.313v-.313h-4.48v.313c-.354-.258-.954-.313-1.233-.313h-2.955v.313c-.28-.273-.91-.313-1.29-.313h-3.308l-.758.82-.708-.82h-4.94v5.35h4.847l.78-.83.734.83 2.988.005V14.97h.294c.396.004.864-.012 1.276-.19v1.444h2.465V14.83h.12c.15 0 .165.005.165.157v1.236h7.484c.475 0 .973-.12 1.248-.344v.343h2.373c.496 0 .977-.07 1.344-.248v-.993zm-3.654-1.53c.178.184.273.417.273.81 0 .826-.517 1.212-1.44 1.212h-1.785v-.824h1.777c.176 0 .297-.022.375-.094.064-.06.11-.146.11-.252 0-.11-.05-.2-.114-.253-.068-.058-.166-.083-.326-.083-.855-.03-1.93.025-1.93-1.188 0-.556.35-1.142 1.31-1.142h1.837v.815h-1.68c-.166 0-.275.006-.367.067-.102.062-.14.154-.14.277 0 .145.087.24.202.284.095.034.198.044.353.044l.494.015c.5.014.842.1 1.05.31zm-8.27-.238c-.12.073-.272.08-.45.08h-1.113v-.86h1.13c.16 0 .325.002.436.067.118.063.19.184.19.348 0 .163-.075.295-.194.366zm.555.477c.204.075.372.212.448.323.13.188.148.36.152.7v.76h-.918v-.48c0-.23.02-.57-.15-.75-.133-.138-.336-.17-.672-.17h-.98v1.4h-.92V11.64h2.116c.463 0 .8.02 1.103.18.287.176.47.416.47.854 0 .61-.406.922-.65 1.017zm1.158-2.05h3.062v.794h-2.146v.695h2.092v.78h-2.092v.765l2.146.005v.795h-3.062V11.64zm-6.18 1.77H15.02v-.98h1.194c.33 0 .56.136.56.472 0 .332-.218.507-.57.507zm-2.098 1.714l-1.407-1.562 1.407-1.513v3.074zm-3.633-.45H8.223v-.763h2.012v-.78H8.223v-.696h2.297l1.003 1.116-1.046 1.125zm7.283-1.772c0 1.065-.795 1.285-1.595 1.285h-1.143v1.287h-1.78l-1.13-1.27-1.17 1.27H7.31V11.64h3.685l1.127 1.256 1.165-1.256h2.927c.727 0 1.543.2 1.543 1.262z"></path>
                            </svg>
                        </span>
                    <div class="inputBox">
                        <span>Numéro de carte</span>
                        <input type="text" maxlength="19" class="card-number-input">
                        <div class="card-number-box"></div>
                    </div>
                    <div class="inputBox">
                        <span>Porte-carte</span>
                        <input type="text" class="card-holder-input">
                    </div>
                    <div class="flexbox">
                        <div class="inputBox">
                            <span>expiration mm</span>
                            <select name="" id="" class="month-input">
                                <option value="month" selected disabled>mois</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <span>expiration yy</span>
                            <select name="" id="" class="year-input">
                                <option value="year" selected disabled>annee</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <span>cvv</span>
                            <input type="text" maxlength="4" class="cvv-input">
                        </div>
                    </div>
                    <input type="submit" value="Valider" class="submit-btn">
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-6" style="display: flex;
  justify-content: flex-end;">
            <div class="card text-left" style="width:430px ; padding:12px ;height: 50%;">
              <img class="card-img-top " src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title fs-3 mb-4">Votre choix</h4>
                <p class="card-text">
                    <div class="row">
                       <div class="col-sm-12 col-md-6 col-xl-6">
                           <label class="text-muted fs-5 mb-3">Langue</label>
                           <label class="text-muted fs-5 mb-3">Cours</label>
                           <label class="text-muted fs-5 mb-3">Group/Particulier</label>
                           <label class="text-muted fs-5 mb-3">Montant</label>
                       </div>
                       <div class="col-sm-12 col-md-6 col-xl-6">
                           <label class="text-black fs-5 mb-3">Langue</label>
                           <label class="text-black fs-5 mb-3">Cours</label>
                           <label class="text-black fs-5 mb-3">Group/Particulier</label>
                           <label class="text-black fs-5 mb-3">Montant</label>

                       </div>
                    </div>
                </p>
              </div>
            </div>
        </div>
    </div>




</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

/* *{
    font-family: 'Poppins', sans-serif;
    margin:0; padding:0;
    box-sizing: border-box;
    outline: none; border: none;
    text-decoration: none;
    text-transform: uppercase;
} */

.container{
   /*  min-height: 100vh;
    background: #eee;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-flow: column;
    padding-bottom: 60px; */
}
label{
    display:block;
}

.container form{
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 10px 15px rgba(0,0,0,.1);
    padding: 50px;
   /*  width: 600px; */
    padding-top: 160px;
}

.container form .inputBox{
    margin-top: 20px;
}

.container form .inputBox span{
    display: block;
    color:#999;
    padding-bottom: 5px;
}

.container form .inputBox input,
.container form .inputBox select{
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border:1px solid rgba(0,0,0,.3);
    color:#444;
}

.container form .flexbox{
    display: flex;
    gap:15px;
}

.container form .flexbox .inputBox{
    flex:1 1 150px;
}

.container form .submit-btn{
    width: 100%;
    background: linear-gradient(45deg, #729ae6, #0c2a41);
    margin-top: 20px;
    padding: 10px;
    font-size: 20px;
    color:#fff;
    border-radius: 10px;
    cursor: pointer;
    transition: .2s linear;
}

.container form .submit-btn:hover{
    letter-spacing: 2px;
    opacity: .8;
}

.container .card-container{
    margin-bottom: -120px;
    position: relative;
    height: 250px;
    width: 400px;
    margin-left: 4.5rem
}

.container .card-container .front{
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0; left: 0;
    background: linear-gradient(45deg, #729ae6, #0c2a41);
    border-radius: 5px;
    backface-visibility: hidden;
    box-shadow: 0 15px 25px rgba(0,0,0,.2);
    padding:20px;
    transform:perspective(1000px) rotateY(0deg);
    transition:transform .4s ease-out;

}

.container .card-container .front .image{
    display: flex;
    align-items:center;
    justify-content: space-between;
    padding-top: 10px;
}

.container .card-container .front .image img{
    height: 50px;
}

.container .card-container .front .card-number-box{
    padding:30px 0;
    font-size: 22px;
    color:#fff;
}

.container .card-container .front .flexbox{
    display: flex;
}

.container .card-container .front .flexbox .box:nth-child(1){
    margin-right: auto;
}

.container .card-container .front .flexbox .box{
    font-size: 15px;
    color:#fff;
}

.container .card-container .back{
    position: absolute;
    top:0; left: 0;
    height: 100%;
    width: 100%;
    background: linear-gradient(45deg, #729ae6, #0c2a41);
    border-radius: 5px;
    padding: 20px 0;
    text-align: right;
    backface-visibility: hidden;
    box-shadow: 0 15px 25px rgba(0,0,0,.2);
    transform:perspective(1000px) rotateY(180deg);
    transition:transform .4s ease-out;
}

.container .card-container .back .stripe{
    background: #000;
    width: 100%;
    margin: 10px 0;
    height: 50px;
}

.container .card-container .back .box{
    padding: 0 20px;
}

.container .card-container .back .box span{
    color:#fff;
    font-size: 15px;
}

.container .card-container .back .box .cvv-box{
    height: 50px;
    padding: 10px;
    margin-top: 5px;
    color:#333;
    background: #fff;
    border-radius: 5px;
    width: 100%;
}

.container .card-container .back .box img{
    margin-top: 30px;
    height: 30px;
}
</style>
<script>

    document.querySelector('.card-number-input').oninput = () => {
        let input = document.querySelector('.card-number-input');
        let formattedValue = input.value.replace(/\s/g, '').match(/.{1,4}/g);
        input.value = formattedValue ? formattedValue.join(' ') : '';

        document.querySelector('.card-number-box').innerText = input.value;
        if(input.value == '')
        {
            document.querySelector('.card-number-box').innerText= '#### #### #### ####';
        }
    }

    document.querySelector('.card-holder-input').oninput = () =>{
        document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
    }

    document.querySelector('.month-input').oninput = () =>{
        document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
    }

    document.querySelector('.year-input').oninput = () =>{
        document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
    }

    document.querySelector('.cvv-input').onmouseenter = () =>{
        document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
        document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
    }

    document.querySelector('.cvv-input').onmouseleave = () =>{
        document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
        document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
    }

    document.querySelector('.cvv-input').oninput = () =>{
        document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
    }

    </script>
@endsection
