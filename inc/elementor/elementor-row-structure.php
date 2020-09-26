<?php
if(!function_exists('soapee_custom_section_presets')){
    add_filter('etc-custom-section/custom-presets', 'soapee_custom_section_presets');
    function soapee_custom_section_presets(){
        return [
            1 => [
                [
                    'preset' => [ 66 ],
                ],
                [
                    'preset' => [ 83 ],
                ]
            ],
            2 => [
                [
                    'preset' => [41, 58],
                ],
                [
                    'preset' => [66, 100],
                ],
                [
                    'preset' => [80, 100],
                ],
                [
                    'preset' => [44, 56],
                ],
                [
                    'preset' => [58, 41],
                ],
                [
                    'preset' => ['46/968', '54/032'],
                ],
                [
                    'preset' => ['47/5', '52/5'],
                ]
            ],
            3 => [
                [
                    'preset' => [ 100, 50, 50 ],
                ],
            ],
            4 => [
                [
                    'preset' => [ 100, 33, 33, 33 ],
                ],
                [
                    'preset' => [ 50, 50, 50, 50 ],
                ]
            ],
            5 => [
                [
                    'preset' => [ 100, 50, 50, 50, 50 ],
                ],
                [
                    'preset' => [ 100, 25, 25, 25, 25 ],
                ],
                [
                    'preset' => [ 80, 25, 25, 25, 25 ],
                ],
            ],
            6 => [
                [
                    'preset' => [ 66, 100, 25, 25, 25, 25 ],
                ],
                [
                    'preset' => [ 33, 33, 33, 33, 33, 33 ],
                ]
            ],
            7 => [
                [
                    'preset' => [ 100, 33, 33, 33, 33, 33, 33 ],
                ]
            ]
        ];
    }
}