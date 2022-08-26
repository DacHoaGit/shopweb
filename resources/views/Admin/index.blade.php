@extends('admin.home')
@section('content')
@include('admin.search-with-date')
    <div class="row">
        <div class="col-xl-3 col-lg-4" style="margin-top: 10px">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="mdi mdi-cart-plus widget-icon" style="color:blue;"></i>
                    <h6 class="text-uppercase mt-0">Orders</h6>
                    <h2 class="my-2 total-order" id="active-users-count"></h2>
                </div> <!-- end card-body-->
            </div>
        </div>
        <div class="col-xl-3 col-lg-4" style="margin-top: 10px">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="mdi mdi-cart-plus widget-icon" style="color:blue;"></i>
                    <h6 class="text-uppercase mt-0">Products sold</h6>
                    <h2 class="my-2 total-product" id="active-users-count"></h2>
                </div> <!-- end card-body-->
            </div>
        </div>
        <div class="col-xl-3 col-lg-4" style="margin-top: 10px">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="mdi mdi-currency-usd widget-icon" style="color:blue;"></i>
                    <h6 class="text-uppercase mt-0">Revenue</h6>
                    <h2 class="my-2 total-revenue" id="active-users-count"></h2>
                </div> <!-- end card-body-->
            </div>
        </div>
        <div class="col-xl-3 col-lg-4" style="margin-top: 10px">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="mdi mdi-account widget-icon" style="color:blue;"></i>
                    <h6 class="text-uppercase mt-0">Users</h6>
                    <h2 class="my-2 total-user" id="active-users-count"></h2>
                </div> <!-- end card-body-->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-lg-4" style="margin-top: 10px">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="mdi mdi-cart-plus widget-icon" style="color:blue;"></i>
                    <h6 class="text-uppercase mt-0">Orders</h6>
                    <h2 class="my-2 total-order" id="active-users-count"></h2>
                </div> <!-- end card-body-->
            </div>
        </div>
        <div class="col-xl-3 col-lg-4" style="margin-top: 10px">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="mdi mdi-cart-plus widget-icon" style="color:blue;"></i>
                    <h6 class="text-uppercase mt-0">Products sold</h6>
                    <h2 class="my-2 total-product" id="active-users-count"></h2>
                </div> <!-- end card-body-->
            </div>
        </div>
        <div class="col-xl-3 col-lg-4" style="margin-top: 10px">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="mdi mdi-currency-usd widget-icon" style="color:blue;"></i>
                    <h6 class="text-uppercase mt-0">Revenue</h6>
                    <h2 class="my-2 total-revenue" id="active-users-count"></h2>
                </div> <!-- end card-body-->
            </div>
        </div>
        <div class="col-xl-3 col-lg-4" style="margin-top: 10px">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class="mdi mdi-account widget-icon" style="color:blue;"></i>
                    <h6 class="text-uppercase mt-0">Users</h6>
                    <h2 class="my-2 total-user" id="active-users-count"></h2>
                </div> <!-- end card-body-->
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body" style="position: relative;">
            <div class="dropdown float-right">
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                </div>
            </div>
            <h4 class="header-title">Total Sales</h4>

            <div id="average-sales" class="apex-charts mb-4 mt-4" data-colors="#727cf5,#0acf97,#fa5c7c,#ffbc00"
                style="min-height: 215.7px;">
                <div id="apexchartsl9nme1d1" class="apexcharts-canvas apexchartsl9nme1d1 apexcharts-theme-light"
                    style="width: 355px; height: 215.7px;"><svg id="SvgjsSvg2155" width="355" height="215.7"
                        xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                        transform="translate(0, 0)" style="background: transparent;">
                        <g id="SvgjsG2157" class="apexcharts-inner apexcharts-graphical" transform="translate(71, 0)">
                            <defs id="SvgjsDefs2156">
                                <clipPath id="gridRectMaskl9nme1d1">
                                    <rect id="SvgjsRect2159" width="219" height="215" x="-3"
                                        y="-1" rx="0" ry="0" opacity="1" stroke-width="0"
                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                </clipPath>
                                <clipPath id="gridRectMarkerMaskl9nme1d1">
                                    <rect id="SvgjsRect2160" width="217" height="217" x="-2"
                                        y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                </clipPath>
                                <filter id="SvgjsFilter2169" filterUnits="userSpaceOnUse" width="200%" height="200%"
                                    x="-50%" y="-50%">
                                    <feFlood id="SvgjsFeFlood2170" flood-color="#000000" flood-opacity="0.45"
                                        result="SvgjsFeFlood2170Out" in="SourceGraphic"></feFlood>
                                    <feComposite id="SvgjsFeComposite2171" in="SvgjsFeFlood2170Out" in2="SourceAlpha"
                                        operator="in" result="SvgjsFeComposite2171Out"></feComposite>
                                    <feOffset id="SvgjsFeOffset2172" dx="1" dy="1"
                                        result="SvgjsFeOffset2172Out" in="SvgjsFeComposite2171Out"></feOffset>
                                    <feGaussianBlur id="SvgjsFeGaussianBlur2173" stdDeviation="1 "
                                        result="SvgjsFeGaussianBlur2173Out" in="SvgjsFeOffset2172Out"></feGaussianBlur>
                                    <feMerge id="SvgjsFeMerge2174" result="SvgjsFeMerge2174Out" in="SourceGraphic">
                                        <feMergeNode id="SvgjsFeMergeNode2175" in="SvgjsFeGaussianBlur2173Out">
                                        </feMergeNode>
                                        <feMergeNode id="SvgjsFeMergeNode2176" in="[object Arguments]"></feMergeNode>
                                    </feMerge>
                                    <feBlend id="SvgjsFeBlend2177" in="SourceGraphic" in2="SvgjsFeMerge2174Out"
                                        mode="normal" result="SvgjsFeBlend2177Out"></feBlend>
                                </filter>
                                <filter id="SvgjsFilter2181" filterUnits="userSpaceOnUse" width="200%" height="200%"
                                    x="-50%" y="-50%">
                                    <feFlood id="SvgjsFeFlood2182" flood-color="#000000" flood-opacity="0.45"
                                        result="SvgjsFeFlood2182Out" in="SourceGraphic"></feFlood>
                                    <feComposite id="SvgjsFeComposite2183" in="SvgjsFeFlood2182Out" in2="SourceAlpha"
                                        operator="in" result="SvgjsFeComposite2183Out"></feComposite>
                                    <feOffset id="SvgjsFeOffset2184" dx="1" dy="1"
                                        result="SvgjsFeOffset2184Out" in="SvgjsFeComposite2183Out"></feOffset>
                                    <feGaussianBlur id="SvgjsFeGaussianBlur2185" stdDeviation="1 "
                                        result="SvgjsFeGaussianBlur2185Out" in="SvgjsFeOffset2184Out"></feGaussianBlur>
                                    <feMerge id="SvgjsFeMerge2186" result="SvgjsFeMerge2186Out" in="SourceGraphic">
                                        <feMergeNode id="SvgjsFeMergeNode2187" in="SvgjsFeGaussianBlur2185Out">
                                        </feMergeNode>
                                        <feMergeNode id="SvgjsFeMergeNode2188" in="[object Arguments]"></feMergeNode>
                                    </feMerge>
                                    <feBlend id="SvgjsFeBlend2189" in="SourceGraphic" in2="SvgjsFeMerge2186Out"
                                        mode="normal" result="SvgjsFeBlend2189Out"></feBlend>
                                </filter>
                                <filter id="SvgjsFilter2193" filterUnits="userSpaceOnUse" width="200%" height="200%"
                                    x="-50%" y="-50%">
                                    <feFlood id="SvgjsFeFlood2194" flood-color="#000000" flood-opacity="0.45"
                                        result="SvgjsFeFlood2194Out" in="SourceGraphic"></feFlood>
                                    <feComposite id="SvgjsFeComposite2195" in="SvgjsFeFlood2194Out" in2="SourceAlpha"
                                        operator="in" result="SvgjsFeComposite2195Out"></feComposite>
                                    <feOffset id="SvgjsFeOffset2196" dx="1" dy="1"
                                        result="SvgjsFeOffset2196Out" in="SvgjsFeComposite2195Out"></feOffset>
                                    <feGaussianBlur id="SvgjsFeGaussianBlur2197" stdDeviation="1 "
                                        result="SvgjsFeGaussianBlur2197Out" in="SvgjsFeOffset2196Out"></feGaussianBlur>
                                    <feMerge id="SvgjsFeMerge2198" result="SvgjsFeMerge2198Out" in="SourceGraphic">
                                        <feMergeNode id="SvgjsFeMergeNode2199" in="SvgjsFeGaussianBlur2197Out">
                                        </feMergeNode>
                                        <feMergeNode id="SvgjsFeMergeNode2200" in="[object Arguments]"></feMergeNode>
                                    </feMerge>
                                    <feBlend id="SvgjsFeBlend2201" in="SourceGraphic" in2="SvgjsFeMerge2198Out"
                                        mode="normal" result="SvgjsFeBlend2201Out"></feBlend>
                                </filter>
                                <filter id="SvgjsFilter2205" filterUnits="userSpaceOnUse" width="200%" height="200%"
                                    x="-50%" y="-50%">
                                    <feFlood id="SvgjsFeFlood2206" flood-color="#000000" flood-opacity="0.45"
                                        result="SvgjsFeFlood2206Out" in="SourceGraphic"></feFlood>
                                    <feComposite id="SvgjsFeComposite2207" in="SvgjsFeFlood2206Out" in2="SourceAlpha"
                                        operator="in" result="SvgjsFeComposite2207Out"></feComposite>
                                    <feOffset id="SvgjsFeOffset2208" dx="1" dy="1"
                                        result="SvgjsFeOffset2208Out" in="SvgjsFeComposite2207Out"></feOffset>
                                    <feGaussianBlur id="SvgjsFeGaussianBlur2209" stdDeviation="1 "
                                        result="SvgjsFeGaussianBlur2209Out" in="SvgjsFeOffset2208Out"></feGaussianBlur>
                                    <feMerge id="SvgjsFeMerge2210" result="SvgjsFeMerge2210Out" in="SourceGraphic">
                                        <feMergeNode id="SvgjsFeMergeNode2211" in="SvgjsFeGaussianBlur2209Out">
                                        </feMergeNode>
                                        <feMergeNode id="SvgjsFeMergeNode2212" in="[object Arguments]"></feMergeNode>
                                    </feMerge>
                                    <feBlend id="SvgjsFeBlend2213" in="SourceGraphic" in2="SvgjsFeMerge2210Out"
                                        mode="normal" result="SvgjsFeBlend2213Out"></feBlend>
                                </filter>
                            </defs>
                            <g id="SvgjsG2162" class="apexcharts-pie">
                                <g id="SvgjsG2163" transform="translate(0, 0) scale(1)">
                                    <circle id="SvgjsCircle2164" r="63.63658536585366" cx="106.5" cy="106.5"
                                        fill="transparent"></circle>
                                    <g id="SvgjsG2165" class="apexcharts-slices">
                                        <g id="SvgjsG2166" class="apexcharts-series apexcharts-pie-series"
                                            seriesName="Direct" rel="1" data:realIndex="0">
                                            <path id="SvgjsPath2167"
                                                d="M 106.5 8.597560975609753 A 97.90243902439025 97.90243902439025 0 0 1 202.63882743292783 124.99901150727173 L 168.99023783140308 118.52435747972663 A 63.63658536585366 63.63658536585366 0 0 0 106.5 42.86341463414634 L 106.5 8.597560975609753 z"
                                                fill="rgba(114,124,245,1)" fill-opacity="1" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="2" stroke-dasharray="0"
                                                class="apexcharts-pie-area apexcharts-donut-slice-0" index="0"
                                                j="0" data:angle="100.89171974522293" data:startAngle="0"
                                                data:strokeWidth="2" data:value="44"
                                                data:pathOrig="M 106.5 8.597560975609753 A 97.90243902439025 97.90243902439025 0 0 1 202.63882743292783 124.99901150727173 L 168.99023783140308 118.52435747972663 A 63.63658536585366 63.63658536585366 0 0 0 106.5 42.86341463414634 L 106.5 8.597560975609753 z"
                                                stroke="transparent"></path>
                                        </g>
                                        <g id="SvgjsG2178" class="apexcharts-series apexcharts-pie-series"
                                            seriesName="Affilliate" rel="2" data:realIndex="1">
                                            <path id="SvgjsPath2179"
                                                d="M 202.63882743292783 124.99901150727173 A 97.90243902439025 97.90243902439025 0 0 1 34.8912666900564 173.26134271170574 L 59.95432334853666 149.8948727626087 A 63.63658536585366 63.63658536585366 0 0 0 168.99023783140308 118.52435747972663 L 202.63882743292783 124.99901150727173 z"
                                                fill="rgba(10,207,151,1)" fill-opacity="1" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="2" stroke-dasharray="0"
                                                class="apexcharts-pie-area apexcharts-donut-slice-1" index="0"
                                                j="1" data:angle="126.11464968152865"
                                                data:startAngle="100.89171974522293" data:strokeWidth="2" data:value="55"
                                                data:pathOrig="M 202.63882743292783 124.99901150727173 A 97.90243902439025 97.90243902439025 0 0 1 34.8912666900564 173.26134271170574 L 59.95432334853666 149.8948727626087 A 63.63658536585366 63.63658536585366 0 0 0 168.99023783140308 118.52435747972663 L 202.63882743292783 124.99901150727173 z"
                                                stroke="transparent"></path>
                                        </g>
                                        <g id="SvgjsG2190" class="apexcharts-series apexcharts-pie-series"
                                            seriesName="Sponsored" rel="3" data:realIndex="2">
                                            <path id="SvgjsPath2191"
                                                d="M 34.8912666900564 173.26134271170574 A 97.90243902439025 97.90243902439025 0 0 1 44.91337657308285 30.394971376422504 L 66.46869477250385 57.03173139467462 A 63.63658536585366 63.63658536585366 0 0 0 59.95432334853666 149.8948727626087 L 34.8912666900564 173.26134271170574 z"
                                                fill="rgba(250,92,124,1)" fill-opacity="1" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="2" stroke-dasharray="0"
                                                class="apexcharts-pie-area apexcharts-donut-slice-2" index="0"
                                                j="2" data:angle="94.01273885350315"
                                                data:startAngle="227.00636942675158" data:strokeWidth="2" data:value="41"
                                                data:pathOrig="M 34.8912666900564 173.26134271170574 A 97.90243902439025 97.90243902439025 0 0 1 44.91337657308285 30.394971376422504 L 66.46869477250385 57.03173139467462 A 63.63658536585366 63.63658536585366 0 0 0 59.95432334853666 149.8948727626087 L 34.8912666900564 173.26134271170574 z"
                                                stroke="transparent"></path>
                                        </g>
                                        <g id="SvgjsG2202" class="apexcharts-series apexcharts-pie-series"
                                            seriesName="Exmail" rel="4" data:realIndex="3">
                                            <path id="SvgjsPath2203"
                                                d="M 44.91337657308285 30.394971376422504 A 97.90243902439025 97.90243902439025 0 0 1 106.48291280101965 8.597562466749167 L 106.48889332066277 42.863415603386954 A 63.63658536585366 63.63658536585366 0 0 0 66.46869477250385 57.03173139467462 L 44.91337657308285 30.394971376422504 z"
                                                fill="rgba(255,188,0,1)" fill-opacity="1" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="2" stroke-dasharray="0"
                                                class="apexcharts-pie-area apexcharts-donut-slice-3" index="0"
                                                j="3" data:angle="38.980891719745216"
                                                data:startAngle="321.0191082802547" data:strokeWidth="2" data:value="17"
                                                data:pathOrig="M 44.91337657308285 30.394971376422504 A 97.90243902439025 97.90243902439025 0 0 1 106.48291280101965 8.597562466749167 L 106.48889332066277 42.863415603386954 A 63.63658536585366 63.63658536585366 0 0 0 66.46869477250385 57.03173139467462 L 44.91337657308285 30.394971376422504 z"
                                                stroke="transparent"></path>
                                        </g><text id="SvgjsText2168" font-family="Helvetica, Arial, sans-serif"
                                            x="168.7751672500915" y="55.06540420873238" text-anchor="middle"
                                            dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff"
                                            class="apexcharts-text apexcharts-pie-label" filter="url(#SvgjsFilter2169)"
                                            style="font-family: Helvetica, Arial, sans-serif;">28.0%</text><text
                                            id="SvgjsText2180" font-family="Helvetica, Arial, sans-serif"
                                            x="128.832134864309" y="184.12080811638248" text-anchor="middle"
                                            dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff"
                                            class="apexcharts-text apexcharts-pie-label" filter="url(#SvgjsFilter2181)"
                                            style="font-family: Helvetica, Arial, sans-serif;">35.0%</text><text
                                            id="SvgjsText2192" font-family="Helvetica, Arial, sans-serif"
                                            x="25.92849294727266" y="100.84788964277385" text-anchor="middle"
                                            dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff"
                                            class="apexcharts-text apexcharts-pie-label" filter="url(#SvgjsFilter2193)"
                                            style="font-family: Helvetica, Arial, sans-serif;">26.1%</text><text
                                            id="SvgjsText2204" font-family="Helvetica, Arial, sans-serif"
                                            x="79.55127907226216" y="30.358811799415292" text-anchor="middle"
                                            dominant-baseline="auto" font-size="12px" font-weight="600" fill="#ffffff"
                                            class="apexcharts-text apexcharts-pie-label" filter="url(#SvgjsFilter2205)"
                                            style="font-family: Helvetica, Arial, sans-serif;">10.8%</text>
                                    </g>
                                </g>
                            </g>
                            <line id="SvgjsLine2214" x1="0" y1="0" x2="213" y2="0"
                                stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs">
                            </line>
                            <line id="SvgjsLine2215" x1="0" y1="0" x2="213" y2="0"
                                stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                        </g>
                        <g id="SvgjsG2158" class="apexcharts-annotations"></g>
                    </svg>
                    <div class="apexcharts-legend"></div>
                    <div class="apexcharts-tooltip apexcharts-theme-dark">
                        <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker"
                                style="background-color: rgb(114, 124, 245);"></span>
                            <div class="apexcharts-tooltip-text"
                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                <div class="apexcharts-tooltip-y-group"><span
                                        class="apexcharts-tooltip-text-label"></span><span
                                        class="apexcharts-tooltip-text-value"></span></div>
                                <div class="apexcharts-tooltip-z-group"><span
                                        class="apexcharts-tooltip-text-z-label"></span><span
                                        class="apexcharts-tooltip-text-z-value"></span></div>
                            </div>
                        </div>
                        <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker"
                                style="background-color: rgb(10, 207, 151);"></span>
                            <div class="apexcharts-tooltip-text"
                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                <div class="apexcharts-tooltip-y-group"><span
                                        class="apexcharts-tooltip-text-label"></span><span
                                        class="apexcharts-tooltip-text-value"></span></div>
                                <div class="apexcharts-tooltip-z-group"><span
                                        class="apexcharts-tooltip-text-z-label"></span><span
                                        class="apexcharts-tooltip-text-z-value"></span></div>
                            </div>
                        </div>
                        <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker"
                                style="background-color: rgb(250, 92, 124);"></span>
                            <div class="apexcharts-tooltip-text"
                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                <div class="apexcharts-tooltip-y-group"><span
                                        class="apexcharts-tooltip-text-label"></span><span
                                        class="apexcharts-tooltip-text-value"></span></div>
                                <div class="apexcharts-tooltip-z-group"><span
                                        class="apexcharts-tooltip-text-z-label"></span><span
                                        class="apexcharts-tooltip-text-z-value"></span></div>
                            </div>
                        </div>
                        <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker"
                                style="background-color: rgb(255, 188, 0);"></span>
                            <div class="apexcharts-tooltip-text"
                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                <div class="apexcharts-tooltip-y-group"><span
                                        class="apexcharts-tooltip-text-label"></span><span
                                        class="apexcharts-tooltip-text-value"></span></div>
                                <div class="apexcharts-tooltip-z-group"><span
                                        class="apexcharts-tooltip-text-z-label"></span><span
                                        class="apexcharts-tooltip-text-z-value"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="chart-widget-list">
                <p>
                    <i class="mdi mdi-square text-primary"></i> Direct
                    <span class="float-right">$300.56</span>
                </p>
                <p>
                    <i class="mdi mdi-square text-danger"></i> Affilliate
                    <span class="float-right">$135.18</span>
                </p>
                <p>
                    <i class="mdi mdi-square text-success"></i> Sponsored
                    <span class="float-right">$48.96</span>
                </p>
                <p class="mb-0">
                    <i class="mdi mdi-square text-warning"></i> E-mail
                    <span class="float-right">$154.02</span>
                </p>
            </div>
            <div class="resize-triggers">
                <div class="expand-trigger">
                    <div style="width: 404px; height: 502px;"></div>
                </div>
                <div class="contract-trigger"></div>
            </div>
        </div> <!-- end card-body-->
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            function getfilter() {
                const dateFrom = $('#input-date-from').val();
                const dateTo = $('#input-date-to').val();
                $.ajax({
                    url: '{{route('filterDay')}}',
                    type: 'POST',
                    data: {
                        dateFrom,
                        dateTo
                    },
                    datatype: 'json',
                    success: function(result) {
                        $('.total-order').text(result.totalOrder);
                        $('.total-product').text(result.totalProductSold);
                        $('.total-revenue').text(result.totalPrice);
                        $('.total-user').text(result.totalUser);
                    }
                })
            }
            
            getfilter();
            $("#input-date-from,#input-date-to").datepicker({
                onSelect: function(dateText) {
                    getfilter();
                }})
        });
        
    </script>
@endpush
