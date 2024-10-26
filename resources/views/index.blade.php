@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">{{ __('msg.SGM') }} </h1>
                            <div class="text-center">
                                <img src="{{asset('images/quiz.jpg')}}" width="20%" alt="">
                            </div>
                    <div class="test">
                        
                        <article style="--c0: #f6ba96; --c1: #e2795b">
                          <h3 class="pt-2">
                              <a href="{{ url('Mode/Practice') }}">{{ __('msg.practice') }}</a>
                          </h3>
                          <p>Soufflé cake brownie ice cream</p>
                        </article>
                        <article style="--c0: #a2d5d0; --c1: #8dcbbc">
                            <h3 class="pt-2">
                                <a href="{{ url('Mode/Challenge') }}">{{ __('msg.challenge') }}</a>
                            </h3>
                          <p>Soufflé cake brownie ice cream</p>
                        </article>
                        <article style="--c0: #9cc884; --c1: #86b744">
                            <h3 class="pt-2">
                                <a href="{{ url('Mode/Moderator') }}">{{ __('msg.moderator') }}</a>
                            </h3>

                          <p>Soufflé cake brownie ice cream</p>
                        </article>
                        <article style="--c0: #fae791; --c1: #f5d357">
                            <h3 class="pt-2">
                                <a href="{{ url('Mode/Team') }}">{{ __('msg.team') }}</a>
                            </h3>
                          <p>Soufflé cake brownie ice cream</p>
                        </article>
                    </div>
                    <div class="Flex" id="InfographicContainer">
                        <div class="FlexCell Cell-2 TextCenter">
                            <h1 class="text-center">{{ __('msg.SGM') }} </h1>
                            <div class="text-center">
                                <img src="{{asset('images/quiz.jpg')}}" width="20%" alt="">
                            </div>
                            <svg xml:space="preserve" enable-background="new 0 0 700 1024" width="1200px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1" id="HowWeWorkInfographic" height="1024px" viewBox="150 500 700 1024">
                                <line fill="none" stroke="#ec0b43" stroke-width="2" stroke-miterlimit="10" x1="448.065" y1="739.789" x2="429.854" y2="721.58"></line>
                                <polygon fill="#ec0b43" points="434.412,719.086 424.78,716.506 427.36,726.137"></polygon>
                                <line fill="none" stroke="#4f772d" stroke-width="2" stroke-miterlimit="10" x1="589.486" y1="739.789" x2="607.696" y2="721.58"></line>
                                <polygon fill="#4f772d" points="610.189,726.137 612.77,716.506 603.139,719.086  "></polygon>
                                <line fill="none" stroke="#037fdb" stroke-width="2" stroke-miterlimit="10" x1="448.065" y1="881.211" x2="429.854" y2="899.42"></line>
                                <polygon fill="#037fdb" points="427.361,894.863 424.781,904.496 434.413,901.916     "></polygon>
                                <line fill="none" stroke="#4361ee" stroke-width="2" stroke-miterlimit="10" x1="589.486" y1="881.211" x2="607.696" y2="899.42"></line>
                                <polygon fill="#4361ee" points="603.139,901.914 612.771,904.494 610.19,894.863  "></polygon>
                                <g aria-label="Click to learn about some of the individuals we assist" tabindex="0">
                                    <path fill="#333333" d="M534.73,770.242h-4.289v2.625h4.289c1.483,0,2.69, 1.205,2.69,2.688v7.396c0, 1.48-1.207, 2.688-2.69,2.688h-1.186l-0.004,11.422h2.625v-9c2.23-0.629,3.88-2.684,3.88-5.109v-7.396C540.046,772.633,537.654,770.242,534.73,770.242"></path>
                                    <path fill="#333333" d="M502.562,772.867h4.226v-2.625h-4.226c-2.924,0-5.314,2.391-5.314, 
                                    5.313v7.396c0,2.426,1.647,4.48,3.88, 5.109v9h2.625l-0.006-11.422h-1.185c-1.482, 0-2.689-1.207-2.689-2.688v-7.396C499.873,774.072,501.08,772.867,502.562,772.867"></path>
                                    <path fill="#333333" d="M527.8, 770.242c-0.034-0.572-0.157-1.119-0.358-1.629c-0.434-1.096-1.223-2.012-2.223-2.613c-0.797-0.479-1.727-0.76-2.717-0.76h-7.773c-0.992,0-1.92,0.281-2.718,0.76c-1,0.602-1.788,1.518-2.223,2.613c-0.202,0.51-0.324,1.057-0.359,1.629c-0.005,0.104-0.016,0.207-0.016,0.314v10.145c0,0.686,0.137,1.338,0.375,1.941c0.413,1.041,1.146,1.924,2.076,2.523c0.048,0.031,0.098,0.061,0.147,0.09c0.397,0.238,0.827,0.424,1.28,0.555v11.25h2.625l0.004-13.672h-0.283h-0.908c-0.646,0-1.23-0.236-1.695-0.617c-0.602-0.494-0.996-1.232-0.996-2.07v-10.145c0-0.01,0.004-0.021,0.004-0.031c0.018-1.469,1.215-2.66,2.688-2.66h7.773c1.479,0,2.685,1.203,2.689,2.682v0.01v10.145c0,0.809-0.367,1.525-0.934,2.02c-0.473,0.412-1.083,0.668-1.756,0.668h-0.846h-0.348l0.002,13.672h2.625v-11.252c0.454-0.129,0.887-0.314,1.283-0.553c0.061-0.037,0.123-0.074,0.184-0.111c0.914-0.6,1.631-1.473,2.039-2.502c0.239-0.604,0.375-1.256,0.375-1.941v-10.145C527.816,770.449,527.807,770.346,527.8,770.242"></path>
                                    <path fill="#333333" d="M518.613,762.992c3.414,0,6.18-2.768,6.18-6.18s-2.766-6.18-6.18-6.18c-3.412, 0-6.179,2.768-6.179,6.18S515.201,762.992,518.613,762.992 M518.613, 753.258c1.961,0,3.555,1.596,3.555,3.555s-1.594,3.555-3.555,3.555c-1.959,0-3.554-1.596-3.554-3.555S516.654,753.258,518.613,753.258">
                                    </path>
                                    <path fill="#333333" d="M532.861,767.99c3.412,0,6.178-2.766,6.178-6.178s-2.766-6.178-6.178-6.178s-6.18,2.766-6.18,6.178S529.449,767.99,532.861,767.99M532.861,758.26c1.959,0,3.553,1.594,3.553,3.553s-1.594,3.553-3.553,3.553s-3.555-1.594-3.555-3.553S530.902,758.26,532.861,758.26"></path>
                                    <path fill="#333333" d="M504.431,767.99c3.412,0,6.179-2.766, 6.179-6.178s-2.767-6.178-6.179-6.178c-3.413,0-6.179,2.766-6.179,6.178S501.018,767.99,504.431,767.99 M504.431,758.26c1.96,0,3.554,1.594,3.554,3.553s-1.594,3.553-3.554,3.553c-1.958,0-3.554-1.594-3.554-3.553S502.473,758.26,504.431,758.26"></path>
                                    <text class="font-n" transform="matrix(1 0 0 1 520.3379 821.9922)" fill="#333333" font-family="'ProximaNova-Extrabld'" font-size="14">
                                        <tspan text-anchor="middle" x="0">MAHARAH</tspan>
                                        <tspan text-anchor="middle" x="0" dy="1.2em">QUIZ</tspan>
                                    </text>
                                    <circle fill="transparent" stroke="#333333" stroke-width="6" stroke-miterlimit="10" cx="518.776" cy="811.43" r="100" class="BGCircleInner"></circle>
                                </g>
                                <g id="Practice" aria-label="Click to learn about employment at Bosma" tabindex="0">
                                    <path fill="#ec0b43" d="M363.771,711.506c15.621,15.621,40.948,15.621,56.569,0s15.621-40.949,0-56.57s-40.948-15.621-56.569,0C348.149,670.557,348.149,695.885,363.771,711.506" class="BGCircle"></path>
                                    <text class="font-n" transform="matrix(1 0 0 1 230.1685 687.5234)">{{ __('msg.practice') }}</text>
                                    <path fill="#FFFFFF" d="M382.403,675.689c-2.975,0-5.386,2.412-5.386,5.387s2.411,5.387,5.386,5.387s5.382-2.412,5.382-5.387S385.378,675.689,382.403,675.689 M382.403,683.838c-1.523,0-2.761-1.238-2.761-2.762s1.238-2.762,2.761-2.762c1.52,0,2.757,1.238,2.757,2.762S383.923,683.838,382.403,683.838"></path>
                                    <path fill="#FFFFFF" d="M408.016,680.807h-13.301c-0.725,0-1.312-0.588-1.312-1.313s0.587-1.313,1.312-1.313h13.301c0.725,0,1.312,0.588,1.312,1.313S408.741,680.807,408.016,680.807"></path>
                                    <path fill="#FFFFFF" d="M408.016,686.381h-13.301c-0.725,0-1.312-0.588-1.312-1.311c0-0.727,0.587-1.314,1.312-1.314h13.301c0.725,0,1.312,0.588,1.312,1.314C409.328,685.793,408.741,686.381,408.016,686.381"></path>
                                    <path fill="#FFFFFF" d="M408.016,691.957h-13.301c-0.725,0-1.312-0.588-1.312-1.313c0-0.727,0.587-1.313,1.312-1.313h13.301c0.725,0,1.312,0.586,1.312,1.313C409.328,691.369,408.741,691.957,408.016,691.957"></path>
                                    <path fill="#FFFFFF" d="M388.154,661.887v12.373h8.688v-0.113v-12.26H388.154z M394.217, 671.635h-3.438v-7.123h3.438V671.635z"></path>
                                    <path fill="#FFFFFF" d="M412.011,668.783h-12.545v2.625h12.545c0.609,0,1.125,0.518,1.125,1.125v24.271c0,0.611-0.516,1.125-1.125,1.125h-21.456c0-0.02,0.003-0.037,0.003-0.057v-4.076c0-2.889-2.363-5.25-5.25-5.25h-5.613c-2.888,0-5.25,2.361-5.25,5.25v4.076c0,0.02,0.003,0.037,0.003,0.057H372.1c-0.61,0-1.125-0.514-1.125-1.125v-24.271c0-0.607,0.515-1.125,1.125-1.125h13.419v-2.625H372.1c-2.063,0-3.75,1.689-3.75,3.75v24.271c0,2.063,1.687,3.75,3.75,3.75h39.911c2.062,0,3.75-1.688,3.75-3.75v-24.271C415.761,670.473,414.073,668.783,412.011,668.783 M387.933,697.873c0,0.02-0.005,0.037-0.006,0.057h-10.851c-0.001-0.02-0.006-0.037-0.006-0.057v-4.076c0-1.447,1.177-2.625,2.625-2.625h5.613c1.447,0,2.625,1.178,2.625,2.625V697.873z"></path>
                                    <rect x="230" y="630" fill="transparent" width="220" height="95"></rect>
                                </g>
                                <g id="Challenge" aria-label="Click to learn about our community efforts" tabindex="0">
                                    <path fill="#4f772d" d="M674.339,711.506c-15.621,15.621-40.948,15.621-56.569,0s-15.621-40.949,0-56.57s40.948-15.621,56.569,0 S689.96,695.885,674.339,711.506" class="BGCircle"></path>
                                    <text class="font-n" transform="matrix(1 0 0 1 697.1504 687.5254)" fill="#333333">
                                        {{ __('msg.challenge') }}
                                    </text>
                                    <path fill="#FFFFFF" d="M639.193,673.703c0-1.447,1.178-2.625,2.625-2.625h8.473c1.448,0,2.625,1.178,2.625,2.625v3.012h2.625v-3.012c0-2.887-2.362-5.25-5.25-5.25h-8.473c-2.888,0-5.25,2.363-5.25,5.25v3.012h2.625V673.703z"></path>
                                    <path fill="#FFFFFF" d="M624.943,699.756c0-1.447,1.178-2.625,2.625-2.625h8.473c1.447,0,2.625,1.178,2.625,2.625v3.311h2.625v-3.311c0-2.889-2.362-5.25-5.25-5.25h-8.473c-2.888,0-5.25,2.361-5.25,5.25v3.311h2.625V699.756z"></path>
                                    <path fill="#FFFFFF" d="M652.551,686.977c-0.076-0.338-0.279-0.625-0.564-0.807l-4.566-3.156c-0.057-0.035-0.092-0.1-0.092-0.168v-5.277c0-0.715-0.581-1.297-1.297-1.297c-0.715,0-1.297,0.582-1.297,1.297v5.309c0,0.068-0.035,0.133-0.101,0.174l-4.501,3.113c-0.294,0.188-0.498,0.475-0.574,0.813c-0.074,0.336-0.016,0.684,0.17,0.979c0.372,0.586,1.182,0.787,1.797,0.4l4.424-3.068c0.065-0.041,0.152-0.037,0.205-0.004l4.438,3.076c0.208,0.131,0.446,0.201,0.691,0.201c0.447,0,0.858-0.227,1.1-0.605C652.566,687.66,652.626,687.313,652.551,686.977"></path>
                                    <path fill="#FFFFFF" d="M653.443,699.756c0-1.447,1.178-2.625,2.625-2.625h8.473c1.448,0,2.625,1.178,2.625,2.625v3.311h2.625v-3.311c0-2.889-2.362-5.25-5.25-5.25h-8.473c-2.888,0-5.25,2.361-5.25,5.25v3.311h2.625V699.756z"></path>
                                    <path fill="#FFFFFF" d="M645.939,655.375c-2.995,0-5.424,2.426-5.424,5.422s2.429,5.424,5.424,5.424c2.994,0,5.417-2.428,5.417-5.424S648.934,655.375,645.939,655.375 M645.939,663.596c-1.542,0-2.799-1.256-2.799-2.799c0-1.541,1.257-2.797,2.799-2.797c1.539,0,2.792,1.256,2.792,2.797C648.731,662.34,647.479,663.596,645.939,663.596"></path>
                                    <path fill="#FFFFFF" d="M660.189,681.426c-2.995,0-5.423,2.43-5.423,5.424c0,2.996,2.428,5.424,5.423,5.424c2.994,0,5.417-2.428,5.417-5.424C665.606,683.855,663.184,681.426,660.189,681.426 M660.189,689.648c-1.542,0-2.798-1.256-2.798-2.799c0-1.541,1.256-2.799,2.798-2.799c1.54,0,2.792,1.258,2.792,2.799C662.981,688.393,661.729,689.648,660.189,689.648"></path>
                                    <path fill="#FFFFFF" d="M631.689,692.273c2.994,0,5.417-2.428,5.417-5.424s-2.423-5.422-5.417-5.422c-2.995,0-5.424,2.426-5.424,5.422S628.694,692.273,631.689,692.273 M631.689,684.053c1.539,0,2.792,1.254,2.792,2.797s-1.253,2.799-2.792,2.799c-1.542,0-2.799-1.256-2.799-2.799S630.147,684.053,631.689,684.053"></path>
                                    <rect x="600" y="630" fill="transparent" width="220" height="95"></rect>
                                </g>
                                <g id="Group" aria-label="Click to learn about how we teach self-sufficiency" tabindex="0">
                                    <path fill="#037fdb" d="M363.771,966.064c15.621,15.621,40.948,15.621,56.569,0s15.621-40.949,0-56.57s-40.948-15.621-56.569,0C348.149,925.115,348.149,950.443,363.771,966.064" class="BGCircle"></path>
                                    <text class="font-n" transform="matrix(1 0 0 1 250 944)">
                                        {{ __('msg.team') }}
                                    </text>
                                    <path fill="#FFFFFF" d="M409.321,917.707c-2.949,0-5.338,2.389-5.338,5.334c0,2.947,2.389,5.336,5.338,5.336c2.95,0,5.339-2.389,5.339-5.336C414.66,920.096,412.271,917.707,409.321,917.707 M409.321,925.752c-1.496,0-2.713-1.217-2.713-2.711s1.217-2.709,2.713-2.709c1.497,0,2.714,1.215,2.714,2.709S410.818,925.752,409.321,925.752"></path>
                                    <path fill="#FFFFFF" d="M394.584,955.594v-8.506c0-0.725-0.588-1.313-1.312-1.313h-7.892c-0.725,0-1.312,0.588-1.312,1.313v8.506h-8.565v-15.359l13.787-12.348l9.832,8.752v-0.727c0-0.85,0.148-1.664,0.407-2.428l-9.37-8.338c-0.498-0.443-1.251-0.443-1.748,0.004l-15.097,13.52c-0.278,0.248-0.436,0.604-0.436,0.977v17.26c0,0.727,0.587,1.313,1.312,1.313h12.497l0.006-9.818h5.266l0.004,9.818h10.329v-2.625H394.584z"></path>
                                    <path fill="#FFFFFF" d="M402.7,929.496l-12.576-10.912c-0.495-0.43-1.23-0.428-1.722,0.002l-8.026,7.002v-2.301c0-0.723-0.588-1.313-1.313-1.313h-4.93c-0.725,0-1.313,0.59-1.313,1.313v8.891l-5.53,4.824c-0.546,0.477-0.603,1.305-0.126,1.852c0.476,0.547,1.306,0.604,1.852,0.127l6.436-5.615l-0.007-8.766h2.306l0.001,6.76l11.514-10.045l11.467,9.949C401.279,930.564,401.946,929.967,402.7,929.496"></path>
                                    <path fill="#FFFFFF" d="M411.955,930.598h-5.266c-2.924,0-5.316,2.391-5.316,5.314v7.305c0,2.16,1.308,4.029,3.17,4.855v10.1l2.625,0.004l0.01-12.268h-0.489c-1.484,0-2.691-1.207-2.691-2.691v-7.305c0-1.482,1.207-2.689,2.691-2.689h5.266c1.482,0,2.689,1.207,2.689,2.689v7.305c0,1.484-1.207,2.691-2.689,2.691h-0.489l0.01,12.268h2.625v-10.104c1.86-0.828,3.168-2.695,3.168-4.855v-7.305C417.269,932.988,414.877,930.598,411.955,930.598"></path>
                                    <rect x="195" y="890" fill="transparent" width="240" height="95"></rect>
                                </g>
                                <g id="Moderator" aria-label="Click to learn about the many confidence building experiences we provide" tabindex="0">
                                    <path fill="#4361ee" d="M674.339,966.064c-15.621,15.621-40.948,15.621-56.569,0s-15.621-40.949,0-56.57s40.948-15.621,56.569,0S689.96,950.443,674.339,966.064" class="BGCircle"></path>
                                    <text class="font-n" transform="matrix(1 0 0 1 697.1504 943.502)" fill="#333333">
                                        {{ __('msg.moderator') }}
                                    </text>
                                    <polygon fill="#FFFFFF" points="626.42,954.762 626.42,920.85 623.795,920.85 623.795,957.291 623.801,957.387 668.282,957.387668.282,954.762"></polygon>
                                    <path fill="#FFFFFF" d="M633.285,942.838c0-0.518,0.42-0.938,0.937-0.938h2.412c0.517,0,0.938,0.42,0.938,0.938v8.201h2.625v-8.201c0-1.965-1.599-3.564-3.563-3.564h-2.412c-1.964,0-3.562,1.6-3.562,3.564v8.201h2.625V942.838z"></path>
                                    <path fill="#FFFFFF" d="M645.905,951.002v-15.844c0-0.52,0.42-0.938,0.937-0.938h2.399c0.517,0,0.938,0.418,0.938,0.938v15.844c0,0.012-0.008,0.021-0.009,0.037h2.629c0-0.014,0.005-0.025,0.005-0.037v-15.844c0-1.967-1.599-3.563-3.563-3.563h-2.399c-1.963,0-3.562,1.596-3.562,3.563v15.844c0,0.012,0.004,0.023,0.004,0.037h2.628C645.912,951.023,645.905,951.014,645.905,951.002"></path>
                                    <path fill="#FFFFFF" d="M664.563,929.568h-4.923c-2.063,0-3.75,1.688-3.75,3.75v6.527c0,1.506,0.904,2.805,2.193,3.398v7.795h2.625l0.003-10.068h-1.071c-0.61,0-1.125-0.516-1.125-1.125v-6.527c0-0.609,0.515-1.125,1.125-1.125h4.923c0.61,0,1.125,0.516,1.125,1.125v6.527c0,0.609-0.515,1.125-1.125,1.125h-1.067l0.001,10.068h2.625v-7.795c1.287-0.594,2.191-1.893,2.191-3.398v-6.527C668.313,931.256,666.627,929.568,664.563,929.568"></path>
                                    <path fill="#FFFFFF" d="M662.13,927.539c-2.481,0-4.5-2.018-4.5-4.5c0-2.48,2.019-4.5,4.5-4.5c2.48,0,4.5,2.02,4.5,4.5C666.63,925.521,664.61,927.539,662.13,927.539 M662.13,920.789c-1.241,0-2.25,1.01-2.25,2.25c0,1.242,1.009,2.25,2.25,2.25s2.25-1.008,2.25-2.25C664.38,921.799,663.371,920.789,662.13,920.789"></path>
                                    <rect x="600" y="890" fill="transparent" width="240" height="95"></rect>
                                </g>
                            </svg>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>


@media (max-width: 200px) {
  html {
    font-size: 62.5%;
  }
}

article {
  --wide: 0;
  --base: calc(var(--wide)*5rem);
  --size: 1.25rem;
  --left: calc(.5*(1 + var(--wide))*5rem);
  display: flex;
  flex-direction: column;
  justify-content: center;
  position: relative;
  margin: 2em auto;
  padding-left: calc(var(--wide)*7.5rem);
  width: 32em;
  max-width: 90%;
  min-height: 6.25rem;
  font: 1em/1.25 roboto, trebuchet ms, verdana, arial, sans-serif;
  counter-increment: art;
  filter: drop-shadow(-1px 3px 3px rgba(0, 0, 0, 0.15));
}
@media (min-width: 640px) {
  article {
    --wide: 1 ;
  }
}
article:before, article:after {
  position: absolute;
}
article:before {
  left: 0.25em;
  color: #fff;
  font-size: var(--base);
  content: "0" counter(art);
}
article:after {
  --grad: linear-gradient(#fff, #e0e0e0);
  top: 0;
  right: 0;
  bottom: -1.25em;
  left: 0;
  z-index: -1;
  padding-left: inherit;
  border-bottom: solid 0.9375em transparent;
  transform: skewx(calc(var(--wide)*-22.5deg));
  background: var(--grad) 100% 50%/calc(100% - (var(--base) + var(--left) + var(--wide)*var(--size)) + 1px) 100% no-repeat padding-box, var(--grad) calc(var(--base) + (1 + 2*var(--wide))*var(--size)) 50%/var(--size) 100% no-repeat padding-box, radial-gradient(ellipse at 100% 50%, rgba(0, 0, 0, 0.13), transparent 35%) 0 50%/var(--size) 250% content-box, linear-gradient(var(--c0) 50%, var(--c1) 0) padding-box, radial-gradient(rgba(0, 0, 0, 0.1), transparent 70%) 100% 100%/calc(100% - (var(--base) + 2*var(--size))) 1.25em border-box no-repeat;
  content: "";
}

h3, p {
  padding-left: var(--left);
}

h3 {
  background: linear-gradient(var(--c0), var(--c1));
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  text-transform: capitalize;
  filter: brightness(0.85);
}
    #HowWeWorkInfographic g:focus .BGCircle,
    #HowWeWorkInfographic g:hover .BGCircle,
    #HowWeWorkInfographic g.Active .BGCircle {
        fill: #00b179;
    }

    #HowWeWorkInfographic g:focus .BGCircleInner,
    #HowWeWorkInfographic g:hover .BGCircleInner,
    #HowWeWorkInfographic g.Active .BGCircleInner {
        stroke: #00b179;
    }

    #HowWeWorkInfographic g:hover {
        cursor: pointer;
    }

    #HowWeWorkInfographic g.Active .SecondaryGreenFill {
        fill: #00b179;
    }

    #HowWeWorkInfographic g.Active .SecondaryGreenStroke {
        stroke: #00b179;
    }

    #HowWeWorkInfoGraphicText {
        position: relative;
    }

    #InfographicContainer {
        position: relative;
    }

    #InfographicContainer svg {
        max-width: 100%;
    }

    .font-n {
        font-size: 2em;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        $("#HowWeWorkInfographic g").click(function(e) {
            $("#HowWeWorkInfographic g").attr("class", "");
            $(this).attr("class", "Active");
            $("#HowWeWorkInfoGraphicText").addClass("Active");
            ToggleText($(this).attr("id"));
        });


        $("#HowWeWorkInfoGraphicText a.Minor").click(function(e) {
            $("#HowWeWorkInfoGraphicText").removeClass("Active");
            if ($(window).width() < 1024) {
                $("#HowWeWorkInfographic g").attr("class", "");
            }

        });

        function ToggleText(TextElement) {
            $("#HowWeWorkInfoGraphicText div").fadeOut(250);
            var FromTop = $("#" + TextElement).position().top - 40;
            if ((FromTop + $("#" + TextElement + "Text").outerHeight()) > $("#HowWeWorkInfoGraphicText").outerHeight()) {
                var FromTop = ($("#HowWeWorkInfoGraphicText").outerHeight() - ($("#" + TextElement + "Text").outerHeight()) - 40);
            }
            $("#" + TextElement + "Text").css("top", FromTop);
            setTimeout(function() {
                $("#" + TextElement + "Text").fadeIn();
                $("#" + TextElement + "Text").focus();
            }, 2500);
            window.location = '/Mode/' + TextElement;

        }
    });
</script>