<?php
//Exit If Accesed Directly
if( ! defined('ABSPATH') ) exit;

/**
 * @webruber 1.0
 * This is a SVG library that return the expected SVG icon
 */

function webruber_svg($name) {
    $icon = '';
    if($name == 'search') $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
    </svg>';

    if($name == 'logo') $icon = '<svg width="158" height="35" viewBox="0 0 577 128" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M41.0934 113.037L14.8267 85.8135C13.8686 84.8193 13.3333 83.4927 13.3333 82.112L13.3333 45.888C13.3319 44.5056 13.8673 43.1767 14.8267 42.1814L41.0934 14.9627C41.5912 14.447 42.1877 14.037 42.8476 13.757C43.5072 13.4771 44.2166 13.333 44.9334 13.3333H83.0666C83.7834 13.333 84.4928 13.4771 85.1527 13.757C85.8123 14.037 86.4088 14.447 86.9066 14.9627L113.173 42.184C114.132 43.1787 114.668 44.5065 114.667 45.888V82.112C114.668 83.4944 114.133 84.8233 113.173 85.8186L86.9066 113.037C86.4088 113.553 85.8123 113.963 85.1527 114.243C84.4928 114.523 83.7834 114.667 83.0666 114.667H44.9334C44.2166 114.667 43.5072 114.523 42.8476 114.243C42.1877 113.963 41.5912 113.553 41.0934 113.037Z" stroke="#3E4347" stroke-width="8"/>
        <path d="M33.7013 80.4764H94.2987C95.2801 80.4764 96.0159 79.7724 96.0159 78.8338V40.1138C96.0159 39.1751 95.2801 38.4711 94.2987 38.4711H33.7013C32.8428 38.4711 32.1067 39.1751 32.1067 40.1138V78.8338C32.1067 79.7724 32.8428 80.4764 33.7013 80.4764Z" fill="#212528"/>
        <path d="M27.2 86.2256C27.2 88.1032 28.7946 90.0978 30.8799 90.0978H97.1201C99.0828 90.0978 100.8 88.1032 100.8 86.2256H27.2Z" fill="#212528"/>
        <path d="M94.6665 80.4764H33.3335L27.2 86.2256H100.8L94.6665 80.4764Z" fill="#DDDDDD"/>
        <path d="M92.5812 80.9458H35.4187L33.3335 83.2925H94.6665L92.5812 80.9458Z" fill="#BFBEBE"/>
        <path d="M70.2561 84.3483H57.7439L56.7626 85.6391H71.2374L70.2561 84.3483Z" fill="#212528"/>
        <path d="M35.7865 41.9911H92.2135V76.9564H35.7865V41.9911Z" fill="#3E4347"/>
        <path d="M64 41.2871C64.5419 41.2871 64.9813 40.867 64.9813 40.3484C64.9813 39.8299 64.5419 39.4098 64 39.4098C63.4581 39.4098 63.0187 39.8299 63.0187 40.3484C63.0187 40.867 63.4581 41.2871 64 41.2871Z" fill="#DDDDDD"/>
        <path d="M69.2748 88.6898H58.7253C58.3575 88.6898 57.3762 88.6898 57.3762 87.5164H70.6242C70.6242 88.6898 69.6425 88.6898 69.2748 88.6898Z" fill="#3E4347"/>
        <path d="M63.1831 66.8049V70.464H50.5401V51.5405H54.7999V66.8049H63.1831ZM65.9268 70.464V51.5405H78.5971V55.1176H70.1867V59.0771H77.6687V62.6543H70.1867V70.464H65.9268Z" fill="white"/>
        <path d="M131.085 100V30.3906H145.007V88.1348H159.324V100H131.085ZM163.001 100L169.724 30.3906H193.336L199.941 100H186.771L185.782 88.7676H177.397L176.527 100H163.001ZM178.386 77.6538H184.714L181.669 42.2559H181.036L178.386 77.6538ZM205.833 100V30.3906H224.224C228.073 30.3906 231.119 31.2476 233.36 32.9614C235.628 34.6753 237.249 37.1143 238.225 40.2783C239.2 43.4424 239.688 47.2129 239.688 51.5898C239.688 55.8086 239.28 59.4868 238.462 62.6245C237.645 65.7358 236.181 68.1484 234.072 69.8623C231.989 71.5762 229.023 72.4331 225.173 72.4331H219.517V100H205.833ZM219.517 59.9351H220.308C222.892 59.9351 224.474 59.21 225.054 57.7598C225.635 56.3096 225.925 54.1738 225.925 51.3525C225.925 48.7158 225.635 46.6855 225.054 45.2617C224.501 43.8115 223.169 43.0864 221.06 43.0864H219.517V59.9351ZM251.71 100V43.7588H243.444V30.3906H273.898V43.7588H265.632V100H251.71ZM296.005 100.633C290.442 100.633 286.184 98.9585 283.23 95.6099C280.304 92.2349 278.84 87.3701 278.84 81.0156V47.9512C278.84 41.9922 280.291 37.4702 283.191 34.3853C286.118 31.3003 290.389 29.7578 296.005 29.7578C301.622 29.7578 305.88 31.3003 308.78 34.3853C311.707 37.4702 313.17 41.9922 313.17 47.9512V81.0156C313.17 87.3701 311.694 92.2349 308.741 95.6099C305.814 98.9585 301.569 100.633 296.005 100.633ZM296.124 87.8184C298.233 87.8184 299.288 85.7749 299.288 81.688V47.7139C299.288 44.2861 298.26 42.5723 296.203 42.5723C293.883 42.5723 292.723 44.3257 292.723 47.8325V81.7671C292.723 83.9292 292.986 85.4849 293.514 86.4341C294.041 87.3569 294.911 87.8184 296.124 87.8184ZM320.407 100V30.3906H338.798C342.647 30.3906 345.693 31.2476 347.934 32.9614C350.202 34.6753 351.823 37.1143 352.799 40.2783C353.774 43.4424 354.262 47.2129 354.262 51.5898C354.262 55.8086 353.853 59.4868 353.036 62.6245C352.219 65.7358 350.755 68.1484 348.646 69.8623C346.563 71.5762 343.597 72.4331 339.747 72.4331H334.091V100H320.407ZM334.091 59.9351H334.882C337.466 59.9351 339.048 59.21 339.628 57.7598C340.208 56.3096 340.498 54.1738 340.498 51.3525C340.498 48.7158 340.208 46.6855 339.628 45.2617C339.075 43.8115 337.743 43.0864 335.634 43.0864H334.091V59.9351ZM360.312 100V30.3906H388.156V43.9565H374.313V55.0308H387.444V68.4385H374.313V100H360.312ZM391.674 100L398.398 30.3906H422.009L428.614 100H415.444L414.455 88.7676H406.07L405.2 100H391.674ZM407.059 77.6538H413.387L410.342 42.2559H409.709L407.059 77.6538ZM451.038 100.633C444.684 100.633 440.096 99.0508 437.274 95.8867C434.48 92.7227 433.082 87.6865 433.082 80.7783V73.9756H446.846V82.6768C446.846 84.2852 447.083 85.5508 447.558 86.4736C448.059 87.3701 448.916 87.8184 450.128 87.8184C451.394 87.8184 452.264 87.4492 452.739 86.7109C453.24 85.9727 453.49 84.7598 453.49 83.0723C453.49 80.9365 453.279 79.1567 452.857 77.7329C452.436 76.2827 451.697 74.9116 450.643 73.6196C449.614 72.3013 448.177 70.772 446.332 69.0317L440.083 63.0991C435.416 58.6958 433.082 53.6597 433.082 47.9907C433.082 42.0581 434.453 37.5361 437.195 34.4248C439.964 31.3135 443.959 29.7578 449.179 29.7578C455.56 29.7578 460.082 31.4585 462.745 34.8599C465.435 38.2612 466.779 43.4292 466.779 50.3638H452.62V45.5781C452.62 44.6289 452.343 43.8906 451.79 43.3633C451.262 42.8359 450.537 42.5723 449.614 42.5723C448.507 42.5723 447.689 42.8887 447.162 43.5215C446.661 44.1279 446.411 44.9189 446.411 45.8945C446.411 46.8701 446.674 47.9248 447.202 49.0586C447.729 50.1924 448.771 51.4976 450.326 52.9741L458.355 60.6865C459.963 62.2158 461.44 63.8374 462.785 65.5513C464.129 67.2388 465.21 69.2163 466.028 71.4839C466.845 73.7251 467.254 76.4673 467.254 79.7104C467.254 86.2495 466.041 91.3779 463.615 95.0957C461.216 98.7871 457.023 100.633 451.038 100.633ZM479.513 100V43.7588H471.247V30.3906H501.701V43.7588H493.435V100H479.513ZM507.197 100V30.3906H535.041V43.8379H521.356V57.4038H534.487V70.4951H521.356V86.4341H535.951V100H507.197ZM542.198 100V30.3906H563.555C567.115 30.3906 569.804 31.208 571.624 32.8428C573.443 34.4512 574.656 36.7188 575.262 39.6455C575.895 42.5459 576.212 45.9604 576.212 49.8892C576.212 53.686 575.724 56.7183 574.748 58.9858C573.799 61.2534 571.993 62.8223 569.33 63.6924C571.518 64.1406 573.048 65.2349 573.918 66.9751C574.814 68.689 575.262 70.917 575.262 73.6592V100H561.538V72.7495C561.538 70.7192 561.116 69.4668 560.273 68.9922C559.455 68.4912 558.124 68.2407 556.278 68.2407V100H542.198ZM556.357 56.1777H559.719C561.644 56.1777 562.606 54.0815 562.606 49.8892C562.606 47.1733 562.395 45.3936 561.973 44.5498C561.551 43.7061 560.76 43.2842 559.6 43.2842H556.357V56.1777Z" fill="#212528"/>
        </svg>
        ';
    
    if($name == 'pointing-right') $icon = '<svg  width="34" height="34"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
        <path style="fill:#507C5C;" d="M86.883,423.441H15.054C6.74,423.441,0,416.7,0,408.387V159.603c0-8.313,6.74-15.054,15.054-15.054
            h71.829c8.314,0,15.054,6.741,15.054,15.054v132.043c0,8.313-6.74,15.054-15.054,15.054s-15.054-6.741-15.054-15.054V174.657H30.108
            v218.676h41.722v-28.605c0-8.313,6.74-15.054,15.054-15.054s15.054,6.741,15.054,15.054v43.659
            C101.937,416.7,95.197,423.441,86.883,423.441z"/>
        <path style="fill:#CFF09E;" d="M313.987,302.481h15.951c15.948,0,29.53-13.01,30.096-29.728
            c0.595-17.553-12.793-31.979-29.391-31.979H313.43l154.106-0.333c16.243,0,29.411-13.813,29.411-30.854V208.4
            c0-17.039-13.168-30.854-29.411-30.854H356.864h-25.447h-76.908l73.098-30.02c15.769-5.281,24.465-22.984,19.431-39.527
            c-5.043-16.543-21.909-25.665-37.684-20.384L173.61,153.532c-16.765,8.141-27.5,25.756-27.509,45.137l-0.078,177.421
            c-0.012,27.491,21.226,49.783,47.432,49.786l116.556,0.018c16.243,0,29.411-13.813,29.411-30.854l0,0
            c0-17.039-13.168-30.854-29.411-30.854h6.99c16.243,0,29.411-13.813,29.411-30.854l0,0c0-17.039-13.168-30.854-29.411-30.854"/>
        <path style="fill:#507C5C;" d="M310.008,440.95l-116.557-0.02c-16.832-0.001-32.616-6.84-44.443-19.255
            c-11.641-12.218-18.046-28.41-18.039-45.591l0.077-177.421c0.012-25.031,14.137-48.062,35.988-58.672l135.745-65.918
            c0.583-0.283,1.182-0.528,1.796-0.733c11.308-3.786,23.391-2.853,34.022,2.625c11.03,5.684,19.142,15.502,22.843,27.643
            c7.325,24.074-5.459,49.967-28.529,58.013l-2.121,0.87h136.749c24.518,0,44.464,20.595,44.464,45.908v1.186
            c0,25.313-19.946,45.907-44.464,45.907l-95.206,0.206c1.995,5.564,2.955,11.533,2.75,17.56
            c-0.521,15.338-8.286,28.625-19.916,36.537c3.998,6.886,6.3,14.939,6.3,23.537c0,13.886-6,26.35-15.465,34.776
            c5.329,7.569,8.475,16.88,8.475,26.933C354.472,420.355,334.526,440.95,310.008,440.95z M314.896,101.658l-134.712,65.415
            c-11.555,5.612-19.025,18.016-19.031,31.602l-0.077,177.42c-0.003,9.41,3.452,18.223,9.729,24.81
            c6.091,6.393,14.134,9.914,22.648,9.916l116.556,0.02c7.914,0,14.354-7.089,14.354-15.8c0-8.712-6.44-15.799-14.357-15.799
            c-8.313,0-15.054-6.741-15.054-15.054c0-8.313,6.741-15.054,15.054-15.054h6.991c7.917,0,14.357-7.089,14.357-15.801
            s-6.44-15.801-14.357-15.801h-3.011c-8.313,0-15.054-6.741-15.054-15.054s6.741-15.054,15.054-15.054h15.953
            c8.015,0.002,14.768-6.81,15.051-15.185c0.157-4.638-1.45-8.943-4.522-12.123c-2.675-2.768-6.165-4.293-9.824-4.293h-17.213
            c-8.308,0-15.045-6.731-15.054-15.037c-0.009-8.307,6.714-15.052,15.022-15.07l154.104-0.333c7.948,0,14.39-7.087,14.39-15.799
            v-1.186c0-8.712-6.44-15.8-14.357-15.8H254.51c-7.19,0-13.377-5.085-14.769-12.138c-1.392-7.056,2.398-14.108,9.049-16.841
            l73.098-30.02c0.309-0.128,0.622-0.244,0.939-0.349c8.085-2.708,12.487-12.07,9.809-20.869c-1.308-4.295-4.092-7.726-7.834-9.654
            C321.696,101.127,318.208,100.757,314.896,101.658z"/>
        </svg>';

    if($name == 'note') $icon = '<svg height="35" width="35" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
        <path style="fill:#FFB656;" d="M412.673,155.695H99.327c-17.965,0-32.58,14.615-32.58,32.58v201.626v89.518
            c0,17.965,14.615,32.58,32.58,32.58h89.518h134.308h89.518c17.965,0,32.58-14.615,32.58-32.58v-89.518V188.274
            C445.253,170.31,430.638,155.695,412.673,155.695z"/>
        <path style="fill:#FFA733;" d="M412.673,155.695h-33.854c17.965,0,32.58,14.615,32.58,32.58v201.626v89.518
            c0,17.965-14.615,32.58-32.58,32.58h33.854c17.965,0,32.58-14.615,32.58-32.58v-89.518V188.274
            C445.253,170.31,430.638,155.695,412.673,155.695z"/>
        <path style="fill:#C6C5CB;" d="M256.001,201.205c-12.547,0-22.755-10.207-22.755-22.755V67.452h45.509V178.45
            C278.755,190.996,268.548,201.205,256.001,201.205z"/>
        <path style="fill:#ACABB1;" d="M264.325,178.45V67.452h14.43V178.45c0,12.547-10.207,22.755-22.755,22.755
            c-2.524,0-4.945-0.43-7.215-1.192C257.803,196.987,264.325,188.473,264.325,178.45z"/>
        <path style="fill:#FE5022;" d="M256.001,0.298c30.909,0,56.054,25.146,56.054,56.054s-25.146,56.054-56.054,56.054
            s-56.054-25.146-56.054-56.054S225.092,0.298,256.001,0.298z"/>
        <path style="fill:#FF3501;" d="M267.527,26.605c23.281,20.33,25.682,55.811,5.351,79.092c-1.651,1.89-3.378,3.874-5.214,5.488
            c11.693-2.34,22.7-8.637,31.133-18.293c20.33-23.281,17.93-58.761-5.351-79.092c-21.39-18.68-53.072-18.155-73.846,0.109
            C236.1,10.607,253.902,14.707,267.527,26.605z"/>
        <path style="fill:#FFA733;" d="M66.748,388.007l123.993,123.992H99.327c-17.965,0-32.58-14.615-32.58-32.58v-91.412H66.748z"/>
        <g>
            <path style="fill:#CC7400;" d="M145.002,264.474H278.2c4.599,0,8.325-3.727,8.325-8.325c0-4.598-3.726-8.325-8.325-8.325H145.002
                c-4.598,0-8.325,3.727-8.325,8.325C136.677,260.746,140.405,264.474,145.002,264.474z"/>
            <path style="fill:#CC7400;" d="M322.6,264.474h44.399c4.599,0,8.325-3.727,8.325-8.325c0-4.598-3.726-8.325-8.325-8.325H322.6
                c-4.599,0-8.325,3.727-8.325,8.325C314.275,260.746,318.001,264.474,322.6,264.474z"/>
            <path style="fill:#CC7400;" d="M145.002,331.073h66.599c4.598,0,8.325-3.727,8.325-8.325c0-4.598-3.727-8.325-8.325-8.325h-66.599
                c-4.598,0-8.325,3.727-8.325,8.325C136.677,327.345,140.405,331.073,145.002,331.073z"/>
            <path style="fill:#CC7400;" d="M247.676,322.748c0,4.598,3.727,8.325,8.325,8.325h110.998c4.599,0,8.325-3.727,8.325-8.325
                c0-4.598-3.726-8.325-8.325-8.325H256.001C251.403,314.423,247.676,318.15,247.676,322.748z"/>
            <path style="fill:#CC7400;" d="M167.202,381.022h-22.2c-4.598,0-8.325,3.727-8.325,8.325c0,4.598,3.727,8.325,8.325,8.325h22.2
                c4.598,0,8.325-3.727,8.325-8.325C175.527,384.749,171.799,381.022,167.202,381.022z"/>
            <path style="fill:#CC7400;" d="M278.2,381.022h-66.599c-4.598,0-8.325,3.727-8.325,8.325c0,4.598,3.727,8.325,8.325,8.325H278.2
                c4.599,0,8.325-3.727,8.325-8.325C286.525,384.749,282.798,381.022,278.2,381.022z"/>
        </g>
        <path style="fill:#ED8800;" d="M160.627,388.007c16.604,0,30.114,13.51,30.114,30.114V512L66.748,388.007H160.627z"/>
        </svg>
        ';

    if($name == 'bulb') $icon = '<svg height="35" width="35" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
        <path style="fill:#999999;" d="M279.883,474.891v11.037c0,9.32-7.554,16.875-16.875,16.875h-14.005
        c-9.32,0-16.875-7.554-16.875-16.875v-11.037c4.317,1.006,8.817,1.545,13.453,1.545h20.836
        C271.053,476.436,275.554,475.896,279.883,474.891z"/>
        <g>
        <path style="fill:#B3B3B3;" d="M187.76,428.608h136.492c-4.329,22.847-21.866,41.021-44.369,46.282
            c-4.329,1.006-8.83,1.545-13.465,1.545h-20.836c-4.636,0-9.136-0.54-13.453-1.545C209.626,469.63,192.089,451.455,187.76,428.608z"
            />
        <path style="fill:#B3B3B3;" d="M325.295,396.503v21.056c0,3.777-0.356,7.468-1.042,11.049H187.76
            c-0.687-3.581-1.042-7.272-1.042-11.049v-21.056h33.111h36.177h36.177H325.295z"/>
        </g>
        <path style="fill:#F95428;" d="M256.006,155.133l19.205,28.647c-5.482,3.691-12.092,5.85-19.205,5.85s-13.711-2.146-19.205-5.85
        L256.006,155.133z"/>
        <path style="fill:#CCCCCC;" d="M275.211,183.78l16.973,25.312h-0.012c-11.54,4.991-23.852,7.481-36.165,7.481
        c-12.325,0-24.637-2.489-36.177-7.481l16.973-25.312c5.494,3.704,12.092,5.85,19.205,5.85
        C263.119,189.63,269.729,187.472,275.211,183.78z"/>
        <g>
        <path style="fill:#2BA5F7;" d="M292.183,209.092v187.41h-36.177V216.585v-0.012c12.313,0,24.625-2.489,36.165-7.481H292.183z"/>
        <path style="fill:#2BA5F7;" d="M256.006,216.585v179.917h-36.177v-187.41c11.54,4.991,23.852,7.481,36.177,7.481V216.585z"/>
        </g>
        <path style="fill:#F7B239;" d="M402.837,206.554c0,39.77-15.82,75.837-41.487,102.277c-22.871,23.546-36.055,54.842-36.055,87.672
        h-33.111v-187.41l-16.973-25.312l-19.205-28.647l-19.205,28.647l-16.973,25.312v187.41h-33.111
        c0-32.891-13.281-64.163-36.165-87.782c-25.189-25.986-40.862-61.256-41.377-100.18c-1.067-80.657,64.064-147.664,144.709-148.805
        C335.952,58.583,402.837,124.756,402.837,206.554z"/>
        <g>
        <path style="fill:#FFFFFF;" d="M372.178,215.751c-5.08,0-9.198-4.118-9.198-9.198c0-47.507-31.917-89.812-77.618-102.877
            c-4.883-1.397-7.711-6.487-6.314-11.372c1.397-4.885,6.489-7.71,11.371-6.316c53.553,15.311,90.956,64.888,90.956,120.563
            C381.376,211.633,377.258,215.751,372.178,215.751z"/>
        <path style="fill:#FFFFFF;" d="M262.39,99.751c-0.162,0-0.325-0.004-0.488-0.012c-2.081-0.109-4.124-0.157-6.075-0.159
            c-0.438,0-0.876,0-1.313,0.01c-5.065,0.114-9.285-3.917-9.395-8.995c-0.11-5.078,3.917-9.285,8.995-9.395
            c2.846-0.061,5.749,0.012,8.75,0.17c5.073,0.266,8.97,4.594,8.705,9.666C271.311,95.943,267.25,99.751,262.39,99.751z"/>
        </g>
        <g>
        <path style="fill:#F7B239;" d="M455.337,217.738h-16.053c-5.08,0-9.198-4.118-9.198-9.198s4.118-9.198,9.198-9.198h16.053
            c5.08,0,9.198,4.118,9.198,9.198S460.416,217.738,455.337,217.738z"/>
        <path style="fill:#F7B239;" d="M72.703,217.738H56.662c-5.08,0-9.198-4.118-9.198-9.198s4.118-9.198,9.198-9.198h16.041
            c5.08,0,9.198,4.118,9.198,9.198S77.784,217.738,72.703,217.738z"/>
        <path style="fill:#F7B239;" d="M414.727,126.094c-3.181,0-6.275-1.652-7.977-4.607c-2.536-4.401-1.024-10.025,3.377-12.561
            l13.919-8.02c4.401-2.535,10.025-1.024,12.561,3.377c2.536,4.401,1.024,10.025-3.377,12.561l-13.919,8.02
            C417.866,125.698,416.286,126.094,414.727,126.094z"/>
        <path style="fill:#F7B239;" d="M83.381,317.404c-3.179,0-6.27-1.649-7.974-4.601c-2.54-4.399-1.031-10.024,3.368-12.564
            l13.895-8.02c4.4-2.54,10.024-1.031,12.564,3.368c2.54,4.399,1.031,10.024-3.368,12.564l-13.895,8.02
            C86.522,317.007,84.94,317.404,83.381,317.404z"/>
        <path style="fill:#F7B239;" d="M347.63,59.013c-1.561,0-3.143-0.397-4.591-1.235c-4.399-2.541-5.905-8.166-3.365-12.565
            l8.033-13.907c2.541-4.399,8.167-5.905,12.565-3.364c4.399,2.541,5.905,8.166,3.365,12.565l-8.033,13.907
            C353.899,57.365,350.808,59.013,347.63,59.013z"/>
        <path style="fill:#F7B239;" d="M256.006,34.46c-5.08,0-9.198-4.118-9.198-9.198V9.198c0-5.08,4.118-9.198,9.198-9.198
            s9.198,4.118,9.198,9.198v16.065C265.204,30.342,261.086,34.46,256.006,34.46z"/>
        <path style="fill:#F7B239;" d="M164.369,59.013c-3.177,0-6.269-1.648-7.972-4.599l-8.033-13.907
            c-2.541-4.399-1.034-10.024,3.365-12.565c4.398-2.54,10.023-1.035,12.565,3.364l8.033,13.907
            c2.541,4.399,1.034,10.024-3.365,12.565C167.512,58.616,165.93,59.013,164.369,59.013z"/>
        <path style="fill:#F7B239;" d="M97.271,126.094c-1.559,0-3.139-0.396-4.587-1.231l-13.907-8.02c-4.4-2.537-5.91-8.163-3.372-12.563
            c2.537-4.401,8.161-5.911,12.563-3.372l13.907,8.02c4.4,2.537,5.91,8.163,3.372,12.563
            C103.544,124.444,100.45,126.094,97.271,126.094z"/>
        <path style="fill:#F7B239;" d="M428.63,317.404c-1.56,0-3.142-0.397-4.59-1.234l-13.895-8.02c-4.399-2.54-5.907-8.165-3.368-12.564
            c2.54-4.4,8.165-5.906,12.564-3.368l13.895,8.02c4.399,2.54,5.907,8.165,3.368,12.564
            C434.901,315.755,431.809,317.404,428.63,317.404z"/>
        </g>
        <path style="fill:#333333;" d="M365.546,95.448c-29.969-29.55-69.665-45.5-111.789-44.906
        c-85.928,1.207-154.91,72.139-153.773,158.117c0.529,39.95,16.14,77.759,43.958,106.463c21.649,22.338,33.571,51.24,33.571,81.384
        v21.058c0,29.592,18.988,54.821,45.414,64.178v4.186c0,14.376,11.696,26.072,26.072,26.072h14.004
        c14.376,0,26.072-11.696,26.072-26.072v-4.187c26.424-9.358,45.409-34.587,45.409-64.177v-21.058
        c0-30.189,11.882-59.051,33.46-81.269c28.428-29.273,44.083-67.87,44.083-108.681C412.029,164.462,395.522,125.004,365.546,95.448z
            M195.909,417.561v-11.86h120.182v11.86c0,0.619-0.025,1.234-0.047,1.848H195.956C195.934,418.796,195.909,418.182,195.909,417.561z
            M265.198,225.308c5.997-0.548,11.948-1.643,17.782-3.267v165.265h-17.782V225.308z M239.855,195.729
        c5.098,2.033,10.558,3.098,16.146,3.098c5.586,0,11.043-1.066,16.142-3.098l5.787,8.632c-14.326,3.966-29.539,3.966-43.864,0
        L239.855,195.729z M250.513,179.832l5.487-8.183l5.487,8.183c-1.787,0.395-3.623,0.6-5.484,0.6
        C254.138,180.432,252.3,180.228,250.513,179.832z M229.02,222.042c5.834,1.624,11.784,2.718,17.782,3.267v161.998H229.02V222.042z
            M270.681,485.927c0,4.233-3.444,7.677-7.677,7.677H249c-4.233,0-7.677-3.444-7.677-7.677v-0.441
        c1.412,0.087,2.829,0.147,4.263,0.147h20.831c1.434,0,2.854-0.06,4.266-0.147v0.441H270.681z M266.415,467.238h-20.831
        c-20.183,0-37.581-12.107-45.347-29.432h111.524C303.996,455.132,286.599,467.238,266.415,467.238z M354.749,302.42
        c-22.735,23.412-36.15,53.264-38.336,84.888h-15.039V209.092c0-1.824-0.542-3.607-1.559-5.122l-36.177-53.959
        c-1.708-2.547-4.573-4.075-7.639-4.075c-3.066,0-5.932,1.528-7.639,4.075l-36.177,53.959c-1.015,1.515-1.559,3.298-1.559,5.122
        v178.215h-15.041c-2.194-31.586-15.641-61.473-38.432-84.988c-24.538-25.319-38.307-58.668-38.773-93.904
        c-0.484-36.559,13.405-71.25,39.107-97.685c25.705-26.439,59.988-41.281,96.532-41.795c0.666-0.01,1.331-0.013,1.997-0.013
        c36.413,0,70.657,14.027,96.618,39.626c26.441,26.072,41.003,60.878,41.003,98.008C393.634,242.553,379.824,276.599,354.749,302.42z
        "/>
        </svg>
        ';

    if($name == 'warning') $icon = '<svg height="35" width="35" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931;" xml:space="preserve">
        <circle style="fill:#E84849;" cx="236.966" cy="236.966" r="236.966"/>
        <path style="fill:#EDC92C;" d="M409.266,333.9L246.676,71.853c-1.893-3.057-5.231-4.913-8.823-4.913
            c-3.596,0-6.933,1.86-8.827,4.913L65.997,334.618c-1.987,3.203-2.088,7.233-0.251,10.526c1.83,3.293,5.31,5.336,9.074,5.336h326.072
            h0.045c5.736,0,10.383-4.651,10.383-10.383C411.313,337.772,410.553,335.632,409.266,333.9z"/>
        <path d="M225.819,242.111l-3.371-50.439c-0.632-9.83-0.943-16.887-0.943-21.167c0-5.826,1.527-10.372,4.576-13.635
            c3.053-3.274,7.079-4.902,12.06-4.902c6.039,0,10.08,2.088,12.112,6.264c2.032,4.18,3.053,10.204,3.053,18.058
            c0,4.636-0.247,9.347-0.733,14.11l-4.531,51.917c-0.49,6.181-1.542,10.918-3.162,14.222c-1.616,3.296-4.288,4.943-8.004,4.943
            c-3.794,0-6.425-1.59-7.895-4.789C227.503,253.504,226.448,248.64,225.819,242.111z M237.508,311.401
            c-4.284,0-8.026-1.381-11.214-4.153c-3.195-2.769-4.789-6.649-4.789-11.633c0-4.355,1.527-8.06,4.576-11.117
            c3.053-3.053,6.795-4.58,11.218-4.58c4.426,0,8.191,1.523,11.319,4.58c3.124,3.053,4.688,6.761,4.688,11.117
            c0,4.913-1.579,8.771-4.745,11.581C245.403,309.997,241.721,311.401,237.508,311.401z"/>
        </svg>
        ';

    if($name == 'menu') $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';

    if($name == 'x') $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
    </svg>';

    if($name == 'facebook') $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>';

    if($name == 'twitter') $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>';

    if($name == 'instagram') $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>';

    if($name == 'linkedin') $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>';

    if($name == 'cookie') $icon = '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 416.991 416.991" style="enable-background:new 0 0 416.991 416.991;" xml:space="preserve">
        <g>
            <g>
                <path style="fill:#D4B783;" d="M344.649,204.32c-7.807,3.62-16.314,5.501-25.067,5.503c-10.392,0.001-20.665-2.759-29.711-7.982
                    c-16.886-9.749-27.772-27.175-29.52-46.218c-19.143-1.749-36.518-12.726-46.216-29.523c-9.747-16.882-10.465-37.41-2.462-54.773
                    c-12.251-8.607-20.792-21.491-23.926-36.143c-41.698,1.338-79.982,16.399-110.502,40.79c7.997,7.752,12.731,18.522,12.731,30.139
                    c0,14.868-7.772,27.946-19.461,35.412c-6.518,4.163-14.248,6.588-22.539,6.588c-5.841,0-11.538-1.211-16.78-3.498
                    c-0.026,0.027-0.052,0.053-0.078,0.08c-1.962,5.439-3.673,10.997-5.136,16.655C22.086,176.423,20,192.219,20,208.496
                    c0,103.937,84.559,188.496,188.495,188.496c41.112,0,79.18-13.243,110.192-35.67c0.654-0.587,1.493-1.204,2.467-1.842
                    c11.615-8.688,22.217-18.658,31.549-29.74c-10.812-7.738-17.66-20.402-17.66-34.193c0-9.15,2.95-17.619,7.937-24.526
                    c7.339-10.164,19.105-16.916,32.449-17.425c0.523-0.029,1.057-0.049,1.615-0.049c0.404,0,0.807,0.014,1.21,0.026
                    c1.405-8.275,2.272-16.73,2.548-25.333C366.147,225.109,353.26,216.57,344.649,204.32z M132.435,334.871
                    c-13.093,0-24.803-6.025-32.512-15.445c-6.215-7.325-9.976-16.795-9.976-27.131c0-23.159,18.841-42,42-42
                    c13.093,0,24.804,6.025,32.512,15.445c6.215,7.325,9.976,16.795,9.976,27.131C174.435,316.03,155.595,334.871,132.435,334.871z
                        M160.194,183.688c-13.093,0-24.803-6.025-32.512-15.445c-6.215-7.325-9.976-16.795-9.976-27.131c0-23.159,18.841-42,42-42
                    c13.093,0,24.803,6.025,32.512,15.445c6.215,7.325,9.976,16.795,9.976,27.131C202.194,164.846,183.354,183.688,160.194,183.688z
                        M246.963,314.835c-16.814,0-31.855-7.727-41.767-19.815c-7.929-9.401-12.721-21.53-12.721-34.762c0-29.776,24.225-54,54-54
                    c16.814,0,31.855,7.727,41.767,19.815c7.929,9.401,12.721,21.53,12.721,34.762C300.963,290.611,276.738,314.835,246.963,314.835z"
                    />
                <path style="fill:#89634A;" d="M159.706,163.111c12.131,0,22-9.869,22-22c0-12.131-9.869-22-22-22c-12.131,0-22,9.869-22,22
                    C137.706,153.242,147.576,163.111,159.706,163.111z"/>
                <path style="fill:#89634A;" d="M131.948,314.295c12.131,0,22-9.869,22-22c0-12.131-9.869-22-22-22c-12.131,0-22,9.869-22,22
                    C109.948,304.426,119.817,314.295,131.948,314.295z"/>
                <path style="fill:#89634A;" d="M69.977,106.111c0-6.503-2.838-12.494-7.563-16.596c-9.154,11.218-17.041,23.505-23.448,36.643
                    c2.809,1.265,5.866,1.954,9.011,1.954C60.108,128.111,69.977,118.242,69.977,106.111z"/>
                <path style="fill:#89634A;" d="M355.043,295.546c0,7.423,3.79,14.218,9.724,18.234c8.124-12.02,14.894-25.024,20.101-38.79
                    c-2.469-0.943-5.101-1.444-7.825-1.444C364.913,273.546,355.043,283.415,355.043,295.546z"/>
                <path style="fill:#89634A;" d="M246.475,294.259c18.748,0,34-15.253,34-34c0-18.748-15.252-34-34-34c-18.748,0-34,15.252-34,34
                    C212.475,279.006,227.727,294.259,246.475,294.259z"/>
            </g>
            <g>
                <path style="fill:#89634A;" d="M192.218,114.556c5.926,7.242,9.488,16.489,9.488,26.555c0,23.159-18.841,42-42,42
                    c-12.822,0-24.314-5.782-32.024-14.869c7.708,9.42,19.419,15.445,32.512,15.445c23.159,0,42-18.841,42-42
                    C202.194,131.351,198.434,121.881,192.218,114.556z"/>
                <path style="fill:#89634A;" d="M173.948,292.295c0,23.159-18.841,42-42,42c-12.822,0-24.314-5.782-32.024-14.869
                    c7.709,9.42,19.419,15.445,32.512,15.445c23.159,0,42-18.841,42-42c0-10.337-3.761-19.806-9.976-27.131
                    C170.385,272.982,173.948,282.229,173.948,292.295z"/>
                <path style="fill:#89634A;" d="M300.475,260.259c0,29.776-24.225,54-54,54c-16.543,0-31.365-7.485-41.279-19.238
                    c9.911,12.087,24.952,19.815,41.767,19.815c29.775,0,54-24.224,54-54c0-13.232-4.792-25.361-12.721-34.762
                    C295.882,235.391,300.475,247.297,300.475,260.259z"/>
                <path d="M159.706,183.111c23.159,0,42-18.841,42-42c0-10.066-3.562-19.313-9.488-26.555c-7.708-9.42-19.418-15.445-32.512-15.445
                    c-23.159,0-42,18.841-42,42c0,10.337,3.761,19.806,9.976,27.131C135.393,177.329,146.884,183.111,159.706,183.111z
                        M159.706,119.111c12.131,0,22,9.869,22,22c0,12.131-9.869,22-22,22c-12.131,0-22-9.869-22-22
                    C137.706,128.98,147.576,119.111,159.706,119.111z"/>
                <path d="M131.948,334.295c23.159,0,42-18.841,42-42c0-10.066-3.562-19.313-9.488-26.555c-7.708-9.42-19.419-15.445-32.512-15.445
                    c-23.159,0-42,18.841-42,42c0,10.337,3.761,19.806,9.976,27.131C107.634,328.513,119.125,334.295,131.948,334.295z
                        M131.948,270.295c12.131,0,22,9.869,22,22c0,12.131-9.869,22-22,22c-12.131,0-22-9.869-22-22
                    C109.948,280.164,119.817,270.295,131.948,270.295z"/>
                <path d="M416.97,206.596l-0.013-0.831c-0.064-5.279-4.222-9.598-9.494-9.864c-14.875-0.751-28.007-9.639-34.27-23.193
                    c-1.245-2.694-3.623-4.696-6.489-5.465c-2.867-0.769-5.927-0.224-8.353,1.487c-6.706,4.73-14.927,7.335-23.146,7.336
                    c-6.964,0-13.857-1.854-19.935-5.363c-13.458-7.77-21.242-22.803-19.83-38.299c0.269-2.956-0.789-5.879-2.888-7.977
                    c-2.1-2.1-5.033-3.154-7.977-2.889c-1.195,0.109-2.411,0.164-3.614,0.164c-14.272,0-27.562-7.662-34.683-19.996
                    c-7.77-13.458-6.994-30.369,1.976-43.084c1.711-2.425,2.257-5.485,1.488-8.352c-0.768-2.867-2.77-5.245-5.464-6.49
                    c-13.548-6.262-22.434-19.387-23.189-34.254c-0.268-5.269-4.583-9.424-9.858-9.492l-0.816-0.013C209.777,0.01,209.137,0,208.496,0
                    C93.531,0,0.001,93.531,0.001,208.496s93.53,208.496,208.495,208.496s208.495-93.531,208.495-208.496
                    C416.991,207.861,416.981,207.229,416.97,206.596z M62.414,89.515c4.725,4.102,7.563,10.093,7.563,16.596c0,12.131-9.869,22-22,22
                    c-3.145,0-6.202-0.689-9.011-1.954C45.373,113.02,53.26,100.733,62.414,89.515z M364.768,313.781
                    c-5.935-4.016-9.724-10.811-9.724-18.234c0-12.131,9.869-22,22-22c2.725,0,5.356,0.501,7.825,1.444
                    C379.662,288.757,372.892,301.761,364.768,313.781z M390.948,255.926c-4.067-1.428-8.354-2.227-12.695-2.354
                    c-0.403-0.012-0.806-0.026-1.21-0.026c-0.542,0-1.077,0.029-1.615,0.049c-13.344,0.509-25.11,7.26-32.449,17.425
                    c-4.987,6.906-7.937,15.376-7.937,24.526c0,13.791,6.848,26.454,17.66,34.193c-9.332,11.082-19.935,21.052-31.549,29.74
                    c-0.822,0.615-1.635,1.24-2.467,1.842c-31.012,22.428-69.08,35.67-110.192,35.67C104.559,396.991,20,312.433,20,208.496
                    c0-16.276,2.085-32.073,5.983-47.148c1.463-5.657,3.174-11.215,5.136-16.655c0.012-0.032,0.022-0.065,0.034-0.098
                    c0.014,0.006,0.029,0.011,0.044,0.018c5.242,2.287,10.938,3.498,16.78,3.498c8.291,0,16.021-2.425,22.539-6.588
                    c11.688-7.466,19.461-20.544,19.461-35.412c0-11.617-4.733-22.387-12.731-30.139c-0.451-0.437-0.906-0.869-1.377-1.286
                    c32.732-32.446,77.26-53.009,126.502-54.589c3.157,14.763,11.764,27.746,24.107,36.418c-8.064,17.495-7.341,38.179,2.48,55.19
                    c9.771,16.925,27.278,27.985,46.567,29.748c1.761,19.188,12.729,36.747,29.744,46.57c9.114,5.262,19.466,8.043,29.936,8.042
                    c8.82-0.001,17.392-1.897,25.258-5.544c8.676,12.343,21.661,20.947,36.427,24.102C396.436,228.84,394.398,242.665,390.948,255.926
                    z"/>
                <path d="M246.475,314.259c29.775,0,54-24.224,54-54c0-12.961-4.593-24.868-12.233-34.185
                    c-9.911-12.087-24.952-19.815-41.767-19.815c-29.775,0-54,24.224-54,54c0,13.232,4.792,25.361,12.721,34.762
                    C215.11,306.774,229.932,314.259,246.475,314.259z M246.475,226.259c18.748,0,34,15.252,34,34c0,18.747-15.252,34-34,34
                    c-18.748,0-34-15.253-34-34C212.475,241.511,227.727,226.259,246.475,226.259z"/>
            </g>
        </g>
        </svg>
        ';

    return $icon;
}
